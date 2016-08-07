<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\ApiSettings;
use Validator;
use Auth;
class Users extends Controller {
	public function api()
	{
		$api = ApiSettings::first();
		return $api;
	}
	public function register(Request $bag)
	{
		if($bag->has('secret'))
		{
			if($bag->secret == @$this->api()->secret)
			{
				if(Auth::client()->check() == false)
				{
					$validator =  Validator::make($bag->all(), [
						'email' 	=> 'required|unique:users',
						'mobile' 	=> 'required|unique:users',
						'password' 	=> 'required|min:5',
						'source' 	=> 'required',
					]);
					if($validator->fails()){
						return response()->json(['status' => '400','message'=>'Some Errors Happened','errors'=>$validator->errors()->all()],400);
					}else{
						$bag->merge(['password'=>bcrypt($bag->password)]);
						User::create($bag->all());
						return response()->json(['status' => '200','message'=>'succssfuly Registered'],200);
					}
				}else{
					return response()->json(['status' => '400','message'=>'Bad Request : Already Logged In'],400);	
				}
			}else{
				return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
			}
		}else{
			return response()->json(['status' => '400','message'=>'missing secret key'],400);
		}
	}
	public function login(Request $bag)
	{
		if($bag->has('secret'))
		{
			if($bag->secret == @$this->api()->secret)
			{
				if(Auth::client()->check() == false)
				{
					$validator =  Validator::make($bag->all(), [
						'email' 	=> 'required',
						'password' 	=> 'required',
					]);
					if($validator->fails()){
						return response()->json(['status' => '400','message'=>'Some Errors Happened','errors'=>$validator->errors()->all()],400);
					}else{
						$this->auth = Auth::client();
						if ($this->auth->attempt($bag->only('email', 'password')))
					    {
							/*$data['id'] 		= Auth::client()->get()->id;
							$data['email'] 		= Auth::client()->get()->email;
							$data['source'] 	= Auth::client()->get()->source;
							$data['source_id'] 	= Auth::client()->get()->source_id;*/
						
							$data = User::where('email',$bag->email)->first() ;
							return response()->json([
								'status'    => '200',
								'id'        =>$data['id'],
								'email'     =>$data['email'],
								'mobile'    =>$data['mobile'],
								'source'    =>$data['source'],
								'source_id' =>$data['source'],
												],200);
							
						}else{
							return response()->json(['status' => '401','message'=>'Unauthorized : Wrong username Or mobile'],401);
						}
					}
				}else{
					/*$data['id'] 		= Auth::client()->get()->id;
					$data['email'] 		= Auth::client()->get()->email;
					$data['mobile'] 	= Auth::client()->get()->mobile;
					$data['source'] 	= Auth::client()->get()->source;
					$data['source_id'] 	= Auth::client()->get()->source_id;*/
					$data = User::where('id',Auth::client()->get()->id)->first() ;
					return response()->json([
								'status'    => '200',
								'id'        =>$data['id'],
								'email'     =>$data['email'],
								'mobile'    =>$data['mobile'],
								'source'    =>$data['source'],
								'source_id' =>$data['source'],
								'message'   =>'Bad Request : Already Logged In'
								],400);
					}	
			}else{
				return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
			}
		}else{
			return response()->json(['status' => '400','message'=>'missing secret key'],400);
		}
	}
	public function loginSocial(Request $bag)
	{
		if(!$bag->has('secret'))
		{
			return response()->json(['status' => '401','message'=>'Unauthorized : missing secret key'],401);
		}
		if($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
		}
		if(Auth::client()->check() == true)
		{
			return response()->json(['status' => '400','message'=>'Bad Request : Already Logged In'],401);
		}

		$users = User::where('source',$bag->source)->where('source_id',$bag->source_id)->first();
		$this->auth = Auth::client();
		if(count($users)>0)
		{
			Auth::client()->loginUsingId($users->id);
			return response()->json(['status' => '200','data'=>$users],200);
		}else{
			$bag->merge(['email'=>$bag->source_id.'@'.$bag->source.'.com']);
		 	$new_reg = User::create($bag->all());
			Auth::client()->loginUsingId($new_reg->id);
			return response()->json(['status' => '200','msg'=>'login success'],200);
		}
	}

	public function logout(Request $bag)
	{
		if($bag->has('secret'))
		{
			if($bag->secret == @$this->api()->secret)
			{
				if(Auth::client()->check() == true)
				{
					Auth::client()->logout();	
					return response()->json(['status' => '200','message'=>'succssfuly logged out'],200);
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
	
}
