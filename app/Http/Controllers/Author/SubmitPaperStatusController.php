<?php namespace App\Http\Controllers\Author;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmitPaperStatusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //Session for navigation menu bar
        \Session::flash('author', '6');

        //Get the current user email
        $userId = \Auth::user()->email;

        $papers = DB::table('papers')
                ->select('id','title', 'created_at', 'status')
                ->where('user_id', '=', $userId)
                ->whereIn('status',array(-1,1))
                ->get();
//        dd($papers);

        return view('author.paperStatus', compact('papers'));
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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //Session for navigation menu bar
        \Session::flash('author', '6');

	    //Get papers
        $paper = Paper::find($id);

		$comments = DB::table('papers')
            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->select('papers.id','papers.title','paper_reviews.reviewer_id','paper_reviews.comment','paper_reviews.updated_at')
            ->where('paper_reviews.paper_id', '=', $id)
            ->get();
//        dd($comment);

        return view('author.paperComment', compact('comments','paper'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
