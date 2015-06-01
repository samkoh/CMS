<?php namespace App\Http\Controllers\ConfChair;

use App\Conference;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        //Session for navigation menu bar
        \Session::flash('confChair', '1');

        $topics = Topic::lists('name', 'id');
//        $conferences = $this->conference->get();
        $conferences = $this->conference->where('user_id', Auth::user()->email)->get();

        return view('conferenceChair.createConference', compact('topics', 'conferences'));
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
    public function store(Request $request, Conference $conference, Requests\CreateConferenceRequest $request)
    {
//		$conference->create($request->all());
//
//        \Auth::user()->topics()->save($conference);

        //dd($request->input('topic'));

        //$conferences = $conference->create($request->all());
//        $conferences = Auth::user()->conferences()->create($request->all());

        $conference->user_id = Auth::user()->email;
        $conference->conferenceName = Input::get('conferenceName');
        $conference->acronym = Input::get('acronym');
        $conference->theme = Input::get('theme');
        $conference->address = Input::get('address');
        $conference->websiteURL = Input::get('websiteURL');
        $conference->conferenceEmail = Input::get('conferenceEmail');
        $conference->contactNo = Input::get('contactNo');
        $conference->faxNo = Input::get('faxNo');
        $conference->startDate = Input::get('startDate');
        $conference->endDate = Input::get('endDate');


        $conference->save();

        session()->flash('flash_message', 'Conference has been created');

        $topicIds = $request->input('topic');

        $conference->topic()->attach($topicIds);

        return redirect('conferenceChair/createConference');
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
