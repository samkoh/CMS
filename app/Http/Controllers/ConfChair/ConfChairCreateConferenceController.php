<?php namespace App\Http\Controllers\ConfChair;

use App\Conference;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Topic;
use Illuminate\Http\Request;

class ConfChairCreateConferenceController extends Controller {

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    private $conference;

    public function __construct(Conference $conference)
    {
        $this->conference = $conference;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $topics = Topic::lists('name', 'id');
//        $conferences = $this->conference->get();
        $conferences = $this->conference->where('user_id', Auth::user()->id)->get();

        return view('conferenceChair.createConference', compact('topics','conferences'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Conference $conference)
	{
//		$conference->create($request->all());
//
//        \Auth::user()->topics()->save($conference);

        //dd($request->input('topic'));

        //$conferences = $conference->create($request->all());
        $conferences = Auth::user()->conferences()->create($request->all());

        //dd($conferences);
        $topicIds = $request->input('topic');

        $conferences->topic()->attach($topicIds);

        return redirect('conferenceChair/createConference');
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
