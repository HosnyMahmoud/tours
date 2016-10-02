<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Travels ;
use App\Hotel ;
use App\Countries;
use App\Cities;
use Validator;
use Session;
use Lang;
use Mail;



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

	public function hotels(Request $request)
	{
		$regions = [''=>Lang::get('hotels.choose_city')];
		$countries = Countries::all();
		$cities = Cities::get();
		$i = 1;
		foreach ($countries as $country) {
			$cities = Cities::where('country_id',$country->id)->get();
			$z = 0;
			foreach ($cities as $city) {
			 
				$regions[$country['name_'.Session::get('local')]][$city['id']]  =  $city['name_'.Session::get('local')]; 
				$z++;	
			}

			$i++;
		}
		
		$query = Hotel::latest('created_at');
		if($request->has('hotel_name'))
		{
			$query->where('name_'.Session::get('local'),'like','%'.$request->hotel_name.'%');
		}

		if($request->has('city'))
		{
			$query->where('city_id',$request->city);
		}

		if($request->has('price_from'))
		{
			$query->where('price','>=',$request->price_from);
		}

		if($request->has('price_to'))
		{
			$query->where('price','<=',$request->price_to);
		}
		$hotels = $query->paginate(8);

		return View('front.hotels.index',compact('hotels','regions','countries','cities','request'));
	}

	// one travel
	public function hotel($id,$slug)
	{
		$hotels = Hotel::findOrFail($id);
		if($hotels['slug_'.Session::get('local')] !== $slug )
		{
			return redirect()->to(Url('/').'/hotels/'.$id.'-'.$hotels['slug_'.Session::get('local')]);
		}
		$images = explode('|',$hotels->images);
		$related = Hotel::where('id','!=',$id)->where('tags_ar','like','%'.$hotels->tags_ar.'%')->orWhere('tags_en','like','%'.$hotels->tags_en.'%')->take(2)->get();
		return View('front.hotels.hotel',compact('hotels','images','related'));
	}

	public function services()
	{
		return View('front.services.index');
	}

	public function contact()
	{
		return View('front.contact.index');
	}

	public function sendContact(Request $request)
	{
		$rules = [
			'name'		=>'required',
			'email'		=>'required|email',
			'subject'	=>'required',
			'msg'		=>'required',	
		];
		$validator = Validator::make($request->all(),$rules);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInputs();
		}

		$data = [
			'name' => $request->name,
			'email' => $request->email,
			'subject' => $request->subject,
			'msg' => $request->msg,
		];
		Mail::send('emails.feedback', $data, function($message) {
		    $message->from('info@voyage-app.com', 'Voyage App Admin');
		    $message->to('info@voyage-app.com', 'Voyage App Admin')->subject('New Contact Us Request');
		});
	}
}
