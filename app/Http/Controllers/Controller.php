<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Session;
use Carbon\Carbon;
use App;
use Auth ;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function __construct()
	{	
		if((Session::get('local')) == '')
		{
			Session::set('local','en');
			$lang = App::setlocale(Session::get('local'));
			Carbon::setLocale(Session::get('local'));
			return $lang ;
		}else{
			Carbon::setLocale(Session::get('local'));
			Carbon::setLocale(Session::get('local'));
			return $lang = App::setlocale(Session::get('local'));	
		}
	}

	public function make_slug($string = null, $separator = "-") {
	    if (is_null($string)) {
	        return "";
	    }

	    // Remove spaces from the beginning and from the end of the string
	    $string = trim($string);

	    // Lower case everything 
	    // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
	    $string = mb_strtolower($string, "UTF-8");

	    // Make alphanumeric (removes all other characters)
	    // this makes the string safe especially when used as a part of a URL
	    // this keeps latin characters and arabic charactrs as well
	    $string = preg_replace("/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

	    // Remove multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);

	    // Convert whitespaces and underscore to the given separator
	    $string = preg_replace("/[\s_]/", $separator, $string);

	    return str_limit($string,100,'');
	}

}
