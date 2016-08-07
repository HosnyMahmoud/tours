<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ApiSettings;
use Validator ;
use App\Cars ;

class CarsCtrl extends Controller {

	/* Start api function */
	
	public function api()
	{ return ApiSettings::first(); }
	
	/* End api function */

	/* Get All countries */
	public function getBrand(Request $bag) 
	{	
		if(!$bag->has('secret'))
		    return response()->json(['status' => '400','message'=>'missing secret key'],400);

		if($bag->secret !== $this->api()->secret)
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);

		$allbrand = Cars::select('id','brand_name')->get() ;

			if(count($allbrand) > 0)
			{
				return response()->json(['status'=>'200','data'=>$allbrand] , 200);	
			}
	
		return response()->json(['status'=>'400' , 'msg'=>'Bad request'] , 400);
	}

	/* Get All models */
	public function getCountries(Request $bag) 
	{	
		if(!$bag->has('secret'))
		    return response()->json(['status' => '400','message'=>'missing secret key'],400);

		if($bag->secret !== $this->api()->secret)
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);

		$allCountries = Cars::select('id','country_name')->get() ;

			if(count($allCountries) > 0)
			{
				return response()->json(['status'=>'200','data'=>$allCountries] , 200);	
			}
	
		return response()->json(['status'=>'400' , 'msg'=>'Bad request'] , 400);

	}




	public function getCars(Request $bag) 
	{
		
		if(!$bag->has('secret'))
		    return response()->json(['status' => '400','message'=>'missing secret key'],400);

		if($bag->secret !== $this->api()->secret)
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);


		$rules = [ 'country_name'=>'required' ]	;
		$validator = Validator::make($bag->all(),$rules);
		if($validator->fails())
		{																						
			return response()->json(['status'=>'400' , 'msg'=> 'Bad Request' , 'erorrs'=>$validator->errors()->all()],400);
		}

		if(!$bag->has('brand_name'))
		{
			$carsResult = Cars::where('country_name',$bag->country_name)->get() ;
			
			if(count($carsResult) > 0)
			{
				return response()->json(['status'=>'200','data'=>$carsResult] , 200);	
			}
		
			return response()->json(['status'=>'400' , 'msg'=>'Bad request'] , 400);
		}

		/* Case in Bag Has Car Model */		
		$carsResult = Cars::where('country_name',$bag->country_name)
							->where('brand_name',$bag->brand_name)->get() ;

			if(count($carsResult) > 0)
			{
				return response()->json(['status'=>'200','data'=>$carsResult] , 200);	
			}
	
		return response()->json(['status'=>'400' , 'msg'=>'Bad request'] , 400);

	}
	// End Function getCars

	
	public function nums()
	{	
		$data = [] ;
		for ($i=1; $i <=30 ; $i++) { 
			$data [] = ['i' => $i] ;	
		}
		return response()->json(['status'=>'200' , 'nums'=> $data], 200);
	}


}
