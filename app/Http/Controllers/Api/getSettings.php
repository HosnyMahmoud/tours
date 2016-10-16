<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiSettings;
use App\Settings ;
use Validator ;
use Auth ;
use App\Testimonials ;
use App\WishList ;
/* Reservation */
use App\Cars_Reservation ;
use App\HotelsReservations ;
use App\ReservTravel ;
use App\SpecialOfferReserv ;
/* Reservation */
use App\Countries;
use App\Cities;
use App\CarsModels ;
use App\CarsOffers ;
use App\Hotel ;
use App\Travels ;
use App\SpecialOffers ;

class getSettings extends Controller {

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

	

	public function GetSettings(Request $bag)

	{

		$data = Settings::first() ;

		return response()->json(['status' => '200' , 'data'=> $data] , 200);

	}

	/*  API Contact Us */
	public function ContactUs(Request $bag)
	{

		$data = [];
		$settings = Settings::first() ;
		$data['phone']    = $settings->phone ;
		$data['email']    = $settings->email ;
		$data['facebook'] = $settings->facebook ;
		$data['twitter']  = $settings->twitter ;
		$data['linkedIn'] = $settings->linkedIn ;

		return response()->json(['status' => '200' , 'data'=> $data] , 200);

	}
	/*  API Contact Us */
	
	/* Start API review */
	public function review(Request $bag)
	{
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}
		
		$rules = [
					'secret'    =>'required',
					'content'   =>'required',
				 ];

		$validation = Validator::make($bag->all(),$rules);
		if($validation->fails())
		{
			return response()->json(['status'=>'400' , 'msg'=>'Some Errors was happend','errors'=>$validation->errors()->all()], 400) ;
		}

		$bag->merge(['user_id'=>Auth::client()->get()->id]);
		$bag->merge(['status' => 0]);
		$bag->merge(['text' => $bag->content]);
		
		Testimonials::create($bag->all());
		return response()->json(['status'=>'200' , 'msg'=>'Successfully Operation'] , 200);
	}

	/* End API review */

	/**********************************************************************/

	public function unWishlist(Request $bag)
	{
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}

		$rules = ['secret'   =>'required',
					'item_id'=>'required' ,
					'type'   =>'required',
										];
     	$validator = Validator::make($bag->all(), $rules);
		if ($validator->fails())
		{
			return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
		}

		$bag->merge(['user_id'=>Auth::client()->get()->id]);

		$check = WishList::where('user_id',Auth::client()->get()->id)
					->where('list_id',$bag->item_id)
					->where('type',$bag->type)->delete() ;

		if(!$check)
		{
			return response()->json(['status'=>'401','Errors'=>' item id or type not found in my records'], 401);
		}

		return response()->json(['status'=>'200','message'=>'Removed Successfully from wishlist'], 200);

	} // End unwishlist api 

	/***************************************************************************************/

	public function myReservation(Request $bag)
	{	
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}	
		$rules = [
					'secret' =>'required',
					'lang'   =>'required',
     		  	 ];
     	$validator = Validator::make($bag->all(), $rules);
		if ($validator->fails())
		{
			return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
		}
		$lang = $bag->lang ;
		if(!in_array($lang,['ar','en']))
		{
			return response()->json(['status' => '401','message'=>'BadRequest : Unexpected language'],401);
		}

		  $user_session_id	  = Auth::client()->get()->id ;	
		  $carsReserv     	  = Cars_Reservation::where('user_id',$user_session_id)->get() ;
		  $hotelsReserv   	  = HotelsReservations::where('user_id',$user_session_id)->get() ;
		  $reservTravel   	  = ReservTravel::where('user_id',$user_session_id)->get() ;
		  $SpecialOfferReserv = SpecialOfferReserv::where('user_id',$user_session_id)->get() ;

		 
		  $i = 0 ; // Counter 
		  $data = [];

		  //* Asstes Global *//
		  $countries  	 = Countries::all();
		  $cities     	 = Cities::all();
		  $carsModels 	 = CarsModels::all();
		  $hotels     	 = Hotel::all();
		  $travels    	 = Travels::all();
		  $specialOffers = SpecialOffers::all();
		  $carsOffers	 = CarsOffers::all();
		  //* Asstes Global *//

		  	/* Start Api Cars Reservation for Users */
		  	if(!$carsReserv->count() == 0){
			  foreach ($carsReserv as $row) {
			  	
			  	if($row['status'] == 0 ){$status = "Not Confirmed" ;} elseif( $status = $row['status'] == 1){ $status = "Successfully Confirmed" ;}else{$status = "Canceled" ;}  
			  	$data['cars'][$i]['country']     = $countries->find($carsOffers->find($row['offer_id'])['country_id'])['name_'.$lang] ;
			  	$data['cars'][$i]['city']        = $cities->find($row['city_id'])['name_'.$lang] ;
			  	$data['cars'][$i]['offer']       = $carsOffers->find($row['offer_id'])['offer_name_'.$lang] ;
			  	$data['cars'][$i]['desc']  		 = str_limit($carsOffers->find($row['offer_id'])['offer_desc_'.$lang],100) ;
			  	$data['cars'][$i]['color'] 		 = $carsOffers->find($row['offer_id'])['color'] ;
			  	$data['cars'][$i]['model']       = $carsModels->find($row['model_id'])['model_name'] ;
			    $data['cars'][$i]['date_from']   = $row['date_from'] ;
			    $data['cars'][$i]['date_to']     = $row['date_to'] ;
			    $data['cars'][$i]['status']      = $status ;
			    $data['cars'][$i]['status_int']  = $row['status'] ;
			    $data['cars'][$i]['type_reserv'] = "Cars" ;

			    $i++ ;

			  } // end foreach 
		  	}else{
		    	$data['cars'] = [];
		    }

		  	/* End Api Cars Reservation for Users */
		  	
		  	/* Start Api Hotels Reservation for Users */

			$i = 0 ;
			if(!$hotelsReserv->count() == 0){
			foreach ($hotelsReserv as $row) {
			  	if($row['status'] == 0 ){$status = "Not Confirmed" ;} elseif( $status = $row['status'] == 1){ $status = "Successfully Confirmed" ;}else{$status = "Canceled" ;}  
			  	
			  	$data['hotel'][$i]['country']    = $countries->find($hotels->find($row['hotel_id'])['country_id'])['name_'.$lang] ;
			  	$data['hotel'][$i]['city']       = $cities->find($hotels->find($row['hotel_id'])['city_id'])['name_'.$lang] ;
			  	$data['hotel'][$i]['hotel']      = $hotels->find($row['hotel_id'])['name_'.$lang] ;
			  	$data['hotel'][$i]['desc']       = str_limit($hotels->find($row['hotel_id'])['desc_'.$lang],100) ;
			  	$data['hotel'][$i]['persons']    = $row['persons'] ;
			    $data['hotel'][$i]['date_from']  = $row['date_from'] ;
			    $data['hotel'][$i]['date_to']    = $row['date_to'] ;
			    $data['hotel'][$i]['status']     = $status ;
			    $data['hotel'][$i]['status_int'] = $row['status'] ;
			    $data['hotel'][$i]['type_reserv']= "Hotel" ;

		    	$i++;
		  		}
	 	 	}else{
		    	$data['hotel'] = [];
		    }
		  	/* Start Api Hotels Reservation for Users */
		  	
		  	/* Start Api Travels Reservation for Users */
		    $i = 0 ;
		    if(!$reservTravel->count() == 0 ){

				foreach ($reservTravel as $row) {
				  	if($row['status'] == 0 ){$status = "Not Confirmed" ;} elseif( $status = $row['status'] == 1){ $status = "Successfully Confirmed" ;}else{$status = "Canceled" ;}  
				  	$data['travels'][$i]['travel']     = $travels->find($row['travel_id'])['name_'.$lang] ;
				  	$data['travels'][$i]['hotel_name'] = $hotels->find($travels->find($row['travel_id'])['hotel_id'])['name_'.$lang] ;
				  	$data['travels'][$i]['country']    = $countries->find($travels->find($row['travel_id'])['country_id'])['name_'.$lang];
				  	$data['travels'][$i]['city']       = $cities->find($travels->find($row['travel_id'])['city_id'])['name_'.$lang];
				  	$data['travels'][$i]['desc']       = str_limit($travels->find($row['travel_id'])['desc_'.$lang],100) ;
				  	$data['travels'][$i]['status']     = $status ;
			    	$data['travels'][$i]['status_int'] = $row['status'] ;
			    	$data['travels'][$i]['type_reserv']= "Travels" ;

			    	$i++;
		  		}
		  	}else{
		    	$data['travels'] = [];
		    }
		  	/* End Api Travels Reservation for Users */

		  	/* Start Api SpecialOffers Reservation for Users */
		    $i = 0 ;
		    if(!$SpecialOfferReserv->count() == 0)
		    {
		    	foreach ($SpecialOfferReserv as $row) {
			  	if($row['status'] == 0 ){$status = "Not Confirmed" ;} elseif( $status = $row['status'] == 1){ $status = "Successfully Confirmed" ;}else{$status = "Canceled" ;}  
			  	
			  	$data['SpecialOffers'][$i]['special_offer'] = $specialOffers->find($row['special_offer_id'])['name_'.$lang] ;
			  	$data['SpecialOffers'][$i]['desc']          = str_limit($specialOffers->find($row['special_offer_id'])['desc_'.$lang] , 100) ;
			  	$data['SpecialOffers'][$i]['persons']    	= $specialOffers->find($row['special_offer_id'])['num_of_persons'];
			    $data['SpecialOffers'][$i]['date_from']  	= $specialOffers->find($row['special_offer_id'])['date_from'];
			    $data['SpecialOffers'][$i]['date_to']    	= $specialOffers->find($row['special_offer_id'])['date_to'];
			    $data['SpecialOffers'][$i]['price']    		= $specialOffers->find($row['special_offer_id'])['price'];
			  	$data['SpecialOffers'][$i]['status']   		= $status ;
			  	$data['SpecialOffers'][$i]['status_int']    = $row['status'] ;
		  		$data['SpecialOffers'][$i]['type_reserv']	= "Special Offers" ;
		    	$i++;
		  		}	
		    }else{
		    	$data['SpecialOffers'] = [];
		    }
			
		  	/* End Api SpecialOffers Reservation for Users */

		  	if(!count($data) == 0)
		  	{
	 	 		return response()->json(['status'=>'200','data' => $data ],200);
		  	}

 	 		return response()->json(['status'=>'400','messages' => 'No Data To show.' ],400);

		}
}
