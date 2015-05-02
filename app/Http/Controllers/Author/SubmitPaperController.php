<?php namespace App\Http\Controllers\Author;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Paper;
use Illuminate\Http\Request;

class SubmitPaperController extends Controller {

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
		return view('author.submitPaper');
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
	public function store(Request $request, Paper $paper)
	{
		$paper = Auth::user()->papers()->create($request->all());

//        $file = Request::file('fullPaperUrl');
//        $extension = $file->getClientOriginalExtension();
//        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
//        $entry = new Fileentry();
//        $entry->mime = $file->getClientMimeType();
//        $entry->original_filename = $file->getClientOriginalName();
//        $entry->filename = $file->getFilename().'.'.$extension;
//
//        $paper = $entry;

        return redirect()->route('author.index');
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
