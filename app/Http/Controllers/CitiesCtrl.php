<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cities ;
use App\Countries ;

class CitiesCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities  = Cities::paginate(20) ;
		$country = Countries::all() ; 
		return view('admin.countries.cities.index' ,compact('cities','country')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$countries = Countries::lists('name_ar' , 'id');
		return view('admin.countries.cities.create' , compact('countries')) ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{	
		Cities::create($request->all()) ;
		return redirect()->to(Url('/').'/admin/cities')->with(['msg'=>'تمت الأضافة بنجاح']) ;		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$city = Cities::findOrfail($id) ;	
		$countries = Countries::lists('name_ar' , 'id');
		return view('admin.countries.cities.edit' , compact('city','countries')) ; 
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		Cities::findOrfail($id)->update($request->all());
		return redirect()->to(Url('/').'/admin/cities')->with(['msg'=>'تم التعديل بنجاح']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cities::findOrfail($id)->delete();
		return redirect()->to(Url('/').'/admin/cities')->with(['msg'=>'تم الحذف بنجاح']);
	}

}
