<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Admin;
use Validator;
class AdminsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$admins = Admin::all();
		return View('admin.admins.index',compact('admins'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//.
		$type = "add" ;
		return View('admin.admins.create' , compact('type'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
			
		$validator = Validator::make($request->all(),[
  				'name'            		=> 'required|unique:admins|min:6',
			    'email'            		=> 'required|email|unique:admins',
				'password'        		=> 'required|min:6|',
			],Admin::$rules);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}else{
			 $add =  Admin::create([
			    	'name'=>$request->name,
			    	'email'=>$request->email,
			    	'password'=>bcrypt($request->password),
			    	'pre'=>implode('|', $request->pre)
			    	]);
			return redirect()->back()->with('msg','success');
		}
	}

	public function edit($id)
	{
		$type = "edit" ;
		$admin = Admin::findOrFail($id);
		$pre = explode('|', $admin->pre); 
		return View('admin.admins.edit',compact('admin','type','pre'));
	}

	public function update(Request $request, $id)
	{	
			
		$admin = Admin::findOrFail($id);
		$validator = Validator::make($request->all(),[
			'name'            		=> 'required|min:6',
		    'email'            		=> 'required|email',
			'password'        		=> 'min:6',
			],Admin::$rules);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}else{
			if($request->has('pre'))
			{
				$request->merge(['pre'=>implode('|',$request->pre)]);
			}else{
				$request->merge(['pre'=>'']);
				
			}

			if($request->has('password'))
			{
				$request->merge(['password'=>bcrypt($request->password)]);
				$admin->update($request->all());
				return redirect()->back()->with('msg','Updated Successfuly !!');

			}else{
				$request->merge(['password'=>$admin->password]);
				$admin->update($request->all());
				return redirect()->back()->with('msg','Updated Successfuly !!');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$admin = Admin::findOrFail($id);
		$admin->delete();
		return redirect()->back()->with('msg','Deleted Successfuly !!');
	}

}
