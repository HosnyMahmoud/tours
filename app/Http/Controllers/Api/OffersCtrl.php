<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cars_Reservation ;
use App\ApiSettings ;
use App\CarsOffers ;
use App\Countries;
use App\Cities;
use App\CarsBrands;
use App\CarsModels;
use Validator ;
use Auth ;

class OffersCtrl extends Controller {

	
	public function api()
	{
		return ApiSettings::first() ;
	}

	public function searchOffers(Request $bag)
	{
		$rules = ['secret'=>'required','city_id' =>'required','lang' =>'required'];
		$validator = Validator::make($bag->all(), $rules);
		if($validator->fails())
		{
			return response()->json(['status'=>'400' , 'msg'=>'Some Errors happend', 'Errors'=>$validator->errors()->all()], 400);
		}

		if($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status'=>'400' , 'msg'=>'Wrong secret Key'],400);
		}

		$query = CarsOffers::where('city_id', $bag->city_id);
		
		if($bag->has('brand_id'))
		{
			$query->where('brand_id', $bag->brand_id) ;
		}

		$offers = $query->get() ;
		$i    = 0 ;
		$data = [] ;
		$countries  = Countries::all() ;
		$cities     = Cities::all() ;
		$carsBrands = CarsBrands::all() ;
		$carsModels = CarsModels::all() ;

		foreach ($offers as $offer) {
		
			$data[$i]['id'] 		= $offer['id']; 
			$data[$i]['offer_name'] = $offer['offer_name_'.$bag->lang]; 
			$data[$i]['offer_desc'] = $offer['offer_desc_'.$bag->lang]; 
			$data[$i]['country']    = $countries->find($offer['country_id'])['name_'.$bag->lang]; 
			$data[$i]['city']       = $cities->find($offer['city_id'])['name_'.$bag->lang]; 
			$data[$i]['brand']      = $carsBrands->find($offer['brand_id'])['brand_name']; 
			$data[$i]['model']      = $carsModels->find($offer['model_id'])['model_name']; 
			$data[$i]['price']      = $offer['price'];
			$data[$i]['color']      = $offer['color'];
			$data[$i]['image']      = Url('/').'/uploads/cars/cars_offers/'.$offer['image'];
			 
		}

		if(count($data) == 0)
		{
			return response()->json(['status'=>'400' , 'msg'=>'No data to show'],400);
		}

		return response()->json(['status'=>'200' , 'data'=>$data],200);
	} // End Function 


	/*************************************************
	 *****   Start API reservation Cars      *********
	 *************************************************/
	public function offersReserv(Request $bag)
	{	
		$rules = [
					'secret'    =>'required',
					'offer_id'  =>'required',
					'date_from' =>'required',
					'date_to'   =>'required',
				 ];

		$validation = Validator::make($bag->all(),$rules);
		if($validation->fails())
		{
			return response()->json(['status'=>'400' , 'msg'=>'Some Errors was happend','errors'=>$validation->errors()->all()], 400) ;
		}

		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}
		
		$bag->merge(['user_id'=>Auth::client()->get()->id]);
		
		Cars_Reservation::create($bag->all());
		return response()->json(['status'=>'200' , 'msg'=>'Reservation has been Successfully'] , 200);
	}

		
}// End Class 
