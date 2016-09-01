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

// Data Tabel Class 
use App\DataTables\UsersDataTable;

class BookingsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getCars(/*UsersDataTable $dataTable*/)
	{	
		$users         = 	User::all();
		$citis         = 	Cities::all();
		$carsModels    = 	CarsModels::all();
		$carsOffers    = 	CarsOffers::all();
		
		// $allCarsReserv = $dataTable->html();
		// $dataTable->render('admin.bookings.bookingsCars.index');
		
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

}
