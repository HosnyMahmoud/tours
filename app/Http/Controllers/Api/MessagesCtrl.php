<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ApiSettings;
use Carbon\Carbon;
use App\Messages;
use App\User;
use App\Admin;
use Auth;
use DB;
class MessagesCtrl extends Controller {
	public function api()
	{
		$api = ApiSettings::first();
		return $api;
	}


	public function get_msgs(Request $bag)
	{
		if($bag->has('secret'))
		{
			if($bag->secret == @$this->api()->secret)
			{
				if(Auth::client()->check() == true)
				{
					
					$messages = Messages::where('user_id',Auth::client()->get()->id)->get();
					return response()->json(['status' => '200','data'=>$messages],200);
				
				}else{
					return response()->json(['status' => '401','message'=>'Unauthorized : You are not logged in'],401);
				}
			}else{
				return response()->json(['status' => '400','message'=>'Bad Request : wrong secret key'],400);
			}
		}else{
			return response()->json(['status' => '400','message'=>'missing secret key'],400);
		}	
	}

	public function send(Request $bag)
	{
		if($bag->has('secret'))
		{
			if($bag->secret == @$this->api()->secret)
			{
				if(Auth::client()->check() == true)
				{
					if(trim($bag->has('msg') == ''))
					{

						return response()->json(['status' => '400','data'=>'missing msg key'],400);
					}
					
					$bag->merge(['sender'=>1]);
					$bag->merge(['user_id'=>Auth::client()->get()->id]);
					$bag->merge(['message'=>$bag->message]);

					$messages = Messages::create($bag->all());

					return response()->json(['status' => '200','data'=>'successfuly sent'],200);
				}else{
					return response()->json(['status' => '400','message'=>'Bad Request : You are not logged in'],400);
				}
			}else{
				return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
			}
		}else{
			return response()->json(['status' => '400','message'=>'missing secret key'],400);
		}	
	}


	
	/*public function get_CNV(Request $bag)
	{
		if($bag->has('secret'))
		{
			if($bag->secret == @$this->api()->secret)
			{
				if(Auth::client()->check() == true)
				{
					$admin = Admin::all();
					$sub = Messages::orderBy('created_at','DESC');
					$messages = DB::table(DB::raw("({$sub->toSql()}) as sub"))
					->where('user_id',Auth::client()->get()->id)
					->groupBy('admin_id')
					->get();
					$i=0;
					$data = [];
					foreach ($messages as $msgs) {
						$data[$i]['id'] = $msgs->admin_id;
						$data[$i]['message'] = $msgs->message;
						$data[$i]['admin'] = $admin->find($msgs->admin_id)->firstname.' '.$admin->find($msgs->admin_id)->lastname;
						$dt = Carbon::parse($msgs->created_at);
						$data[$i]['created_at'] = $dt->diffForHumans();
						$i++;
					}	
					return response()->json(['status' => '200','data'=>$data],200);
				}else{
					return response()->json(['status' => '400','message'=>'Bad Request : You are not logged in'],400);
				}
			}else{
				return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
			}
		}else{
			return response()->json(['status' => '400','message'=>'missing secret key'],400);
		}	
	}*/
}
