<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Vaccine;
use Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
 

class VaccineController extends Controller {



	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vaccines = Vaccine::all();
		return view('vaccines.index', compact('vaccines'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		$file = Request::file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$vaccine= new Vaccine();
		$vaccine->mime = $file->getClientMimeType();
		$vaccine->original_filename = $file->getClientOriginalName();
		$vaccine->filename = $file->getFilename().'.'.$extension;
		$vaccine->description=Request::input('description');
		$vaccine->name=Request::input('name');
		
		$vaccine->save();
		return redirect('vaccine');

	}

	public function get($filename){
	
		$vaccine = Vaccine::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($vaccine->filename);

		return (new Response($file, 200))
              ->header('Content-Type', $vaccine->mimes);
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
