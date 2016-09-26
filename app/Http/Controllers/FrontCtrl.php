<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Travels ;
use Session;
class FrontCtrl extends Controller {
	
	/***** home page ****************/
	public function index()
	{
		$travels = Travels::latest('created_at')->take(4)->get();
		//dd($travels);
		return View('front.index',compact('travels'));
	}

	// all travels 
	public function travels(Request $request)
	{
		$query = Travels::latest('created_at');
		if($request->has('type'))
		{
			$query->where('type',$request->type);
		}
		$travels = $query->paginate(20);

		return View('front.travels.index',compact('travels'));
	}

	// one travel
	public function travel($id,$slug)
	{
		$travel = Travels::findOrFail($id);
		if($travel['slug_'.Session::get('local')] !== $slug )
		{
			return redirect()->to(Url('/').'/travels/'.$id.'-'.$travel['slug_'.Session::get('local')]);
		}
		return View('front.travels.travel',compact('travel'));
	}

}
