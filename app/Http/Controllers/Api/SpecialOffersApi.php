<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ApiSettings;
use App\SpecialOffers;
use App\SpecialOfferReserv ;
use App\Travels;
use Auth;
use Validator ;

class SpecialOffersApi extends Controller {

	public function __construct(Request $bag)
	{
		$this->beforeFilter(function() use ($bag){
			$api = ApiSettings::first();
			if(!$bag->has('secret'))
			{
				return response()->json(['status' => '400','message'=>'missing secret key'],400);
			}
			if($bag->secret !== $api->secret)
			{
				return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
			}
		});
	}
	// End Function Construct


	public function getSpecialOffers(Request $bag)
	{	
		if(!$bag->has('lang'))
		{
			return response()->json(['status'=>'400' , 'message'=>'misssing lang param'], 400) ;
		}

		$s_offers = SpecialOffers::get();

		$i = 0 ;
		$data= [] ;
	
		foreach ($s_offers as $s_offer) {
			
			$data[$i]['id']  = $s_offer['id'] ;

			$travel  = Travels::where('id', $s_offer['travel_id'])->first() ;
						
			$data[$i]['dates']['old']['from']       = $travel['date_from'];
			$data[$i]['dates']['old']['to']         = $travel['date_to'];
			$data[$i]['dates']['new']['from']       = $s_offer['date_from'] ;
			$data[$i]['dates']['new']['to']     	= $s_offer['date_to'];

			$data[$i]['price']['old']['price_old']  = $travel['price'];
			$data[$i]['price']['new']['price_new']  = $s_offer['new_price'] ;
		
			$i++ ;
		}	

		return response()->json(['status'=>'200' , 'data'=>$data ], 200) ;
	}



	public function ReservSpecialOffers(Request $bag)
	{

		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}
		
		if(!$bag->has('special_offer_id'))
		{
			return response()->json(['status' => '400','message'=>'missing special_offer_id parameter'],400);
		}
				
		$bag->merge(['user_id'=>Auth::client()->get()->id]);
		SpecialOfferReserv::create($bag->all());
		return response()->json(['status'=>'200' , 'msg'=>'Reservation has been Successfully'] , 200);
	}


}
