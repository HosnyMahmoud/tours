<?php namespace App\Http\Controllers\api;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiSettings ;
use App\ReservTravel ;
use App\Travels ;
use App\Hotel ;
use App\Countries ;
use App\Cities ;
use Validator ;
use Carbon\Carbon ;
use Auth ;
class TravelsCtrl extends Controller {
	
		
	public function api()
	{
		return ApiSettings::first() ;
	}
	
	public function getTravels(Request $bag)
	{
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}
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
	
	$travels = Travels::where('type',$bag->type)->get();

	if($travels->count() == 0)
	{
		return response()->json(['status'=>'400' , 'msg'=>'No Data To Show'] , 400);
	}

	$i    = 0;
	$data = [];
	$countries = Countries::all() ;
	$cities    = Cities::all() ;
	foreach ($travels as $travel) {

		if(Carbon::now() <= $travel->date_to)
		{

			$images = explode('|',$travel['images']);
			$data[$i]['id']      	   = $travel['id'];
			$data[$i]['name']    	   = $travel['name_'.$bag->lang];
			$data[$i]['desc']    	   = $travel['name_'.$bag->lang];
			$data[$i]['country']       = $countries->find($travel['country_id'])['name_'.$bag->lang];
			$data[$i]['city']          = $cities->find($travel['city_id'])['name_'.$bag->lang];
			$data[$i]['price']         = $travel['price'];
			$data[$i]['type']          = $travel['type'];
			$data[$i]['date_from']     = $travel['date_from'];
			$data[$i]['date_to']       = $travel['date_to'];
			
			$reserved  = ReservTravel::where('user_id',Auth::client()->get()->id)->where('travel_id',$travel->id)->get();
			
			if(count($reserved) == 0)
			{
				$data[$i]['reserved'] = false; //enabled
			}else{
				$data[$i]['reserved'] = true; //disabled
			}
				
			$z=0;
			foreach ($images as $image) {
				$data[$i]['images'][$z] = Url('/').'/uploads/travels/'.$image;
				$z++;
			}
		}
		$i++ ; // increment counter ..

	}
	rsort($data) ;
	if(!count($data) > 0 )
	{
		return response()->json(['status'=>'401' , 'message'=>'No data found!'] , 401);
	}
	return response()->json(['status'=>'200' , 'data'=>$data] , 200);
			
	}
	// END FUNCtion
	

	// Start function ReservSpecialOffers
	public function ReservTravel(Request $bag)
	{
		
		if(Auth::client()->check() == false)
		{
			return response()->json(['status'=>'401' , 'msg'=>'You are not logged in'], 401) ;
		}
		$rules = [
					'secret'    => 'required',
					'travel_id'  => 'required'
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
		ReservTravel::create($bag->all());
		return response()->json(['status'=>'200' , 'msg'=>'Reservation Successfully'] , 200);
	}
	
	
}