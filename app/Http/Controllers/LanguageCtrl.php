<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

class LanguageCtrl extends Controller {

	public function switcher($lang)
	{
		App::setLocale($lang);
		/*Session::set('local',$lang);*/
		return redirect()->back();
	}

}
