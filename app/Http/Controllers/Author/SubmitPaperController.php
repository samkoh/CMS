<?php namespace App\Http\Controllers\Author;

use App\Conference;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

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
        //Session for navigation menu bar
        \Session::flash('author', '6');

        //Get the conference name and id
        $conferenceName = Conference::lists('conferenceName', 'id');


        return view('author.submitPaper', compact('conferenceName'));
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
    public function store(Request $request, Paper $paper, Requests\UploadFileRequest $request)
    {
        $paper->conference_id = Input::get('conferenceId');
        $paper->title = Input::get('title');
        $paper->abstractContent = Input::get('abstractContent');
        $paper->user_id = Auth::user()->email;

        if (Input::hasFile('fullPaperUrl'))
        {
            $file = Input::file('fullPaperUrl');
            $name = time() . '-' . $file->getClientOriginalName();
            /*
             * This is PaperUrl encryption using crypt method in laravel itself.
             */
//            $encryptname = Crypt::encrypt('$name');
            /*
             * This is the PaperUrl using hash method.
             * The array of the hash method can be change according to user preference, here I am using 5
             */
//            $encryptname = Hash::make($name, array('rounds' => 5));
            /*
             * This is the PaperUrl encryption using md5 method to hash the original PaperUrl
             */
             $encryptname = md5($name);

            /*
             * This is the paper directory where it's location storage
             */
            $file = $file->move(public_path() . '/papers/', $encryptname);

            $paper->fullPaperUrl = $encryptname;
        }

        $paper->save();
        session()->flash('flash_message', 'Your paper has been submitted');

        /*
         * This method is using request method where by it will retrieve all the user input value and save into the database
         * using it's save method.
         * Due to the naming method of the file's name when user upload, i use another method and comment this method
         */
//        $paper = Auth::user()->papers()->create($request->all());

        return redirect()->route('author.index');
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
