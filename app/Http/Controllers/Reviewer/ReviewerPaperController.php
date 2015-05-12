<?php namespace App\Http\Controllers\Reviewer;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaperEvaluation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Request;
use App\Paper;
use Auth;

//use Illuminate\Http\Request;

class ReviewerPaperController extends Controller {

    private $paper;
    private $paperEvaluation;

    public function __construct(Paper $paper, PaperEvaluation $paperEvaluation)
    {
        $this->paper = $paper;
        $this->paperEvaluation = $paperEvaluation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//		$papers = $this->getPapers();
//
//		return view('reviewer.paper', compact('papers'));

        $papers = $this->paper->get();

//        $paperEvaluation = DB::table('papers')
//        ->join('paper_evaluations', 'papers.id', '=', 'paper_evaluations.paper_id' )
//        ->select('paper_evaluations.paper_id','paper_evaluations.mark')
//        ->where('papers.id', '=', '2')
//        ->sum('paper_evaluations.mark');
//
//        dd($paperEvaluation);

//        $paperEvaluation = DB::table('papers')
//            ->join('paper_evaluations', 'papers.id', '=', 'paper_evaluations.paper_id' )
//            ->select('paper_evaluations.paper_id','paper_evaluations.mark')
//            ->where('papers.id', '=', '2')
//            ->count('paper_evaluations.mark');
//
//        dd($paperEvaluation);

        return view('reviewer.paper', compact('papers', 'paperEvaluation'));
    }

    /*
     * This is GET method for download the uploaded file
     */
    public function get($fullPaperUrl)
    {

        $file = Paper::where('fullPaperUrl', '=', $fullPaperUrl)->firstOrFail();

        $file = public_path() . '/papers/' . $fullPaperUrl;

        return response()->download($file, "Paper - .pdf");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($id, PaperEvaluation $paperEvaluation, Paper $paper)
    {
        $userId = Auth::user()->email;

        $userPaperExistance = DB::table('paper_evaluations')
            ->where('reviewer_id', '=', $userId)
            ->where('paper_id', '=', $id)
            ->select('reviewer_id', 'paper_id')
            ->get();


        if ($userPaperExistance == null){

            $paperEvaluation->paper_id = $id;
            $paperEvaluation->reviewer_id = $userId;

            $num1 = Input::get('quality');
            $num2 = Input::get('evaluation');
            $num3 = Input::get('hypotheses');
            $num4 = Input::get('manuscript');

            $paperEvaluation->mark = ($num1 + $num2 + $num3 + $num4);
            $paperEvaluation->comment = Input::get('comment');

            $paperEvaluation->save();

//        $paperEvaluation = DB::table('papers')
//            ->join('paper_evaluations', 'papers.id', '=', 'paper_evaluations.paper_id' )
//            ->select('paper_evaluations.paper_id','paper_evaluations.mark')
//            ->where('papers.id', '=', $id)
//            ->sum('paper_evaluations.mark');
//
//        dd($paperEvaluation);

//        return view('reviewer.showPaper', compact('paper'));
            return $this->update($id);
        }
        else{

            return 'You have evaluated this paper before';
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $paper = $this->paper->get()[$id];

        return view('reviewer.showPaper', compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //This is to find the user selected paper Id
        $paper = Paper::find($id);
//
//        $num1 = Input::get('quality');
//        $num2 = Input::get('evaluation');
//        $num3 = Input::get('hypotheses');
//        $num4 = Input::get('manuscript');
//
//
//        $answer = ($num1 + $num2 +$num3 + $num4)/4;
//
//        if($answer < 2 && $answer > 0)
//        {
//            $paper->status = 'Pass';
//        }
//        else if ($answer == 0)
//        {
//            $paper->status = 'Partial Pass';
//        }
//        else
//        {
//            $paper->status = 'Fail';
//        }
//
//
//        $paper->save();
//        return view('reviewer.showPaper', compact('paper'));

        /*
         * This query is to select the paper's marks
         */
        $paperEvaluation = DB::table('papers')
            ->join('paper_evaluations', 'papers.id', '=', 'paper_evaluations.paper_id')
            ->select('paper_evaluations.paper_id', 'paper_evaluations.mark')
            ->where('papers.id', '=', $id)
            ->sum('paper_evaluations.mark');

        /*
         * This query is to select the number of papers that are reviewed by the reviewers
         */
        $numberOfReviewers = DB::table('papers')
            ->join('paper_evaluations', 'papers.id', '=', 'paper_evaluations.paper_id')
            ->select('paper_evaluations.paper_id', 'paper_evaluations.mark')
            ->where('papers.id', '=', $id)
            ->count('paper_evaluations.mark');

        /*
         * This is the method to find our the average marks
         */
        $average = ($paperEvaluation / $numberOfReviewers);

        $paper->averageMarks = $average;
        /*
         * Method that decide whether that particular is accepted or rejected
         */
        if ($average >= 15 && $average <= 40)
        {
            $paper->status = 'Rejected';
        } else if ($average > 5 && $average < 15)
        {
            $paper->status = 'Partially Accept';
        } else
        {
            $paper->status = 'Rejected';
        }

        //Update the data in the database
        $paper->save();

        return view('reviewer.showPaper', compact('paper'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Dummy data
     */
    private function getPapers()
    {
        return ['(1) - Man-Computer Symbiosis',
            '(1) - The Computer as a Communication Device',
            '(1) - Electricity over IP',
            '(1) - The Infinite Monkey Protocol Suite (IMPS)'];
    }

}
