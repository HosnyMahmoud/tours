<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\CarsBrands;
use App\CarsModels;
use App\Countries ;
use App\Cities ;

class CarsBrandCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$brands = CarsBrands::paginate(20);
		$countries = Countries::all();
		$cities    = Cities::all();
		return view('admin.cars.cars_brand.index' , compact('brands','countries','cities')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$countries = Countries::lists('name_ar','id') ;
		$cities    = Cities::lists('name_ar','id') ;

		return view('admin.cars.cars_brand.create',compact('countries','cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{	

		$request->merge(['slug_ar'=>$this->make_slug($request->brand_name)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->brand_name)]);

		CarsBrands::create($request->all());
		return redirect()->to(Url('/').'/admin/cars_brand')->with(['msg'=>'تم إضافه البراند بنجاح']);		
	}

	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$brand = CarsBrands::findOrFail($id);
		
		$countries = Countries::lists('name_ar','id') ;
		$cities    = Cities::lists('name_ar','id') ;

		return view('admin.cars.cars_brand.edit' , compact('brand','countries','cities')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		
			
		$request->merge(['slug_ar'=>$this->make_slug($request->brand_name)]) ;
		$request->merge(['slug_en'=>$this->make_slug($request->brand_name)]) ;
		$data = $request->all();
		
		CarsBrands::findOrFail($id)->update($data);
		return redirect()->to(Url('/').'/admin/cars_brand')->with(['msg'=>'تم تعديل البراند بنجاح']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CarsModels::where('brand_id',$id)->delete();
		CarsBrands::findOrFail($id)->delete();
		return redirect()->back()->with(['msg'=>'تم حذف البراند بنجاح']);
	}

}
