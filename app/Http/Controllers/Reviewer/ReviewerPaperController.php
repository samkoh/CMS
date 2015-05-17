<?php namespace App\Http\Controllers\Reviewer;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaperReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Request;
use App\Paper;
use Auth;
use Carbon\Carbon;

//use Illuminate\Http\Request;

class ReviewerPaperController extends Controller {

    private $paper;
    private $paperReview;

    public function __construct(Paper $paper, PaperReview $paperReview)
    {
        $this->paper = $paper;
        $this->paperReview = $paperReview;
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

//        $papers = $this->paper->get();
        $userId = Auth::user()->email;

        $papers = DB::table('papers')
            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->select('papers.id', 'papers.title', 'papers.abstractContent', 'papers.fullPaperUrl')
            ->where('reviewer_id', '=', $userId)
            ->get();

//        dd($papers);

//        $paperReview = DB::table('papers')
//            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id' )
//            ->select('paper_reviews.paper_id','paper_reviews.score')
//            ->where('papers.id', '=', '2')
//            ->count('paper_reviews.score);
//
//        dd($paperReview);

        return view('reviewer.paper', compact('papers'));
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
    public function store($id, PaperReview $paperReview, Paper $paper)
    {
//        $userId = Auth::user()->email;
//
//        $userPaperExistance = DB::table('paper_reviews')
//            ->where('reviewer_id', '=', $userId)
//            ->where('paper_id', '=', $id)
//            ->select('reviewer_id', 'paper_id')
//            ->get();
//
//
//        if ($userPaperExistance == null){
//
//            $paperReview->paper_id = $id;
//            $paperReview->reviewer_id = $userId;
//
//            $num1 = Input::get('quality');
//            $num2 = Input::get('evaluation');
//            $num3 = Input::get('hypotheses');
//            $num4 = Input::get('manuscript');
//
//            $paperReview->score = ($num1 + $num2 + $num3 + $num4);
//            $paperReview->comment = Input::get('comment');
//
//            $paperReview->save();
//
//
//            return $this->update($id);
//        }
//        else{
//
//            return 'You have evaluated this paper before';
//        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $paper = Paper::find($id);
//        $paper = $this->paper->get()[$id];
//        $paper = Paper::where('id', '=', $id)
//            ->first();
//dd($paper);
//        $paper = DB::table('papers')
//            ->select('id','title', 'abstractContent', 'fullPaperUrl')
//            ->where('id', '=', $paper)
//            ->get();

//        dd($paper);
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
        $userId = Auth::user()->email;

        //This is to find the user selected paper Id
        $paper = Paper::find($id);
        //This is to find the array for that paper_id in the paper review table
        $paperReview = PaperReview::where('paper_id', '=', $id)
            ->where('reviewer_id', '=', $userId)
            ->first();

//        if ($paperReview->score != null)
//        {

        $paperReview->quality = Input::get('quality');
        $paperReview->rationale = Input::get('rationale');
        $paperReview->hypothesis = Input::get('hypothesis');
        $paperReview->manuscript = Input::get('manuscript');
        $paperReview->structure = Input::get('structure');
        $paperReview->paperEvaluation = Input::get('paperEvaluation');

//            $paperReview->score = ($num1 + $num2 + $num3 + $num4 + $num5);
        $paperReview->comment = Input::get('comment');
        $paperReview->reviewed_date = Carbon::now();
        $paperReview->save();
//        } else
//        {
//            return 'You have evaluated this paper before';
//        }


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


//        /*
//         * This query is to select the paper's marks
//         */
//        $paperReview = DB::table('papers')
//            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//            ->select('paper_reviews.paper_id', 'paper_reviews.score')
//            ->where('papers.id', '=', $id)
//            ->sum('paper_reviews.score');
//
//        /*
//         * This query is to select the number of papers that are reviewed by the reviewers
//         */
//        $numberOfReviewers = DB::table('papers')
//            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//            ->select('paper_reviews.paper_id', 'paper_reviews.score')
//            ->where('papers.id', '=', $id)
//            ->count('paper_reviews.score');
//
//        /*
//         * This is the method to find our the average marks
//         */
//        $average = ($paperReview / $numberOfReviewers);
//
//        $paper->averageMarks = $average;
//        /*
//         * Method that decide whether that particular is accepted or rejected
//         */
//        if ($average >= 15 && $average <= 40)
//        {
//            $paper->status = 'Rejected';
//        } else if ($average > 5 && $average < 15)
//        {
//            $paper->status = 'Partially Accept';
//        } else
//        {
//            $paper->status = 'Rejected';
//        }

        /*
         * Evaluation according to the agree and reject statement
         */
        $numStrongReject = DB::table('papers')
        ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
        ->select('papers.id', 'paper_reviews.paperEvaluation')
        ->where('paper_reviews.paperEvaluation', '=', 'Strongly Reject' )
        ->where('papers.id', '=', $id)
        ->count('paper_reviews.paperEvaluation');

        $numReject = DB::table('papers')
            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->select('papers.id', 'paper_reviews.paperEvaluation')
            ->where('paper_reviews.paperEvaluation', '=', 'Reject' )
            ->where('papers.id', '=', $id)
            ->count('paper_reviews.paperEvaluation');

        /*
         * This query is to select the number of papers that are reviewed by the reviewers
         */
        $numberOfReviewers = DB::table('papers')
            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->select('paper_reviews.paper_id', 'paper_reviews.score')
            ->where('papers.id', '=', $id)
            ->count('paper_reviews.score');

        if($numberOfReviewers == 1 && ($numReject == 1 || $numStrongReject == 1))
        {
            $paper->tempStatus = 'Reject';
        }
        else if($numberOfReviewers == 2 && ($numReject == 1 || $numStrongReject == 1))
        {
            $paper->tempStatus = 'Reject';
        }
        else if($numberOfReviewers == 3 && ($numReject >= 2 || $numStrongReject >= 2))
        {
            $paper->tempStatus = 'Reject';
        }
        else if($numberOfReviewers == 4 && ($numReject >= 2 || $numStrongReject >= 2))
        {
            $paper->tempStatus = 'Reject';
        }
        else if($numberOfReviewers == 5 && ($numReject >= 3 || $numStrongReject >= 3))
        {
            $paper->tempStatus = 'Reject';
        }
        else
        {
            $paper->tempStatus = 'Accept';
        }

//dd($paper);
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
