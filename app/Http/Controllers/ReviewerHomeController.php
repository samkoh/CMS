<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Paper;
use App\Topic;
use Illuminate\Http\Request;

class ReviewerHomeController extends Controller {

    private $paper;
    private $topic;

    public function __construct(Paper $paper, Topic $topic)
    {
        $this->paper = $paper;
        $this->topic = $topic;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//        $papers = $this->paper->get();
//
//        return view('reviewerHome', compact('papers'));

        if(\Auth::check() && \Auth::user()->id == '1')
        {
            $papers = $this->paper->get();

            return view('reviewerHome', compact('papers'));

        }
        $topics = $this->topic->get();

        return view('authorHome', compact('topics'));
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
		//
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
