<?php namespace App\Http\Controllers\ConfChair;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaperReview;
use App\User;
use Illuminate\Support\Facades\DB;

use Auth;
use Illuminate\Http\Request;
use App\Paper;
use Illuminate\Support\Facades\Input;

class ConfChairFinalizePapersController extends Controller {

    private $paper;

    /**
     * @param Paper $paper
     */
    public function __construct(Paper $paper)
    {
        $this->paper = $paper;
    }


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //Session for navigation menu bar
        \Session::flash('confChair', '1');

        //Get all the reviewed papers
        $allReviewedPapers = DB::table('papers')
            ->leftJoin('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->select(DB::raw('papers.id, papers.title, papers.status, papers.tempStatus,
            group_concat(paper_reviews.paperEvaluation) as evaluation,
             count(paper_reviews.reviewer_id) as ReviewerNo, sum(paper_reviews.paperEvaluation * paper_reviews.confidenceLevel) AS WeightedAverage'))
            ->where('papers.tempStatus', '!=', '')
            ->groupBy('papers.id')
            ->get();

        return view('conferenceChair.finalizeAllPapers', compact('allReviewedPapers'));
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
    public function store()
    {
        //
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
        \Session::flash('confChair', '1');

        $paper = Paper::find($id);

        return view('conferenceChair.finalizePapers', compact('paper'));
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
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id)
    {
        $paper = Paper::find($id);

        $paper->status = Input::get('status');

        $paper->save();

        return redirect('conferenceChair/finalizeAllPapers');
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

}
