<?php namespace App\Http\Controllers\Api;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ApiSettings;
use Validator;
use Auth;
class Users extends Controller {
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
	public function register(Request $bag)
	{
		if(Auth::client()->check() == true)
		{
				return response()->json(['status' => '400','message'=>'Bad Request : Already Logged In'],400);
		}
		
		$validator =  Validator::make($bag->all(), [
						//'source' 	=> 'required',
						'name'   	=> 'required',
						'password' 	=> 'required|min:5',
						'email' 	=> 'email|unique:users',
						'phone' 	=> 'required|unique:users',
		]);
		if($validator->fails()){
			return response()->json(['status' => '400','message'=>'Some Errors Happened','errors'=>$validator->errors()->all()],400);
		}
		$bag->merge(['password'=>bcrypt($bag->password)]);
		User::create($bag->all());
			return response()->json(['status' => '200','message'=>'succssfuly Registered'],200);
	}

	public function login(Request $bag)
	{
		if(Auth::client()->check() == false)
		{
			$validator =  Validator::make($bag->all(), [
				'email' => 'required|email',
				'password' => 'required',
			]);
			if($validator->fails()){
				return response()->json(['status' => '400','message'=>'Some Errors Happened','errors'=>$validator->errors()->all()],400);
			}else{
				$this->auth = Auth::client();
				if ($this->auth->attempt($bag->only('email', 'password'))){
					$data['id']       = Auth::client()->get()->id;
					$data['name']     = Auth::client()->get()->name;
					$data['email']    = Auth::client()->get()->email;
					$data['mobile'] = Auth::client()->get()->mobile;
				
					return response()->json([
						'status'    => '200',
						'id'        => $data['id'],
						'name'     => $data['name'],
						'email' 	=> $data['email'],
						'mobile'  => $data['mobile'],
						'message'   => 'succssfuly Logged in'
						],200);
				}else{
					return response()->json(['status' => '401','message'=>'Unauthorized : Wrong Email Or Password'],401);
				}
			}
		}else{
			$data['id'] = Auth::client()->get()->id;
			$data['email'] = Auth::client()->get()->email;
			$data['name'] = Auth::client()->get()->name;
			$data['mobile'] = Auth::client()->get()->mobile;
			return response()->json([
				'status' => '400',
				'id'        => $data['id'],
				'name'     => $data['name'],
				'email' 	=> $data['email'],
				'mobile'  => $data['mobile'],
				'message'=>'Bad Request : Already Logged In'
				],400);
			}
	}// end function Login	
	
	public function loginSocial(Request $bag)
	{
		if(Auth::client()->check() == true)
		{
			return response()->json(['status' => '400','message'=>'Bad Request : Already Logged In'],401);
		}
		$validator =  Validator::make($bag->all(), [
						'source' 	=> 'required',
						'source_id' 	=> 'required',
		]);
		if($validator->fails()){
			return response()->json(['status' => '400','message'=>'Some Errors Happened','errors'=>$validator->errors()->all()],400);
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
		if(Auth::client()->check() == false)
		{
			return response()->json(['status' => '400','message'=>'Bad Request : You are not logged in'],400);
		}
			Auth::client()->logout();
		return response()->json(['status' => '200','message'=>'succssfuly logged out'],200);
	}
	
}