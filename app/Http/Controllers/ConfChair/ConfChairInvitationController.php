<?php namespace App\Http\Controllers\ConfChair;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\RecipientMessageLog;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    public function confirm(Requests\PrepareInvitationRequest $request, Guard $auth)
    {
        $template = $this->compileInvitationTemplate($data = $request->all(), $auth);

        session()->flash('invitation', $data);

        return view('conferenceChair.invitationConfirm', compact('template'));
    }

    /*
     * Compile the Invitation message template from the form data
     *
     * @param $data
     * @param Guard $auth
     * @return mixed
     */
    private function compileInvitationTemplate($data, Guard $auth)
    {
        $data = $data + [
                'SenderName' => $auth->user()->firstname,
                'SenderEmail' => $auth->user()->email,
            ];

        return view()->file(app_path('Http/Templates/invitationTemplate.blade.php'), $data);
    }

    private function createInvitation(Request $request)
    {
        $data = session()->get('invitation');
        $recipientEmail = session()->get('invitation.email');

        $content = RecipientMessageLog::open($data)->useTemplate($request->input('template'));

        $content->user_id = Auth::user()->email;
        $content->recipient_id = $recipientEmail;


        $content->save();
        session()->flash('flash_message', 'Your invitation has been sent out successfully');

        return $content;

//        $content = session()->get('invitation') + ['template' => $request->input('template')];
//
//        $content = $recipientEmail->invitations()->create($content);
//        dd($content);
//
//        return $content;
////        $content->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $content = $this->createInvitation($request);
        $sender = $content->user_id;
        $recipient = $content->recipient_id;
//dd($recipient);
        //Email
        \Mail::queue('emails.invitationMessage', compact('content'), function ($message) use ($content)
        {
            $sender = $content->user_id;
            $recipient = $content->recipient_id;
            $message->from($sender)
                ->to($recipient)
                ->subject('Invitation');
        });

        return redirect('/');
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
