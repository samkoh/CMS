<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfChairPapersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$papers = $this->getPapers();

		return view('conferenceChair.allPapers', compact('papers'));
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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$assignPaper = $this->getPapers()[$id];

        $withinCategory = ['John Cena (3)','Roman Reigns (4)', 'Dwayne Johnson (1)', 'Daniel Bryant (5)'];
        $outCategory = ['Brock Lesnar (2)','Luke Harper (3)', 'Damien Shandow (1)'];

		return view('conferenceChair.assignPapers', compact('assignPaper', 'withinCategory', 'outCategory'));
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
