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
        //Session for navigation menu bar
        \Session::flash('reviewer', '5');

//		$papers = $this->getPapers();
//
//		return view('reviewer.paper', compact('papers'));

//        $papers = $this->paper->get();
        $userId = Auth::user()->email;

        $papers = DB::table('papers')
            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->select('papers.id', 'papers.title', 'papers.abstractContent', 'papers.fullPaperUrl', 'paper_reviews.comment')
            ->where('reviewer_id', '=', $userId)
            ->orderBy('papers.id', 'desc')
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
        //Session for navigation menu bar
        \Session::flash('reviewer', '5');

        $userId = Auth::user()->email;

        $paper = Paper::find($id);
//        $paperReview = PaperReview::find($id);

//        $paper = $this->paper->get()[$id];
//        $paper = Paper::where('id', '=', $id)
//            ->first();
//dd($paper);
        $paperReview = DB::table('paper_reviews')
            ->select('*')
            ->where('paper_id', '=', $id)
            ->where('reviewer_id','=',$userId)
            ->first();

//        dd($paperReview);
        return view('reviewer.showPaper', compact('paper','paperReview'));
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

        if ($paperReview->flag == 6)
        {

            $paperReview->quality = Input::get('quality');
            $paperReview->rationale = Input::get('rationale');
            $paperReview->hypothesis = Input::get('hypothesis');
            $paperReview->manuscript = Input::get('manuscript');
            $paperReview->structure = Input::get('structure');
            $paperReview->paperEvaluation = Input::get('paperEvaluation');
            $paperReview->confidenceLevel = Input::get('confidenceLevel');

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
//        $numStrongReject = DB::table('papers')
//        ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//        ->select('papers.id', 'paper_reviews.paperEvaluation')
//        ->where('paper_reviews.paperEvaluation', '=', 'Strongly Reject' )
//        ->where('papers.id', '=', $id)
//        ->count('paper_reviews.paperEvaluation');
//
//        $numReject = DB::table('papers')
//            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//            ->select('papers.id', 'paper_reviews.paperEvaluation')
//            ->where('paper_reviews.paperEvaluation', '=', 'Reject' )
//            ->where('papers.id', '=', $id)
//            ->count('paper_reviews.paperEvaluation');
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
//        if($numberOfReviewers == 1 && ($numReject == 1 || $numStrongReject == 1))
//        {
//            $paper->tempStatus = 'Reject';
//        }
//        else if($numberOfReviewers == 2 && ($numReject == 1 || $numStrongReject == 1))
//        {
//            $paper->tempStatus = 'Reject';
//        }
//        else if($numberOfReviewers == 3 && ($numReject >= 2 || $numStrongReject >= 2))
//        {
//            $paper->tempStatus = 'Reject';
//        }
//        else if($numberOfReviewers == 4 && ($numReject >= 2 || $numStrongReject >= 2))
//        {
//            $paper->tempStatus = 'Reject';
//        }
//        else if($numberOfReviewers == 5 && ($numReject >= 3 || $numStrongReject >= 3))
//        {
//            $paper->tempStatus = 'Reject';
//        }
//        else
//        {
//            $paper->tempStatus = 'Accept';
//        }

            /*
             * Evaluation based on the mean score
             */

//        $numReject = DB::table('paper_reviews')
//            ->select('paper_id', 'paperEvaluation')
//            ->where('paperEvaluation', '=', '-1')
//            ->where('paper_id', '=', $id)
//            ->count('paper_id');
//
//        $numStrongReject = DB::table('paper_reviews')
//            ->select('paper_id', 'paperEvaluation')
//            ->where('paperEvaluation', '=', '-2')
//            ->where('paper_id', '=', $id)
//            ->count('paper_id');
//
//        $numAccept = DB::table('paper_reviews')
//            ->select('paper_id', 'paperEvaluation')
//            ->where('paperEvaluation', '=', '1')
//            ->where('paper_id', '=', $id)
//            ->count('paper_id');
//
//        $numStrongAccept = DB::table('paper_reviews')
//            ->select('paper_id', 'paperEvaluation')
//            ->where('paperEvaluation', '=', '2')
//            ->where('paper_id', '=', $id)
//            ->count('paper_id');
//
//        $paperEvaluationSum = DB::table('paper_reviews')
//            ->select('paper_id', 'paperEvaluation')
//            ->where('paper_id', '=', $id)
//            ->sum('paperEvaluation');
//
//        $numberOfReviewers = DB::table('papers')
//            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//            ->select('paper_reviews.paper_id', 'paper_reviews.score')
//            ->where('papers.id', '=', $id)
//            ->count('paper_reviews.score');
//
//        $paperEvaluationMean = $paperEvaluationSum / $numberOfReviewers;
//        $paperReview->score = $paperEvaluationMean;
//
//        if (($numberOfReviewers == 2) && ($numStrongAccept == 1 || $numAccept == 1) && ($numStrongReject == 1 || $numReject == 1))
//        {
//            $paper->tempStatus = -1;
//        } else
//        {
//            if ($paperEvaluationMean > 0)
//            {
//                $paper->tempStatus = 1;
//            } else
//            {
//                $paper->tempStatus = -1;
//            }
//        }

            //This query is to get the number of reviewers that already reviewed that particular paper
            $numberOfReviewers = DB::table('papers')
                ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
                ->select('paper_reviews.paper_id', 'paper_reviews.reviewer_id')
                ->where('papers.id', '=', $id)
                ->where('paper_reviews.paperEvaluation', '!=', '')
                ->count('paper_reviews.reviewer_id');

            /*
             * This is the paper evaluation calculation using the max and min
             */
            $max = DB::table('papers')
                ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
                ->select('paper_reviews.paper_id', 'paper_reviews.score')
                ->where('papers.id', '=', $id)
                ->max('paper_reviews.paperEvaluation');

            $min = DB::table('papers')
                ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
                ->select('paper_reviews.paper_id', 'paper_reviews.score')
                ->where('papers.id', '=', $id)
                ->min('paper_reviews.paperEvaluation');

//            $weightedMarks = DB::table('papers')
//                ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//                ->select(DB::raw('sum(paper_reviews.paperEvaluation * paper_reviews.confidenceLevel) AS WeightedAverage,
//                count(paper_reviews.reviewer_id) as NumOfReviewers'))
//                ->where('papers.id', '=', $id)
//                ->first();

//            $positiveCount = DB::table('papers')
//                ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//                ->select('paper_reviews.paper_id', 'paper_review.paperEvaluation')
//                ->where('papers.id', '=', $id)
//                ->where('paper_reviews.paperEvaluation', '>', 0)
//                ->count('paper_reviews.paper_id');
//
//            $negativeCount = DB::table('papers')
//                ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//                ->select('paper_reviews.paper_id', 'paper_review.paperEvaluation')
//                ->where('papers.id', '=', $id)
//                ->where('paper_reviews.paperEvaluation', '<', 0)
//                ->count('paper_reviews.paper_id');

            //AND Boolean expression has been used in validating the paper, if the reviewers for a particular paper is 2 then a conflict will occur
            if(((is_int($max) && $max > 0) == true) && ((is_int($min) && $min > 0) == true))
            {
                $paper->tempStatus = 1;
            }
            elseif(((is_int($max) && $max > 0) == true) && ((is_int($min) && $min > 0) == false))
            {
//                if ($numberOfReviewers == 2)
//                {
//                    $paper->tempStatus = - 3;
//                } else
//                {
//                    if($positiveCount > $negativeCount)
//                    {
//                        $paper->tempStatus = 1;
//                    }
//                    else
//                    {
//                        $paper->tempStatus = -1;
//                    }
//                }
                $paper->tempStatus = -3;

            }
            elseif(((is_int($max) && $max > 0) == false) && ((is_int($min) && $min > 0) == true))
            {
                $paper->tempStatus = - 3;
            }
            elseif(((is_int($max) && $max > 0) == false) && ((is_int($min) && $min > 0) == false))
            {
                $paper->tempStatus = -1;
            }
            else
            {
                $paper->tempStatus = -3;
            }


            //Update the data in the database

            session()->flash('flash_message', 'This paper has been evaluated');

            $paper->save();
            $paperReview->save();

            return redirect('reviewer/');

        } else
        {
            return 'This paper has been closed for review';
        }
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
