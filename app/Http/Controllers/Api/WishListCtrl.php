<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ApiSettings ;
use App\WishList ;
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

		if(!$bag->has('secret'))
		{
			return response()->json(['status' => '400','message'=>'missing secret key'],400);
		}

		if($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
		}

		if(!$bag->has('type'))
		{
			return response()->json(['status' => '400','message'=>'missing type key'],400);
		}

		if(!$bag->has('travel_id'))
		{
			return response()->json(['status' => '400','message'=>'missing travel_id key'],400);
		}

		$data = WishList::where('type',$bag->type)->where('user_id',Auth::client()->get()->id)->get() ;
		if($data->count() == 0)
		{
			return response()->json(['status' => '401' , 'data'=> 'no data to show'] , 401);
		}

		return response()->json(['status' => '200' , 'data'=> $data] , 200);
	}
	
}
