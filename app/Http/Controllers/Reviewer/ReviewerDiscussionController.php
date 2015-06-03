<?php namespace App\Http\Controllers\Reviewer;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaperDiscussion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Paper;
use Auth;
use Illuminate\Support\Facades\Redirect;

class ReviewerDiscussionController extends Controller {


    private $paper;
    private $paperDiscussion;

    public function __construct(Paper $paper, PaperDiscussion $paperDiscussion)
    {
        $this->paper = $paper;
        $this->paperDiscussion = $paperDiscussion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

//		$papers = $this->getPapers();
        /*
         * Get the partially accepted status papers
         */

//        $papers = $this->paper
//                ->where('status', '=', 'Partially Accept')
//                ->get();

        $userId = Auth::user()->email;

        //Check whether the user is conference chair or not
        $userRole = DB::table('user_user_roles')
            ->select('user_role_id')
            ->where('user_id', '=', $userId)
            ->first();

//dd($userRole);
        if ($userRole->user_role_id == 1)
        {
            //Session for navigation menu bar
            \Session::flash('confChair', '1');

//            $papers = DB::table('papers')
//            ->select('id', 'title', 'tempStatus', 'averageMarks', 'created_at')
//            ->whereIn('tempStatus', [- 1, - 3])
//            ->where('status', '=', '')
//            ->orderBy('created_at', 'desc')
//            ->get();

            $conflictPapers = DB::table('papers')
                ->select('id', 'title', 'tempStatus', 'averageMarks', 'created_at')
                ->where('tempStatus', '=', - 3)
//                ->where('status', '=', '')
                ->orderBy('created_at', 'desc')
                ->get();

            $rejectPapers = DB::table('papers')
                ->select('id', 'title', 'tempStatus', 'averageMarks', 'created_at')
                ->where('tempStatus', '=', - 1)
//                ->where('status', '=', '')
                ->orderBy('created_at', 'desc')
                ->get();

            $acceptPapers = DB::table('papers')
                ->select('id', 'title', 'tempStatus', 'averageMarks', 'created_at')
                ->where('tempStatus', '=', 1)
//                ->where('status', '=', '')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('conferenceChair.confDiscussion', compact('conflictPapers', 'rejectPapers', 'acceptPapers'));

        } else
        {
            //Session for navigation menu bar
            \Session::flash('reviewer', '5');

            $papers = DB::table('papers')
                ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
                ->select('papers.id', 'papers.title', 'papers.tempStatus', 'papers.averageMarks', 'papers.created_at')
                ->where('paper_reviews.reviewer_id', '=', $userId)
                ->whereIn('papers.tempStatus', [- 1, - 3])
                ->where('status', '=', '') //reviewer: display status is null only
                ->orderBy('papers.created_at', 'desc')
                ->get();

            return view('reviewer.discussion', compact('papers'));
        }


//        dd($papers);
//        return view('reviewer.discussion', compact('papers'));
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
    public function store($id)
    {
        $userId = Auth::user()->email;

        $this->paperDiscussion->user_id = $userId;
        $this->paperDiscussion->paper_id = $id;
        $this->paperDiscussion->content = Input::get('content');
        $this->paperDiscussion->status = 1;

        $this->paperDiscussion->save();

        session()->flash('flash_message', 'Your comment has been added');

//        return redirect('reviewer/discussion/');
        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $userId = Auth::user()->email;

        //Check whether the user is conference chair or not
        $userRole = DB::table('user_user_roles')
            ->select('user_role_id')
            ->where('user_id', '=', $userId)
            ->first();
        if ($userRole->user_role_id == 1)
        {
            //Session for navigation menu bar
            \Session::flash('confChair', '1');
        } else
        {
            //Session for navigation menu bar
            \Session::flash('reviewer', '5');
        }

        $paper = Paper::find($id);

//        $arrangement = DB::table('paper_reviews')
//            ->select('id')
//            ->where('paper_id', '=', $id)
//            ->get();
//
//        $array_size = count($arrangement);
//
//        for($i=0; $i < $array_size; $i++)
//        {
//            for($j=0; $j < $array_size; $j++)
//            {
//                if($arrangement[$i] < $arrangement[$j])
//                {
//                    $temp = $arrangement[$i];
//                    $arrangement[$i] = $arrangement[$j];
//                    $arrangement[$j] = $temp;
//                }
//            }
//        }
//dd($arrangement[$i]);

//        $paperDiscussion = DB::table('paper_discussions')
//            ->join('user_user_roles','paper_discussions.user_id', '=', 'user_user_roles.user_id')
//            ->where('paper_discussions.paper_id', '=', $paper->id)
//            ->select('paper_discussions.content', 'user_user_roles.user_role_id', 'paper_discussions.created_at')
//            ->where('paper_discussions.status', '=', 1)//status is active
//            ->orderBy('paper_discussions.created_at', 'desc')
//            ->get();

        $paperDiscussion = DB::table('paper_discussions')
            ->join('user_user_roles', 'paper_discussions.user_id', '=', 'user_user_roles.user_id')
            ->join('users','user_user_roles.user_id','=','users.email')
//            ->leftJoin('paper_reviews', 'paper_reviews.reviewer_id', '=', 'user_user_roles.user_id' && 'paper_reviews.paper_id', '=', 'paper_discussions.paper_id')
            ->leftJoin('paper_reviews', function ($join)
            {
                $join->on('paper_reviews.reviewer_id', '=', 'user_user_roles.user_id');
                $join->on('paper_reviews.paper_id', '=', 'paper_discussions.paper_id');
            })
            ->where('paper_discussions.paper_id', '=', $paper->id)
            ->select('paper_discussions.content', 'user_user_roles.user_role_id', 'paper_discussions.created_at', 'paper_reviews.tempId','users.firstname','users.lastname', 'paper_reviews.paperEvaluation')
            ->where('paper_discussions.status', '=', 1)//status is active
            ->orderBy('paper_discussions.created_at', 'desc')
            ->get();

        $showEvaluationMarks = DB::table('paper_reviews')
            ->join('users','paper_reviews.reviewer_id','=','users.email')
            ->select('tempId','paperEvaluation','users.firstname','users.lastname')
            ->where('paper_id','=',$paper->id)
            ->get();

//dd($showEvaluationMarks);
//    dd($paperDiscussion);

        $userId = Auth::user()->email;

        //Check whether the user is conference chair or not
        $userRole = DB::table('user_user_roles')
            ->select('user_role_id')
            ->where('user_id', '=', $userId)
            ->first();
//dd($userRole);
        if ($userRole->user_role_id == 1)
        {
            return view('conferenceChair.confShowDiscussion', compact('paper', 'paperDiscussion','showEvaluationMarks'));
        } else
        {
            return view('reviewer.showDiscussion', compact('paper', 'paperDiscussion', 'showEvaluationMarks'));

        }
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

    //	public function showDiscussion($id)
//	{
//		$paper = $this->getPapers()[$id];
//
//		return view('reviewer.showDiscussion', compact('paper'));
//	}

//	private function getPapers()
//	{
//		return ['(1) - Man-Computer Symbiosis',
//				'(1) - The Computer as a Communication Device',
//				'(1) - Electricity over IP',
//				'(1) - The Infinite Monkey Protocol Suite (IMPS)'];
//	}

}
