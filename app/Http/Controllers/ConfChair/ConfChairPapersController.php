<?php namespace App\Http\Controllers\ConfChair;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaperReview;
use App\User;
use Illuminate\Support\Facades\DB;

use Auth;
use Illuminate\Http\Request;
use App\Paper;
use Illuminate\Support\Facades\Input;

class ConfChairPapersController extends Controller {

    private $paper;
    private $paperReview;
    private  $user;

    public function __construct(Paper $paper, PaperReview $paperReview, User $user)
    {
        $this->paper = $paper;
        $this->paperReview = $paperReview;
        $this->user = $user;
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

//		$papers = $this->getPapers();
//        $papers = $this->paper
//                ->select('title')
//                ->get();

//        $reviewerNo = DB::table('papers')
//            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
//            ->select('papers.title')
////            ->where('papers.id', '=', '11')
//            ->count('paper_reviews.score');

        $reviewerNo = DB::table('papers')
            ->leftJoin('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->select(DB::raw(' papers.title, papers.status, count(paper_reviews.reviewer_id) as ReviewerNo'))
            ->groupBy('papers.id')
//            ->orderBy('papers.id', 'desc')
            ->get();

//        $papers = DB::table('papers')
//            ->select('title')
//            ->get();

//        dd($reviewerNo);

		return view('conferenceChair.allPapers', compact('reviewerNo'));
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
	public function store($id, PaperReview $paperReview)
	{
        $userId = Auth::user()->email;

        $getReviewers = Input::get('reviewer');
        $paperReview->reviewer_id = $getReviewers;
        $paperReview->assigned_by = $userId;
		$paperReview->paper_id = $id;
        $paperReview->flag = 6; //6 means that the flag is active

        $reviewer = DB::table('paper_reviews')
            ->select('reviewer_id', 'paper_id')
            ->where('reviewer_id', '=', $getReviewers )
            ->where('paper_id', '=', $id )
            ->get();

        $tempId = DB::table('paper_reviews')
            ->select('tempId')
            ->where('paper_id', '=', $id )
            ->max('tempId');




        if($reviewer == null)
        {
            $paperReview->tempId = $tempId + 1;//Increment on the reviewer assigned number

            $paperReview->save();

            session()->flash('flash_message', 'This paper has been assigned to the reviewer respectively');
        }
        else
        {
            return 'This paper has been assigned to this reviewer and you are allowed to assign the same reviewer to this paper again';
        }

//        dd($reviewer);
//        $paperReview->save();

        return redirect('conferenceChair/allPapers');

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //Session for navigation menu bar
        \Session::flash('confChair', '1');

        $paper = $this->paper->get()[$id];
//        dd($paper);

//        $reviewers = User::lists('firstname','email');
        $reviewers = User::join('user_user_roles','user_id','=','email')
                    ->where('user_role_id','=','5')
                    ->lists('firstname','email');



        return view('conferenceChair.assignPapers', compact('reviewers', 'paper'));

//		$assignPaper = $this->getPapers()[$id];
//
//        $withinCategory = ['John Cena (3)','Roman Reigns (4)', 'Dwayne Johnson (1)', 'Daniel Bryant (5)'];
//        $outCategory = ['Brock Lesnar (2)','Luke Harper (3)', 'Damien Shandow (1)'];
//
//		return view('conferenceChair.assignPapers', compact('assignPaper', 'withinCategory', 'outCategory'));

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

    private function getPapers()
    {
        return ['(1) - Man-Computer Symbiosis',
            '(2) - The Computer as a Communication Device',
            '(2) - Electricity over IP',
            '(3) - The Infinite Monkey Protocol Suite (IMPS)',
            '(2) - Information Flow in Large Communication Nets',
            '(4) - The Roman Standards Process -- Revision III',
            '(4) - Standard for the transmission of IP datagrams on avian carries',
            '(5) - Toward A Cooperative Network Of Time-Shared Computers'
        ];
    }

}
