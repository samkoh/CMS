<?php namespace App\Http\Controllers\ConfChair;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConfChairPaperReportController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Session for navigation menu bar
        \Session::flash('confChair', '1');

        $allPapers = DB::table('papers')
        ->leftjoin('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
        ->leftjoin('users', 'paper_reviews.reviewer_id', '=', 'users.email')
        ->select('papers.id','papers.title', 'papers.status', 'paper_reviews.reviewer_id',
            'papers.created_at', DB::raw('group_concat(users.firstname) as firstname'))
        ->groupBy('papers.title')
        ->orderBy('papers.status', 'desc')
        ->get();

        $nullReviewer = DB::table('papers')
            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->join('users', 'paper_reviews.reviewer_id', '=', 'users.email')
            ->select('papers.id', 'papers.title', DB::raw('group_concat(users.firstname) as firstname'))
            ->whereNull('paper_reviews.paperEvaluation')
            ->groupBy('papers.title')
            ->orderBy('papers.status', 'desc')
            ->get();


//dd($final_results);

        $acceptNum = DB::table('papers')
            ->select('status')
            ->where('status', '=', 1)
            ->count('status');

        $rejectNum = DB::table('papers')
            ->select('status')
            ->where('status', '=', - 1)
            ->count('status');

        $allPapersNum = DB::table('papers')
            ->select('status')
            ->count('status');

//dd($allPapersNum);

        return view('conferenceChair.paperReport', compact('allPapers','nullReviewer', 'acceptNum', 'rejectNum', 'allPapersNum'));
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
        //
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
        //
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
