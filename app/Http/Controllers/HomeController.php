<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Conference;
use App\Paper;
use App\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

    private $paper;
    private $topic;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct(Paper $paper, Topic $topic, Conference $conference)
	{
		$this->middleware('auth');
        $this->paper = $paper;
        $this->topic = $topic;
        $this->conference = $conference;

    }

	/**
	 * Show the application dashboard to the user.
     * The return page will be returned according to the user id
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
        $conferences = $this->conference->get();

        return view('authorHome', compact('topics', 'conferences'));
    }

}
