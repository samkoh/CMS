<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Conference;
use Auth;
use App\UserConference;
use App\UserUserRole;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller {


	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

    /*
     * This can specify after user register, where and what is the
     * page will be directed to
     */

    protected $redirectTo = '/';
//	protected $redirectTo = '/conferenceChair';


	/**
	 * Create a new authentication controller instance.
	 *
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);

	}

    public function getRegister()
    {
        //temporary set the conference id to null
        $conferenceId = "";

        //Get all the created conferences filter by end date
        $conferenceNames = DB::table('conferences')
            ->select('id','conferenceName')
            ->where('endDate','>',Carbon::now())
            ->get();

//dd($conferenceNames);
//        return view('auth.register');
        return view('auth.register', compact('conferenceId','conferenceNames'));
//        return \Redirect::action('Auth\AuthController');
//        return redirect($this->getShow($conferenceId));
    }

    public function  getShow($id)
    {
        $email = \Input::get('email');

        $existanceEmail = DB::table('users')
            ->select('email')
            ->where('email', '=', $email)
            ->first();

        if ($existanceEmail == null)
        {
            //get the hashed conference id and assign into a variable
            $conferenceId = $id;

            return view('auth.register', compact('conferenceId'));
        } else
        {
            return redirect('auth/login');
        }
    }

    public function postRegister(Request $request, Conference $conference, User $user, UserUserRole $userUserRole)
    {
        $validator = $this->registrar->validator($request->except('user_role'));

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->auth->login($this->registrar->create($request->except('user_role')));

        //get the hashed conference id from the register (view) page
        $conferenceId = $request->input('conference_id');
        //select the conference id based on the given hashed conference id
        $hashedConferenceId = DB::table('message_logs')
            ->select('conference_id')
            ->where('conference_hash_id', '=', $conferenceId)
            ->first();

        //This is to differentiate between reviewer login or others' login, reviewer has conference id while others no
        if ($hashedConferenceId == true)
        {
            /*
             * Retrieve the user id and email from the Auth model
             */
            $userId = Auth::user()->id;
            $userEmail = Auth::user()->email;

            /*
             * Assign the variables to database user_user_roles according to the table name
             */
            $userUserRole->user_table_id = $userId;
            $userUserRole->user_id = $userEmail;
            $userUserRole->user_role_id = 5;  //Role id 5 is reviewer
//            $userUserRole->conference_id = \Crypt::decrypt($conferenceId);

            //strClass exception will thrown if did not specify the conference_id because the result that get from database is an object
            $userUserRole->conference_id = $hashedConferenceId->conference_id;

            $userUserRole->save();
        }
        else
        {
            /*
            * Retrieve the user id and email from the Auth model
            */
            $userId = Auth::user()->id;
            $userEmail = Auth::user()->email;
            $userRoleId = $request->input('user_role');

            /*
             * Assign the variables to database user_user_roles according to the table name
             */
            $userUserRole->user_table_id = $userId;
            $userUserRole->user_id = $userEmail;
            $userUserRole->user_role_id = $userRoleId; //user_role_id = 6 means author
            $userUserRole->conference_id = $conferenceId;

            $userUserRole->save();
        }

        return redirect($this->redirectPath());
    }

}
