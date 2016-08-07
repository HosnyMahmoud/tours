<?php namespace App\Http\Controllers\api;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiSettings ;
use App\ReservSpecialOffers ;
use App\Offers ;
use App\Hotel ;
use App\Countries ;
use App\Cities ;
use Validator ;
use Auth ;
class specialOffersCtrl extends Controller {
	
	// End function ReservSpecialOffers
	public function api()
	{
		return ApiSettings::first() ;
	}
	public function getSpecialOffers(Request $bag)
	{	
		$rules = [
			'secret' => 'required',
			'lang'   => 'required',
		];

		$validator = Validator::make($bag->all(), $rules);
		if ($validator->fails())
		{
				return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
		}
			if(!$bag->has('secret'))
		{
			return response()->json(['status' => '400','message'=>'missing secret key'],400);
		}
		if ($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status' => '401','message'=>'wrong secret key'],401);
		}
		$specialOffers = Offers::get() ;
		$countries     = Countries::get() ;
		$cities        = Cities::get();
		$hotels        = Hotel::get();
		$i = 0;
		$data = [];

		/*dd(strtotime(date())); 

		if( < strtotime($data['date_to']))
		{

		}*/
		foreach ($specialOffers as $offer) {
			
			$data[$i]['id']      	   = $offer['id'];
			$data[$i]['name']    	   = $offer['name_'.$bag->lang];
			$data[$i]['desc']    	   = $offer['name_'.$bag->lang];
			$data[$i]['hotel_id']      = $hotels->find($offer['hotel_id'])['name_'.$bag->lang];
			$data[$i]['country']       = $countries->find($offer['country_id'])['name_'.$bag->lang];
			$data[$i]['city']          = $cities->find($offer['city_id'])['name_'.$bag->lang];
			$data[$i]['price']         = $offer['price'];
			$data[$i]['type']          = $offer['type'];
			$data[$i]['date_from']     = $offer['date_from'];
			$data[$i]['date_to']       = $offer['date_to'];
			$data[$i]['image']         = Url('/').'uploads/specialOffers/'.$offer['images'];
											
			
		$i++;
		}

		if($specialOffers->count() == 0)
		{
			return response()->json(['status' => '401','message'=>'No data to show'],401);
		}
		
		return response()->json(['status' => '200','data'=>$data],200);
	}
	
	// Start function ReservSpecialOffers
	public function ReservSpecialOffers(Request $bag)
	{
		
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}
		$rules = [
					'secret'    => 'required',
					'offer_id'  => 'required'
			];
		$validator = validator::make($bag->all(),$rules) ;
		if($validator->fails())
		{
			return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
		}
		if ($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status' => '401','message'=>'wrong secret key'],401);
		}
				
		$bag->merge(['user_id'=>Auth::client()->get()->id]);
		ReservSpecialOffers::create($bag->all());
		return response()->json(['status'=>'200' , 'msg'=>'Reservation Successfully'] , 200);
	}
	
	
	/*public function SearchSpecialOffers(Request $bag)
	{
		$rules = [
			'secret' => 'required',
			'type'   => 'required',
			'lang'   => 'required',
		];
	$validator = Validator::make($bag->all(), $rules);
	if ($validator->fails())
	{
			return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
	}
	if ($bag->secret !== @$this->api()->secret)
	{
			return response()->json(['status' => '401','message'=>'wrong secret key'],401);
	}
	if(!in_array($bag->type, ['0','1','2']) )
	{
		return response()->json(['status' => '401','message'=>'BadRequest : Unexpected number of type'],401);
		
	}
	$query = Offers::where('type',$bag->type);
	
	// if isset price ( Optional )
		if($bag->has('min_price') && $bag->has('max_price') )
		{
				$query->WhereBetween('price',[ $bag->min_price ,$bag->max_price ]);
		}
		if($bag->has('date_from'))
		{
			if(!$bag->has('date_to'))
			{
				return response()->json(['status'=>'400' , 'msg'=>'missing date to'] , 400);
			}
								$query->Where('date_from','>=',$bag->date_from)->Where('date_to','<=',$bag->date_to);
		}
		if($bag->has('country_id'))
		{
								$query->Where('country_id',$bag->country_id);
		}
		if($bag->has('city_id'))
		{
								$query->Where('city_id',$bag->city_id);
		}
		$offers = $query->get();
		if($offers->count() == 0)
	{
			return response()->json(['status'=>'400' , 'msg'=>'No offers found'] , 400);
	}
	$countries = Countries::get() ;
		$cities    = Cities::get();
	$i = 0;
	$data = [];
		foreach ($offers as $offer) {
			$images = explode('|',$offer['images']);
								$data[$i]['id']      	   = $offer['id'];
								$data[$i]['name']    	   = $offer['name_'.$bag->lang];
								$data[$i]['desc']    	   = $offer['name_'.$bag->lang];
			$data[$i]['country']       = $countries->find($offer['country_id'])['name_'.$bag->lang];
			$data[$i]['city']          = $cities->find($offer['city_id'])['name_'.$bag->lang];
			$data[$i]['price']         = $offer['price'];
			$data[$i]['type']          = $offer['type'];
			$data[$i]['date_from']     = $offer['date_from'];
			$data[$i]['date_to']       = $offer['date_to'];
									
			$z=0;
			foreach ($images as $image) {
				$data[$i]['images'][$z] = Url('/').'/uploads/special_Offers/'.$image;
				$z++;
			}
		$i++;
		}
		return response()->json(['status'=>'200' , 'data'=>$data] , 200);
			
	}
	// END FUNCtion*/
}