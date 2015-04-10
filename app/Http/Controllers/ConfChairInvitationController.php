<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Invitation;

class ConfChairInvitationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('conferenceChair.invitation');
	}

	public function confirm(Requests\PrepareInvitationRequest $request, Guard $auth)
	{
		//$data = $request->all();

		$template = $this->compileInvitationMessage($data = $request->all(), $auth);

		session()->put('invitationConfirm', $data); //Store the $data's info into a session

		return view('conferenceChair.invitationConfirm', compact('template'));
	}

	private function compileInvitationMessage($data, Guard $auth)
	{
		$data = $data + [
			'name' => $auth->user()->name,
			'email' => $auth->user()->email,
		];

		return view()->file(app_path('Http/Templates/invitationTemplate.blade.php'), $data);
		
	}	

	private function createInvitation(Request $request)
	{
		$notice = session()->get('invitationConfirm');
		//$data = \Request::input('template');
		//return $data;
		//return \Request::input('template');
		//Invitation::open($data)
				//->useTemplate($request->input('template'))
				//->save();
		//$notice = Invitation::open($data)->useTemplate($request->input('template'));
		$notice = session()->get('invitationConfirm') + ['template' => $request->input('template')];
		
		$notice = \Auth::user()->notices()->create($notice);

		return $notice;
		
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
	public function store(Request $request)
	{
		$notice = $this->createInvitation($request);

		//Fire off the email
		\Mail::queue(['text'=> 'emails.invitationMessage'], compact('notice'), function($message) use ($notice) {
			$message->from($notice->getOwnerEmail())
					->to($notice->getRecipientEmail())
					->subject('Conference Invitation');
		});
		//return $invitation;
		//return redirect('conferenceChair');
		//$data = session()->get('invitationConfirm');
		//return \Request::input('template');
		//$notice = Invitation::open($data)->useTemplate($request->input('template'));
		
		//\Auth::user()->notices()->save($notice);				
		return redirect('conferenceChair');
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
