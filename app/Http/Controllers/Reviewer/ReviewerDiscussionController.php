<?php namespace App\Http\Controllers\Reviewer;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaperDiscussion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Paper;
use Auth;

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

        $papers = DB::table('papers')
            ->join('paper_reviews', 'papers.id', '=', 'paper_reviews.paper_id')
            ->select('papers.id','papers.title', 'papers.tempStatus', 'papers.averageMarks', 'papers.created_at')
            ->where('paper_reviews.reviewer_id', '=', $userId)
            ->where('papers.tempStatus', '=', 'Reject')
            ->orderBy('papers.created_at', 'desc')
            ->get();

//        dd($papers);
		return view('reviewer.discussion', compact('papers'));
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

        $this->paperDiscussion->save();

        session()->flash('flash_message', 'Your comment has been added');

        return redirect('reviewer/discussion');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

//        $paper = $this->paper->get()[$id];
        $paper = Paper::find($id);

//        dd($paper);
//        $paperDiscussion = $this->paperDiscussion->get() [$paper->id];
        $paperDiscussion = DB::table('paper_discussions')
            ->where('paper_id', '=', $paper->id)
            ->select('content', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();
//    dd($paperDiscussion);
		return view('reviewer.showDiscussion', compact('paper', 'paperDiscussion'));
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
