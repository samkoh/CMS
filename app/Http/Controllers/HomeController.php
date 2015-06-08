<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Conference;
use App\Paper;
use App\Topic;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $userEmail = Auth::user()->email;

        $userRole = DB::table('user_user_roles')
        ->select('user_role_id')
        ->where('user_id', '=', $userEmail)
        ->first();

        $conferenceManagers = DB::table('users')
            ->join('user_user_roles', 'user_user_roles.user_id', '=', 'users.email')
            ->select('users.nameTitlePrefix','users.firstname', 'users.lastname', 'users.country')
            ->where('user_role_id','=', 2)
            ->get();

        $committeeNames = DB::table('users')
            ->join('user_user_roles', 'user_user_roles.user_id', '=', 'users.email')
            ->select('users.nameTitlePrefix','users.firstname', 'users.lastname', 'users.country')
            ->whereIn('user_role_id', array(3,4))
            ->get();

        $reviewerNames = DB::table('users')
            ->join('user_user_roles', 'user_user_roles.user_id', '=', 'users.email')
            ->select('users.nameTitlePrefix','users.firstname', 'users.lastname', 'users.country')
            ->where('user_role_id','=', 5)
            ->get();

        $authorNames = DB::table('users')
            ->join('user_user_roles', 'user_user_roles.user_id', '=', 'users.email')
            ->select('users.nameTitlePrefix','users.firstname', 'users.lastname', 'users.country')
            ->where('user_role_id','=', 6)
            ->get();

        $confChairName = DB::table('users')
            ->select('firstname','lastname','country')
            ->first();


//        if(\Auth::check() && \Auth::user()->id == '1')
        if (Auth::check() && $userRole->user_role_id == 5)
        {
            //Session for user role
            \Session::flash('reviewer', 'reviewer');
//            $review = \Session::get('reviewer');
//            dd($review);

            $papers = $this->paper->get();

            return view('reviewerHome', compact('papers','confChairName'));

        } else if(Auth::check() && $userRole->user_role_id == 6)
        {
            //Session for user role
            \Session::flash('author', 'author');

            $topics = $this->topic->get();
            $conferences = $this->conference->get();

            return view('authorHome', compact('topics', 'conferences','confChairName'));
        }
        else
        {
            //Session for user role
            \Session::flash('confChair', 'conferenceChair');

            $conferences = $this->conference->get();

            return view('conferenceChairHome', compact('conferences','committeeNames','reviewerNames','authorNames','conferenceManagers'));
        }

    }

}
