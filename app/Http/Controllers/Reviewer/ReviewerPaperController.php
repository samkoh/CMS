<?php namespace App\Http\Controllers\Reviewer;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Request;
use App\Paper;

//use Illuminate\Http\Request;

class ReviewerPaperController extends Controller {

    private $paper;

    public function __construct(Paper $paper)
    {
        $this->paper = $paper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//		$papers = $this->getPapers();
//
//		return view('reviewer.paper', compact('papers'));

        $papers = $this->paper->get();

        return view('reviewer.paper', compact('papers'));
    }

    /*
     * This is GET method for download the uploaded file
     */
    public function get($fullPaperUrl)
    {

        $file = Paper::where('fullPaperUrl', '=', $fullPaperUrl)->firstOrFail();

        $file = public_path() . '/papers/' . $fullPaperUrl;

        return response()->download($file, "Paper - .doc");
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $paper = $this->paper->get()[$id];

        return view('reviewer.showPaper', compact('paper'));
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
        $paper = Paper::find($id);

        $num1 = Input::get('quality');
        $num2 = Input::get('evaluation');
        $num3 = Input::get('hypotheses');
        $num4 = Input::get('manuscript');


        $answer = ($num1 + $num2 +$num3 + $num4)/4;

        if($answer < 2 && $answer > 0)
        {
            $paper->status = 'Pass';
        }
        else if ($answer == 0)
        {
            $paper->status = 'Partial Pass';
        }
        else
        {
            $paper->status = 'Fail';
        }


        $paper->save();
        return view('reviewer.showPaper', compact('paper'));
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


    /**
     * Dummy data
     */
    private function getPapers()
    {
        return ['(1) - Man-Computer Symbiosis',
            '(1) - The Computer as a Communication Device',
            '(1) - Electricity over IP',
            '(1) - The Infinite Monkey Protocol Suite (IMPS)'];
    }

}
