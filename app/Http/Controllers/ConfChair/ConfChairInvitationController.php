<?php namespace App\Http\Controllers\ConfChair;

use App\Conference;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\RecipientMessageLog;
use App\MessageLog;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class ConfChairInvitationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $conferenceName = Conference::lists('conferenceName', 'id');

//        $conferenceName = DB::table('conferences')
//            ->select('id', 'conferenceName')
//            ->get();

//dd($conferenceName);
        return view('conferenceChair.invitation', compact('conferenceName'));
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
//dd($template);
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
        $conferenceName = DB::table('conferences')
            ->select('conferenceName')
            ->where('id', '=', $data['conferenceName'])
            ->get();
//        dd($conferenceName);
        $data = $data + [
                'SenderName' => $auth->user()->firstname,
                'SenderEmail' => $auth->user()->email,
                'ConferenceName' => $conferenceName,
                'ConferenceId' => \Crypt::encrypt($data['conferenceName']),
//                'ConferenceId' => \Crypt::encrypt('ConferenceName'),
//                'ConferenceId' => md5('ConferenceName'),
//                'ConferenceId' => password_hash("ConferenceId", PASSWORD_BCRYPT, array()),

            ];
//        $newData = $data['ConferenceId'];
//
//        $encryptData = \Crypt::encrypt('$newData');

//        dd($data);

        return view()->file(app_path('Http/Templates/invitationTemplate.blade.php'), $data);
    }

    private function createInvitation(Request $request, RecipientMessageLog $recipientMessageLog, MessageLog $messageLog)
    {
        $data = session()->get('invitation');
        $mailTitle = session()->get('invitation.subject');
        $recipientEmail = session()->get('invitation.email');
        $conferenceId = session()->get('invitation.conferenceName');

        $content = MessageLog::open($data)->useTemplate($request->input('template'));

        $content->title = $mailTitle;
        $content->conference_id = $conferenceId;

        $recipientMessageLog->user_id = Auth::user()->email;
        $recipientMessageLog->recipient_id = $recipientEmail;

        $content->save();
        //This is to get the last inserted current id that has been inserted into MessageLog database
        $contentId = DB::getPdo()->lastInsertId();

        $recipientMessageLog->messagelog_id = $contentId;
        $recipientMessageLog->save();

        return $content;
        return $recipientMessageLog;

//        $content = session()->get('invitation') + ['template' => $request->input('template')];
//
//        $content = $recipientEmail->invitations()->create($content);
//        dd($content);
//
//        return $content;
////        $content->save();
    }

    /**again
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, RecipientMessageLog $recipientMessageLog, MessageLog $messageLog)
    {
        $content = $this->createInvitation($request, $recipientMessageLog, $messageLog);
        $senderEmail = $recipientMessageLog->user_id;
        $recipientEmail = $recipientMessageLog->recipient_id;
        $subject = $content->title;
//dd($subject);
        //Email
        \Mail::queue('emails.invitationMessage', compact('content', 'senderEmail', 'recipientEmail', 'subject'), function ($message) use ($content, $senderEmail, $recipientEmail, $subject)
        {
            $sender = $senderEmail;
            $recipient = $recipientEmail;
            $message->from($sender)
                ->to($recipient)
                ->subject($subject);
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
