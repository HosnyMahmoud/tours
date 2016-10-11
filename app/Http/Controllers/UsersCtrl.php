<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class UsersCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	

		$users = User::paginate(10);
		return View('admin.users.index',compact('users'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		//dd($request->all()) ;

		$request->merge(['password'=>bcrypt($request->password)]);
		$user =  User::create($request->all());
		return redirect()->to('admin/users')->with(['msg'=>'تمت الأضافة بنجاح.']);			
	
	}

	/**
	 **
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return View('admin.users.edit',compact('user'));
	}


	public function show($id)
	{
		$user = User::findOrFail($id);
		return View('admin.users.show',compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$user = User::findOrFail($id);
		
		if($request->password !== "")
		{
			$request->merge(['password'=>bcrypt($request->password)]);
		}else{
			$request->merge(['password'=>$user->password]);
		}

		$user->update($request->all());
		return redirect()->to('admin/users')->with(['msg' => 'تم التعديل بنجاح.']);			
			
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::findOrFail($id)->delete();
		return redirect()->to('admin/users')->with(['msg' => 'تم الحذف بنجاح.']);			
		
	}

}
