<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Countries ;
use App\Cities;
use Validator; 

class CountriesCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$countries = Countries::paginate(20) ;
		return view('admin.countries.countries.index' , compact('countries')) ;
	}

	public function show($id)
	{
		$cities = Cities::where('country_id',$id)->paginate(20);
		return view('admin.countries.cities.index' , compact('cities')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			
		return view('admin.countries.countries.create') ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{	
		$validation = Validator::make($bag->all(),Countries::rules('add')) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		Countries::create($bag->all());
		return redirect()->to(Url('/').'/admin/countries')->with(['msg'=>'تمت الأضافة بنجاح']) ;
 	}

	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Countries 
		$country = Countries::findOrFail($id);
		return view('admin.countries.countries.edit' , compact('country')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{

		$validation = Validator::make($bag->all(),Countries::rules('add')) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		} 
		
		Countries::findOrFail($id)->update($request->all()) ;
		return redirect()->to(Url('/').'/admin/countries')->with(['msg'=> 'تمت الأضافة بنجاح']) ;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cities::where('country_id',$id)->delete() ;
		Countries::findOrFail($id)->delete() ;
		return redirect()->to(Url('/').'/admin/countries')->with(['msg'=> 'تمت الحذف بنجاح']) ; 		
	}

}
