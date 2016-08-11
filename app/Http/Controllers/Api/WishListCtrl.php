<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ApiSettings ;
use App\CarsOffers ;
use App\Hotel ;
use App\Travels ;
use App\WishList ;
use App\SpecialOffers ;
use Validator ;
use Auth ;

class WishListCtrl extends Controller {

	public function api()
	{
		return ApiSettings::first() ;
	}

	public function getWishList(Request $bag){

		
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}

		$rules = ['secret'=>'required','lang'=>'required'];
     	$validator = Validator::make($bag->all(), $rules);
		if ($validator->fails())
		{
			return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
		}
		
		if($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
		}

		$i = 0;
		$data = [];
		
		$records = WishList::where('user_id',Auth::client()->get()->id)->get() ;
		foreach ($records as $rec) {
			    $data[$i]['id'] = $rec['id'];
			if ($rec->type == 0) {
				$getTable = CarsOffers::where('id',$rec->list_id)->first();
				$data[$i]['item_id'] 	    = $getTable['id'];
				$data[$i]['name']	        = $getTable['offer_name_'.$bag->lang];			
				$data[$i]['type']	        = 'Cars Offers';			
			}
			
			if ($rec->type == 1) {
				$getTable = Hotel::where('id',$rec->list_id)->first();
				$data[$i]['item_id'] 	    = $getTable['id'];
				$data[$i]['name']	        = $getTable['name_'.$bag->lang];	
				$data[$i]['type']	        = 'Hotels';			
			}

			if ($rec->type == 2) {
				$getTable = Travels::where('id',$rec->list_id)->first();
				$data[$i]['item_id'] 	    = $getTable['id'];
				$data[$i]['name']	        = $getTable['name_'.$bag->lang];	
				$data[$i]['type']	        = 'Travel';			
			}

			if ($rec->type == 3) { // offers
				$getTable = SpecialOffers::where('id',$rec->list_id)->first();
				$data[$i]['item_id'] 	    = $getTable['id'];
				$data[$i]['name']	        = $getTable['name_'.$bag->lang];	
				$data[$i]['type']	        = 'Travel';			
			}		

			/*if ($rec->type == 3) { // air lines
				$getTable = ::where('id',$rec->list_id)->first();
				$data[$i]['item_id'] 	    = $getTable['id'];
				$data[$i]['name']	        = $getTable['name_'.$bag->lang];	
				$data[$i]['type']	        = 'Travel';			
			}		*/

			$i++ ;

		}// end foreach

				
		if(count($data) == 0)
		{
			return response()->json(['status' => '401' , 'data'=> 'no data to show'] , 401);
		}


		return response()->json(['status' => '200' , 'data'=>array_reverse($data)] , 200);
	}


	// Function Add to wish list
	public function addToWishList(Request $bag)
	{
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}

		$rules = ['secret'=>'required','item_id'=>'required' ,'type'=>'required'];
     	$validator = Validator::make($bag->all(), $rules);
		if ($validator->fails())
		{
			return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
		}
		
		if($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
		}


		$check = WishList::where('user_id',Auth::client()->get()->id)
						 ->where('list_id',$bag->item_id)
						 ->where('type',$bag->type)->first() ;

		if(count($check) == 0)				 
		{
			$bag->merge(['user_id'=>Auth::client()->get()->id]) ;
			$bag->merge(['list_id'=>$bag->item_id]);

			WishList::create($bag->all()) ;

			return response()->json(['status' => '200','message'=>'Added to wish list successfully'],200);
		}
			
		return response()->json(['status' => '401','message'=>'Already exists in your wishlist !'],401);


	}

	
}
