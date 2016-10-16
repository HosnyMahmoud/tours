<?php namespace App\Http\Controllers\api;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiSettings;
use App\SpecialOffers;
use App\SpecialOfferReserv ;
use Auth;
use Carbon\Carbon;
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
		// get all Special offers .
		$s_offers = SpecialOffers::get(); 

		$data = [] ;
		$i    = 0 ;
		foreach ($s_offers as $s_offer) {
			
			if(Carbon::now() <= $s_offer['date_to'])
			{
				$images = explode('|',$s_offer['images']);
				$data[$i]['id']   = $s_offer['id'] ;
				$data[$i]['name'] 		  = $s_offer['name_'.$bag->lang];
				$data[$i]['describtion']  = $s_offer['desc_'.$bag->lang];
				$data[$i]['status']       = $s_offer['status'];
				$data[$i]['date_from']    = $s_offer['date_from'] ;
				$data[$i]['date_to']      = $s_offer['date_to'];
				$data[$i]['num persons']  = $s_offer['num_of_persons'] ;
				$data[$i]['price']  	  =	$s_offer['price'] ;
				$z = 0 ;
				
				foreach ($images as $image)
				{
					$data[$i]['images'][$z] = Url('/').'/uploads/special_offers/'.$image ;
					$z++ ;
				}
				$reserved  = SpecialOfferReserv::where('user_id',Auth::client()->get()->id)->where('special_offer_id',$s_offer['id'])->get();

				if(count($reserved) == 0)
				{
					$data[$i]['reserved'] = false; //enabled
				}else{
					$data[$i]['reserved'] = true; //disabled
				}
			

				$i++ ;
			} // End If Carbon 
		}
		// End Foreach .

		if(count($data) == 0)
		{
			return response()->json(['status'=>'401' , 'message'=>'No Data To Show'],401) ;
		}

		return response()->json(['status'=>'200' , 'data'=>$data ], 200) ;
	}
	// End Function get Special offers

/*********************************************************************************/


	// Start Function Reservation  
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