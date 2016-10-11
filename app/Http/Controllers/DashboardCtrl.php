<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Airline_tickets_reserv;
use App\HotelsReservations;
use App\SpecialOfferReserv;
use App\Cars_Reservation;
use App\ReservTravel;
use App\Testimonials;
use App\Countries;
use App\WishList;
use App\Messages;
use App\Travels;
use App\Cities;
use App\Hotel;
use App\Admin;
use App\User;
use Validator;
use Session;
use Auth;
use Lang;
class DashboardCtrl extends Controller {

	public function index()
	{
		return View('front.dashboard.index');
	}

	public function reservations()
	{
		return View('front.dashboard.reservations.index');
	}
	public function check_reservations(Request $request)
	{
		$code = explode('_',$request->reserv_code);
		$id = @$code[1]; 
		$type = @$code[0]; 

		switch ($type) {
			case 'cars':
				$reserv = Cars_Reservation::find($id);
				break;
			case 'hotels':
				$reserv = HotelsReservations::find($id);
				break;
			case 'offers':
				$reserv = SpecialOfferReserv::find($id);
				break;
			case 'tickets':
				$reserv = Airline_tickets_reserv::find($id);
				break;
			case 'travels':
				$reserv = ReservTravel::find($id);
				break;
				
			default:
				return redirect()->back()->with(['error'=>Lang::get('dashboard.error_404')]);
			break;
		}

		if(!$reserv){
			return redirect()->back()->with(['error'=>Lang::get('dashboard.error_404')]);
		}
		return redirect()->back()->with(['status'=>$reserv->status]);
	}

	public function wishlist()
	{
		$wishlist = WishList::where('user_id',Auth::client()->get()->id)->where('type','!=',0)->where('type','!=',3)->paginate(5);
		$hotels = Hotel::get();
		$travels = Travels::get();
		$type = [1 =>Lang::get('dashboard.hotel'),2 =>Lang::get('dashboard.travel')];
		return View('front.dashboard.wishlist.index',compact('wishlist','hotels','travels','type'));
	}
	
	public function wishlist_delete($id)
	{
		$wishlist = WishList::find($id);
		if(!$wishlist){
			return redirect()->back();
		}
		$wishlist->delete();
		return redirect()->back();
	}
	
	public function msgs()
	{
		$msgs = Messages::where('user_id',Auth::client()->get()->id)->take(500)->get();
		return View('front.dashboard.messages.index',compact('msgs'));
	}

	public function msgsSend(Request $request)
	{
		$admin = Admin::first();
		$request->merge(['admin_id'=>$admin]);
		$request->merge(['user_id'=>Auth::client()->get()->id]);
		$request->merge(['sender'=>1]);
		Messages::create($request->all());
		return redirect()->back();
	}

	public function editProfile()
	{
		$user = User::findOrFail(Auth::client()->get()->id);
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
		return View('front.dashboard.profile.index',compact('user','regions'));
	}

	public function postProfile(Request $request)
	{
		$user = User::findOrFail(Auth::client()->get()->id);
		$validator =  Validator::make($request->all(), [
			'img'      => 'image',
			'pwd' => 'min:5|confirmed',
		]);
		if ($validator->fails()) {
            return redirect()
            			->back()
                        ->withInput()
                        ->withErrors($validator);
        }else{ 
        	if($request->hasFile('img')){
        		$time = time();
				$dest = 'uploads/users/';
				$file_name = $time.'.'.$request->file('img')->getClientOriginalExtension();
				$request->file('img')->move($dest,$file_name);
				$request->merge(['image'=>$file_name]);
        	}  
        	
        	if($request->has('pwd')){ 
				$request->merge(['password'=>bcrypt($request->password)]);
			}

			$user->update($request->all());
			return redirect()->back()->with(['msg'=>Lang::get('dashboard.saved_success')]);
		} 

	}
	public function new_testimonial()
	{
		return View('front.dashboard.testimonials.index');
	}

	public function post_testimonial(Request $request)
	{
		$request->merge(['user_id'=>Auth::client()->get()->id]);
		Testimonials::create($request->all());
		return redirect()->back()->with(['msg'=>Lang::get('dashboard.submit_success')]);
		
	}
	
}
