<?php namespace App\Http\Controllers\ConfChair;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfChairUserProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //Session for navigation menu bar
        \Session::flash('confChair', '1');

        $users = DB::table('users')
            ->join('user_user_roles', 'users.email', '=', 'user_user_roles.user_id')
            ->select('user_user_roles.user_role_id','users.firstname','users.lastname','users.email')
            ->where('user_user_roles.user_role_id', '!=', 1)
            ->orderBy('user_user_roles.user_role_id', 'asc')
            ->get();
//dd($users);
        return view('conferenceChair.usersProfile', compact('users'));
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
	 * @param  string  $email
	 * @return Response
	 */
	public function show($email)
	{
//        dd($email);
        $user = DB::table('users')
            ->select('id','firstname','lastname','email','nationalIdentityNo', 'addressLine1','addressLine2','addressLine3','city', 'state', 'postalCode', 'contactNo', 'faxNo')
            ->where('email', '=', $email)
            ->first();

//dd($user);
        return view('author.profile', compact('user'));
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
