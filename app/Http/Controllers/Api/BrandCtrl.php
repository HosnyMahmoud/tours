<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ApiSettings;
use App\CarsBrands ;
class BrandCtrl extends Controller {

	/* Start api function */
	
	public function api()
	{
	 	return ApiSettings::first(); 
	}
	
	/* End api function */

	/* Get All countries */
	public function getBrand(Request $bag) 
	{	
		if(!$bag->has('secret'))
		    return response()->json(['status' => '400','message'=>'missing secret key'],400);

		if($bag->secret !== $this->api()->secret)
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);

		$allbrand = CarsBrands::select('id','brand_name')->get() ;

		if($allbrand->count() > 0)
		{
			return response()->json(['status'=>'200','data'=>$allbrand] , 200);	
		}
	
		return response()->json(['status'=>'400' , 'msg'=>'Bad request'] , 400);
	}




	
}
