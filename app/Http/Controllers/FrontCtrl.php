<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Airline_tickets_reserv;
use App\HotelsReservations;
use App\ReservTravel;
use App\Testimonials;
use App\Countries;
use App\Settings;
use App\Travels;
use App\AirPort;
use App\Hotel;
use App\User;
use App\Cities;
use App\WishList;
use App\contactUs;
use Validator;
use Session;
use Lang;
use Mail;
use Auth;
use Carbon\Carbon;

class FrontCtrl extends Controller {
	
	/***** home page ****************/
	public function index()
	{
		$travels = Travels::latest('created_at')->take(4)->get();
		$countries = Countries::lists('name_'.Session::get('local'),'id'); 
		$testimonials = Testimonials::where('status',1)->latest('created_at')->take(5)->get();
		$users = User::all();
		
		return View('front.index',compact('travels','countries','testimonials','users'));
	}

	public function get_Airports($id)
	{
		$cities = Cities::where('country_id',$id)->get();
		$airPorts = [];
		$i = 0;
		foreach ($cities as $city) {
			$airPort = AirPort::where('city_id',$city->id)->get();
			foreach ($airPort as $air) {
				$airPorts[$i]['id']  =  $air->id;
				$airPorts[$i]['name']  =  $air['name_'.Session::get('local')];
				$i++;
			}
		}
		return response()->json(['airports'=>$airPorts]);
	}

	public function reserv_tickets(Request $request)
	{
		$rules = [
			'airport_from'		=>'required|different:airport_to',
			'airport_to'		=>'required|different:airport_from',
			'num_persons'		=>'required|numeric',
			'num_child'			=>'numeric',	
			'date_from'			=>'required|date',
			'date_to'			=>'date',
		];

		$validator = Validator::make($request->all(),$rules);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}else{
			$request->merge(['date_from'=>Carbon::parse($request->date_from)]);
			if($request->has('date_to')){
				$request->merge(['date_to'=>Carbon::parse($request->date_to)]);
				$request->merge(['type'=>1]);
			}else{
				$request->merge(['date_to'=>NULL]);
				$request->merge(['type'=>0]);
			}
			$request->merge(['user_id'=>Auth::client()->get()->id]);
			Airline_tickets_reserv::create($request->all());
			return redirect()->back()->with(['msg'=>Lang::get('index.done_reserv')]);
		}
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
		$images = explode('|', $travel->images);
		$isWishlist = (WishList::where('list_id',$id)->where('type',2)->where('user_id',Auth::client()->get()->id)->count() > 0);
		return View('front.travels.travel',compact('travel','images','isWishlist'));
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
		$isWishlist = (WishList::where('list_id',$id)->where('type',1)->where('user_id',Auth::client()->get()->id)->count() > 0);
		
		$related = Hotel::where('id','!=',$id)->where('tags_ar','like','%'.$hotels->tags_ar.'%')->orWhere('tags_en','like','%'.$hotels->tags_en.'%')->take(2)->get();
		return View('front.hotels.hotel',compact('hotels','images','related','isWishlist'));
	}

	public function hotelWishlist($id)
	{
		$isWishlist = (WishList::where('list_id',$id)->where('type',1)->where('user_id',Auth::client()->get()->id)->count() > 0);
		if($isWishlist === false){
			WishList::create([
			'user_id'=>Auth::client()->get()->id,
			'list_id'=>$id,
			'type'=>1,
			]);
		}else{
			WishList::where('list_id',$id)->where('type',1)->where('user_id',Auth::client()->get()->id)->delete();
		}
		return redirect()->back();
	}

	public function travelsWishlist($id)
	{
		$isWishlist = (WishList::where('list_id',$id)->where('type',2)->where('user_id',Auth::client()->get()->id)->count() > 0);
		if($isWishlist === false){
			WishList::create([
			'user_id'=>Auth::client()->get()->id,
			'list_id'=>$id,
			'type'=>2,
			]);
		}else{
			WishList::where('list_id',$id)->where('type',2)->where('user_id',Auth::client()->get()->id)->delete();
		}
		return redirect()->back();
	}

	public function reserve_hotels(Request $request)
	{
		$validator =  Validator::make($request->all(), [
			'persons'	=>		'required|numeric|min:1',
			'date_from'	=>		'required|date',
			'date_to'	=>		'required|date',

		]);
		if ($validator->fails()) {
            return redirect()
            			->back()
                        ->withInput()
                        ->withErrors($validator);
        }else{
        	$settings = Settings::first(); 
        	$request->merge(['user_id'=>Auth::client()->get()->id]);
        	$request->merge(['date_from'=>Carbon::parse($request->date_from)]);
        	$request->merge(['date_to'=>Carbon::parse($request->date_to)]);
			$reserv = HotelsReservations::create($request->all());
			$code = "hotels_".$reserv->id;
			$data = ['code'=>$code];
			Mail::send('emails.reserve', $data, function($message) use($request,$settings) {
			   $message->subject('تأكيد الحجز');
			   $message->from($settings->email,$settings->name);
			   $message->to(Auth::client()->get()->email, Auth::client()->get()->name);
			});
			return redirect()->back()->with(['msg'=>'success']);


		}
	}
	public function reserve_travels(Request $request)
	{
		$settings = Settings::first();
    	$request->merge(['travel_id'=>Auth::client()->get()->id]);
    	$request->merge(['user_id'=>Auth::client()->get()->id]);
    	$request->merge(['date_from'=>Carbon::parse($request->date_from)]);
    	$request->merge(['date_to'=>Carbon::parse($request->date_to)]);
		$reserv = ReservTravel::create($request->all());
		$code = "travels_".$reserv->id;
		$data = ['code'=>$code];
		Mail::send('emails.reserve', $data, function($message) use($request,$settings) {
		   $message->subject('تأكيد الحجز');
		   $message->from($settings->email,$settings->name);
		   $message->to(Auth::client()->get()->email, Auth::client()->get()->name);
		});
		return redirect()->back()->with(['msg'=>'success']);

	}

	public function services()
	{
		return View('front.services.index');
	}

	public function about()
	{
		$settings = Settings::first();
		$abouts = contactUs::take(6)->get();
		return View('front.about.index',compact('settings','abouts'));
	}
	public function contact()
	{
		$settings = Settings::first();
		$phone = explode('-', $settings->phone);
		return View('front.contact.index',compact('settings','phone'));
	}



	public function sendContact(Request $request)
	{
		$settings = Settings::first();
		$rules = [
			'name'		=>'required',
			'email'		=>'required|email',
			'subject'	=>'required',
			'msg'		=>'required',	
		];
		$validator = Validator::make($request->all(),$rules);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$data = [
			'name' => $request->name,
			'email' => $request->email,
			'subject' => $request->subject,
			'msg' => $request->msg,
		];
		Mail::send('emails.feedback', $data, function($message) use($request,$settings) {
		   $message->subject($request->about);
		   $message->from($request->email,$request->name);
		   $message->to($settings->email,$settings->email);
		});
		$message = (Session::get('local') == 'ar') ? 'تم إرسال رسالتك بنجاح': 'Your Message Sent Suuceesfulluy';
		return redirect()->back()->with(['msg'=>$message]);

	}
}
