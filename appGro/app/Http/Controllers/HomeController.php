<?php namespace App\Http\Controllers;
use Session;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	public function portal($id)
	{
		
		Session::put('key',$id);				
		return view ('portal');

	}
	public function portal_p()
	{
		
						
		return view ('portal');

	}
	public function veterinaria()
	{
		
						
		return view ('veterinaria');

	}
	public function alimentacion()
	{
		
						
		return view ('alimentacion');

	}
	
	

}
