<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cars_Reservation ;
use App\User; 
use App\Cities; 
use App\CarsModels; 
use App\CarsOffers; 
use App\Hotel; 
use App\HotelsReservations; 
use App\Travels ;
use App\ReservTravel ;
use App\SpecialOfferReserv ;
use App\SpecialOffers ;
use App\AirPort ;
use App\Airline_tickets_reserv ;

// Data Tabel Class 
use App\DataTables\UsersDataTable;
// Data Tabel Class 

class BookingsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getCars()
	{	
		$users         = 	User::all();
		$citis         = 	Cities::all();
		$carsModels    = 	CarsModels::all();
		$carsOffers    = 	CarsOffers::all();
		$allCarsReserv = Cars_Reservation::paginate(10) ;

		return view('admin.bookings.bookingsCars.index' , compact('allCarsReserv','users','citis','carsModels','carsOffers'));
	}
	
	public function gethotels()
	{	
		$users         	  = User::all();
		$hotels        	  = Hotel::all();
	
		$AllHotelsReserv  = HotelsReservations::paginate(20);
		return view('admin.bookings.bookingsHotels.index' , compact('AllHotelsReserv','users','hotels'));
	}

	


	public function getTeavels()
	{	
		$users         	  = User::all();
		$travels      	  = Travels::all();
	
		$AllTravelsReserv  = ReservTravel::paginate(20);
		return view('admin.bookings.bookingsTravels.index' , compact('AllTravelsReserv','users','travels'));
	}


	public function getSpecialOffers()
	{	
		$users         	         = User::all();
		$specialOffers           = SpecialOffers::all();
	
		$allSpecialOffersReserv  = SpecialOfferReserv::paginate(20);
		return view('admin.bookings.bookingsSpecialOffers.index' , compact('allSpecialOffersReserv','users','specialOffers'));
	}
	


	public function getTickets()
	{	
		$users      = User::all();
		$airPorts   = AirPort::all();
	
		$allTicketsReserv  = Airline_tickets_reserv::paginate(20);
		return view('admin.bookings.bookingsTickets.index' , compact('allTicketsReserv','users','airPorts'));
	}
	
	public function confirmReserv($type,$id)
	{
		switch ($type) {
			case 'Cars_Reservation':
				$reserv = Cars_Reservation::findOrFail($id);
				break;
			case 'HotelsReservations':
				$reserv = HotelsReservations::findOrFail($id);
				break;
			case 'SpecialOfferReserv':
				$reserv = SpecialOfferReserv::findOrFail($id);
				break;
			case 'Airline_tickets_reserv':
				$reserv = Airline_tickets_reserv::findOrFail($id);
				break;
			case 'ReservTravel':
				$reserv = ReservTravel::findOrFail($id);
				break;
				
			default:
				abort(404);	
			break;
		}

		if($reserv->status == 0){
			$reserv->update(['status'=>1]);
		}else{
			$reserv->update(['status'=>2]);
		}
		return redirect()->back();
	}
}
