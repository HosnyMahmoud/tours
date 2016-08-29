<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Admin;
use Validator;
use Auth ;
class AdminsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pre = Auth::admin()->get()->pre ;
	
		if(in_array('admins', explode('|', $pre)))
		{
			$admins = Admin::all();
			return View('admin.admins.index',compact('admins'));
		}

		redirect()->to(Url('/').'/admin')->with(['msgErr' => 'عفوا , غير مسموح بالتحكم في هذة الصفحة .']) ;

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
	public function store(Request $bag)
	{
			
		$validator = Validator::make($bag->all(),Admin::rules('add'),Admin::msg());
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}	
	    	
			$bag->merge(['pre'      => implode('|', $bag->pre)]) ;
			$bag->merge(['password' => bcrypt($bag->password) ]) ;
			
			Admin::create($bag->all());
			return redirect()->to(Url('/').'/admin/admins')->with('msg','success');
		
	}

	public function edit($id)
	{
		$type = "edit" ;
		$admin = Admin::findOrFail($id);
		$pre = explode('|', $admin->pre); 
		return View('admin.admins.edit',compact('admin','type','pre'));
	}

	public function update(Request $bag, $id)
	{	
			
		$validator = Validator::make($bag->all(),Admin::rules('edit', $id),Admin::msg());
		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}	
		$admin   = Admin::findOrFail($id);

		if($bag->has('pre'))
		{
			$bag->merge(['pre'=>implode('|',$bag->pre)]);
		}else{
			$bag->merge(['pre'=> $admin->pre ]);
		}

		if($bag->has('password'))
		{
			$bag->merge(['password'=>bcrypt($bag->password)]);
			
		}else{
			$bag->merge(['password'=>$admin->password]);
		}
			$admin->update($bag->all());
			return redirect()->back()->with('msg','Updated Successfuly !!');
	}
	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$admin = Admin::findOrFail($id);
		$admin->delete();
		return redirect()->back()->with('msg','Deleted Successfuly !!');
	}

}
