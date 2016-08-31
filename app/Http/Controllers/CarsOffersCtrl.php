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

		$carsOffers  = CarsOffers::paginate(10) ;

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
		$brands      = CarsBrands::lists('brand_name','id');
		$models      = CarsModels::lists('model_name','id');

		return view('admin.cars.cars_offers.create' ,compact('carsOffers', 'countries', 'cities', 'brands' , 'models')) ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{	
		$validation = Validator::make($bag->all(), CarsOffers::rules('add'));
		
		/*dd($bag->all()) ;*/
		if($validation->fails())
		{
 			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		if($bag->hasFile('img'))
		{
			$dest     = 'uploads/cars/cars_offers' ;
			$fileName = time().'.'.$bag->file('img')->getClientOriginalExtension();
			$bag->file('img')->move($dest , $fileName) ;

			$bag->merge(['image'=>$fileName]) ;
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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$countries   = Countries::lists('name_ar','id') ;
		$cities      = Cities::lists('name_ar','id');
		$brands      = CarsBrands::lists('brand_name','id');
		$models      = CarsModels::lists('model_name','id');

		$offerCar = CarsOffers::findOrFail($id) ;	

		return view('admin.cars.cars_offers.edit',compact('offerCar','countries', 'cities', 'brands' , 'models')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $bag ,$id)
	{
		$validation = Validator::make($bag->all(), CarsOffers::rules('edit'));
		
		/*dd($bag->all()) ;*/
		if($validation->fails())
		{
 			return redirect()->back()->withErrors($validation)->withInput() ;
		}
		// Get Old Data To update it .
		$car_offer = CarsOffers::findOrFail($id);

		// If Isset image .
		if($bag->hasFile('img'))
		{
			$dest     = 'uploads/cars/cars_offers' ;
			$fileName = time().'.'.$bag->file('img')->getClientOriginalExtension();
			$bag->file('img')->move($dest , $fileName) ;

			$bag->merge(['image'=>$fileName]) ;
		}else
		{
			$bag->merge(['image'=>$car_offer->image]) ;
		}

		$car_offer->update($bag->all()) ;
		return redirect()->to(Url('/').'/admin/carsOffers')->with(['msg' => 'تم حفظ التعديلات.']); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CarsOffers::findOrFail($id)->delete() ;
		return redirect()->to(Url('/').'/admin/carsOffers')->with(['msg' => 'تم الحذف بنجاح.']); 
	}
	
}
