<?php namespace App\Http\Controllers\ConfChair;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Topic;
use Illuminate\Http\Request;

class ConfChairCreateTopicController extends Controller {


    private $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $topics = $this->topic->orderBy('name', 'asc')->get();

        return view('conferenceChair.createTopic', compact('topics'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //return view('conferenceChair.createTopic');

    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Topic $topic)
	{
		$topic->create($request->all());
        //dd($topic);
        session()->flash('flash_message', 'Conference Topic has been saved');

        return redirect('conferenceChair/createTopic');
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
