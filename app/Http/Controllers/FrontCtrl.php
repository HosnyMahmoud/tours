<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Travels ;
class FrontCtrl extends Controller {
	
	public function index()
	{
		$travels = Travels::latest('created_at')->take(4)->get();
		//dd($travels);
		return View('front.index',compact('travels'));
	}
	public function travels()
	{
		$travels = Travels::latest('created_at')->paginate(6);
		return View('front.travels.index',compact('travels'));
	}

}
