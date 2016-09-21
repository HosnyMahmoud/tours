<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cars_Reservation ;
use App\User; 
use App\Cities; 
use App\CarsModels; 
use App\CarsOffers; 

use App\DataTables\UsersDataTable;
use Datatables;

class BookingsCarsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(/*UsersDataTable $dataTable*/)
	{	
		$users         = 	User::all();
		$citis         = 	Cities::all();
		$carsModels    = 	CarsModels::all();
		$carsOffers    = 	CarsOffers::all();
		$allCarsReserv =	Cars_Reservation::all(); 

		//return $dataTable->render('admin.bookings.bookingsCars.index');
		//$allCarsReserv = 	Datatables::html();
		return View('admin.bookings.bookingsCars.index' , compact('allCarsReserv','users','citis','carsModels','carsOffers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
