<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Airline_tickets_reserv;
use App\ApiSettings ;
use App\AirPort ;
use Validator ;
use Auth ;

class AirPorts extends Controller {

	/* Start api function */
	public function api()
	{
	 	return ApiSettings::first(); 
	}
	/* End api function */

	public function getAirPortsByCityId(Request $bag)
	{	
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}

		$rules = [
			'secret'   => 'required',
			'lang'     => 'required',
			'city_id'  => 'required'
		];

		$validator = Validator::make($bag->all(), $rules);
		if ($validator->fails())
		{
			return response()->json(['status' => '400','message'=>'BadRequest ','errors'=>$validator->errors()->all()],400);
		}
		
		if($bag->secret !== $this->api()->secret)
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);

		$airPorts = AirPort::where('city_id',$bag->city_id)->select('id','name_'.$bag->lang)->get();

		if($airPorts->count() > 0)
		{	
			$data = [];
			$i = 0;
			foreach ($airPorts as $airPort) {
				
				$data[$i]['id']   = $airPort['id'];	
				$data[$i]['name'] = $airPort['name_'.$bag->lang];	
				$i++;
			}
			return response()->json(['status'=>'200','data'=>$data] , 200);	
		}
	
		return response()->json(['status'=>'400' , 'msg'=>'Bad request : No Data TO show '] , 400);
	}


	/**
		** START FUNCTION RESERVATION [ AIR LINES TICKETS ]  **
		** 
	*/
	public function ticketsReservation(Request $bag)
	{
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}

		$rules = [

			'secret'       => 'required',
			'airport_from' => 'required',
			'airport_to'   => 'required',
			'num_persons'  => 'required',
			'num_child'    => 'required',
			'type'         => 'required',
			'date_from'    => 'required',
			'date_to'      => ($bag->type == 0) ? '' : 'required',
			] ;
		$validator = Validator::make($bag->all(), $rules);
		if ($validator->fails())
		{
			return response()->json(['status' => '400','message'=>'BadRequest ','Errors'=>$validator->errors()->all()],400);
		}

		$bag->merge(['user_id'=>Auth::client()->get()->id]);
		Airline_tickets_reserv::create($bag->all());
		return response()->json(['status'=>'200' , 'msg'=>'Reservation has been Successfully'] , 200);
	}
}
