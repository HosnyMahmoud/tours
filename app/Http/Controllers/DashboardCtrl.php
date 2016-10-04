<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Airline_tickets_reserv;
use App\HotelsReservations;
use App\SpecialOfferReserv;
use App\Cars_Reservation;
use App\ReservTravel;
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
}
