<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\CarsOffers ;
use App\Countries ;
use App\Cities ;
use App\CarsBrands ;
use App\CarsModels;
use Validator ;

class CarsOffersCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$countries   = Countries::all() ; 
		$cities      = Cities::all() ;
		$cars_brand  = CarsBrands::all() ;
		$cars_models = CarsModels::all() ;

		$carsOffers  = CarsOffers::paginate(5) ;

		return view('admin.cars.cars_offers.index' , compact('carsOffers', 'countries', 'cities', 'cars_brand' , 'cars_models'))	;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$countries   = Countries::lists('name_ar','id') ;
		$cities      = Cities::lists('name_ar','id');
		$cars_brand  = CarsBrands::all() ;
		$cars_models = CarsModels::all() ;

		return view('admin.cars.cars_offers.create' ,compact('carsOffers', 'countries', 'cities', 'cars_brand' , 'cars_models')) ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{	
		
		$validation = Validator::make($bag->all(), CarsOffers::rules('add'));
		
		dd($bag->all()) ;
		if($validation->fails())
		{
 			return redirect()->back()->withErrors($validation)->withInput() ;
		}
		
		CarsOffers::create($bag->all()) ;
		return redirect()->to(Url('/').'/admin/carsOffers')->with(['msg' => 'تم الحفظ بنجاح']); 
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
