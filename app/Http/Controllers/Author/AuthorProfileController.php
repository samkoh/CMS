<?php namespace App\Http\Controllers\Author;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AuthorProfileController extends Controller {

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $userEmail = Auth::user()->email;

            $user = DB::table('users')
                ->select('id','firstname','lastname','email','nationalIdentityNo', 'addressLine1','addressLine2','addressLine3','city', 'state', 'postalCode', 'contactNo', 'faxNo')
                ->where('email', '=', $userEmail)
                ->first();

            return view('author.profile', compact('user'));
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
	 * @param  $id
	 * @return Response
	 */
	public function show($id)
	{

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
	 * @param  string  $email
	 * @return Response
	 */
	public function update($email)
	{
//dd($email);
        $userDetails = User::where('email', '=', $email )
            ->first();

        $userDetails->firstname = Input::get('firstname');
        $userDetails->lastname = Input::get('lastname');
        $userDetails->nationalIdentityNo = Input::get('nationalIdentityNo');
        $userDetails->addressLine1 = Input::get('addressLine1');
        $userDetails->addressLine2 = Input::get('addressLine2');
        $userDetails->addressLine3 = Input::get('addressLine3');
        $userDetails->city = Input::get('city');
        $userDetails->state = Input::get('state');
        $userDetails->contactNo = Input::get('contactNo');
        $userDetails->faxNo = Input::get('faxNo');

        $userDetails->save();
//dd($userDetails);
        return redirect('/');
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
