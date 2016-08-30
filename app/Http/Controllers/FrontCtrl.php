<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FrontCtrl extends Controller {
	
	public function index()
	{
		return View('front.index');
	}

}
