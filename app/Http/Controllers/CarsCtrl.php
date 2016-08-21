<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cars ;

class CarsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cars = Cars::paginate(20) ;
		return view('admin.cars.index' , compact('cars')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.cars.create') ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$time = time();
	
		$dest = 'uploads/cars/';
		$file_name = $time.'.'.$request->file('img')->getClientOriginalExtension();
		$request->file('img')->move($dest,$file_name);
		
		//Image Proccess 
		/*
			$img = Image::make($dest.$file_name);
			$img->resize(300, 200);
			$img->save('uploads/hotels/thumb/logo/'.$file_name);
		//Image Proccess */

		$request->merge(['img'=>$file_name]);	

		Cars::create($request->all()) ;
		return redirect()->to('admin/cars')->with(['msg'=>'تمت الأضافة بنجاح']);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$car = Cars::findOrFail($id) ;
		return view('admin.cars.edit' , compact('car'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request , $id)
	{
		$car = Cars::findOrFail($id) ;

		if($request->has('img'))
		{
			$dest = 'uploads/cars/';
			$file_name = $time.".".$file->('img')->getClientOriginalExtension();
			$file->move($dest,$file_name);
				
			$request->merge(['img'=>$filename]);

		}

		Cars::update($request->all()) ;
	    return redirect()->to('admin/cars')->with(['msg'=>'تمت الأضافة بنجاح']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		dd($id) ;
		//
	}

}
