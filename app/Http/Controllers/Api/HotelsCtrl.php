<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\HotelsReservations;
use App\ApiSettings;
use App\Hotel;
use App\Countries;
use App\Cities;
use Validator;
use Auth;

class HotelsCtrl extends Controller {
	public function __construct(Request $bag)
	{
		$this->beforeFilter(function() use ($bag){
			$api = ApiSettings::first();
			if(!$bag->has('secret'))
				return response()->json(['status' => '400','message'=>'missing secret parameter'],400);
			
			if($bag->secret !== $api->secret)
				return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret parameter'],401);
		});
	}

	public function getHotels(Request $bag)
	{
		if(!$bag->has('lang'))
		{
			return response()->json(['status' => '400','message'=>'missing lang parameter'],400);
		}
		$hotels    = Hotel::all() ;
		$countries = Countries::all() ;
		$cities    = Cities::all() ;
		if($hotels->count() == 0)
		{
			return response()->json(['status' => '400','message'=>'No records to show'],400);
		}
		$i = 0;
		$data = [];
		foreach ($hotels as $hotel) {
			$images 			        = explode('|',$hotel['images']);
			$data[$i]['id'] 	        = $hotel['id'];
			$data[$i]['name']	        = $hotel['name_'.$bag->lang];
			$data[$i]['desc'] 	 	    = $hotel['name_'.$bag->lang];
			$data[$i]['country'] 	    = $countries->find($hotel['country_id'])['name_'.$bag->lang];
			$data[$i]['city']    	    = $cities->find($hotel['city_id'])['name_'.$bag->lang];
			$data[$i]['price']   	    = $hotel['price'];
			$data[$i]['num_of_per']     = $hotel['num_of_per'];
			$data[$i]['stars']          = $hotel['stars'];
			$data[$i]['logo_thumb']     = Url('/').'/uploads/hotels/logo/thumb/'.$hotel['logo'];
			$data[$i]['logo_original']  = Url('/').'/uploads/hotels/logo/'.$hotel['logo'];
			$z=0; 
			 
			foreach ($images as $image) 
		    { 
				$data[$i]['images'][$z] = Url('/').'/uploads/hotels/logo/'.$image;
				$z++;
			}

			$i++;
		}
		return response()->json(['status'=>'200' , 'data'=>$data] , 200);
	}

	public function getOneHotel(Request $bag)
	{
		if(!$bag->has('hotel_id'))
		{
			return response()->json(['status' => '400','message'=>'missing hotel_id parameter'],400);
		}
		if(!$bag->has('lang'))
		{
			return response()->json(['status' => '400','message'=>'missing lang parameter'],400);
		}
		$hotels = Hotel::where('id',$bag->hotel_id)->get();
		if($hotels->count() == 0)
		{
			return response()->json(['status' => '400','message'=>'hotel not found'],400);
		}
		$countries = Countries::all() ;
		$cities = Cities::all() ;
		foreach ($hotels as $hotel) {
			$images = explode('|',$hotel['images']);
			$data[0]['id'] = $hotel['id'];
			$data[0]['name'] = $hotel['name_'.$bag->lang];
			$data[0]['desc'] = $hotel['name_'.$bag->lang];
			$data[0]['country'] = $countries->find($hotel['country_id'])['name_'.$bag->lang];
			$data[0]['city'] = $cities->find($hotel['city_id'])['name_'.$bag->lang];
			$data[0]['price'] = $hotel['price'];
			$data[0]['num_of_per'] = $hotel['num_of_per'];
			$data[0]['stars'] = $hotel['stars'];
			$data[0]['logo_thumb'] = Url('/').'/uploads/hotels/logo/thumb/'.$hotel['logo'];
			$data[0]['logo_original'] = Url('/').'/uploads/hotels/logo/'.$hotel['logo'];
			$z=0;
			foreach ($images as $image) {
				$data[0]['images'][$z] = Url('/').'/uploads/hotels/logo/'.$image;
				$z++;
			}
		}
		return response()->json(['status'=>'200' , 'data'=>$data] , 200);
	}


	public function getSearchHotels(Request $bag)
	{			
		$rules = [
        'min_stars' => 'required',
        'max_stars' => 'required',
		];

	    $validator = Validator::make($bag->all(), $rules);
	    if ($validator->fails()) 
	    {
			return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
	    }

	    $query = Hotel::whereBetween('stars',[$bag->min_stars,$bag->max_stars]);

		if($bag->has('min_price') && $bag->has('max_price') )
		{
			$query->WhereBetween('price',[ $bag->min_price ,$bag->max_price ]);	
		}
		if($bag->has('num_of_per')) 
		{
			$query->Where('num_of_per',$bag->num_of_per);					
		}
		$hotels = $query->get();
		if($hotels->count() == 0)
    	{
			return response()->json(['status'=>'400' , 'msg'=>'No hotels found'] , 400);
    	}
    	$countries = Countries::get() ;
		$cities    = Cities::get();
    	$i = 0;
    	$data = [];
		foreach ($hotels as $hotel) {
			$images = explode('|',$hotel['images']);
			$data[$i]['id']      	   = $hotel['id'];
			$data[$i]['name']    	   = $hotel['name_'.$bag->lang];
			$data[$i]['desc']    	   = $hotel['name_'.$bag->lang];
			$data[$i]['country']       = $countries->find($hotel['country_id'])['name_'.$bag->lang];
			$data[$i]['city']          = $cities->find($hotel['city_id'])['name_'.$bag->lang];
			$data[$i]['price']         = $hotel['price'];
			$data[$i]['num_of_per']    = $hotel['num_of_per'];
			$data[$i]['stars'] 		   = $hotel['stars'];
			$data[$i]['logo_thumb']    = Url('/').'/uploads/hotels/logo/thumb/'.$hotel['logo'];
			$data[$i]['logo_original'] = Url('/').'/uploads/hotels/logo/'.$hotel['logo'];
			$z=0;
			foreach ($images as $image) {
				$data[$i]['images'][$z] = Url('/').'/uploads/hotels/logo/'.$image;
				$z++;
			}
		$i++;
		}
		return response()->json(['status'=>'200' , 'data'=>$data] , 200);
			
	}

	public function startReservations(Request $bag)
	{

		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}
		
		if(!$bag->has('hotel_id'))
		{
			return response()->json(['status' => '400','message'=>'missing hotel_id parameter'],400);
		}
		if(!$bag->has('date_from'))
		{
			return response()->json(['status' => '400','message'=>'missing date_from parameter'],400);
		}
		if(!$bag->has('date_to'))
		{
			return response()->json(['status' => '400','message'=>'missing date_to parameter'],400);
		}
		
		$bag->merge(['user_id'=>Auth::client()->get()->id]);
		HotelsReservations::create($bag->all());
		return response()->json(['status'=>'200' , 'msg'=>'Reservation Successfully'] , 200);
	}
}// end Class 