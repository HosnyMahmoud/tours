<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\CarsModels ;
use App\CarsBrands ;

use App\Countries ;
use App\Cities ;


class CarsModelsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$models    = CarsModels::paginate(20);
		$countries = Countries::all();
		$cities    = Cities::all();
		return view('admin.cars.cars_models.index' , compact('models','countries','cities'));

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

		$brands    = CarsBrands::lists('brand_name','id');
		return view('admin.cars.cars_models.create' , compact('brands','countries','cities')) ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(request $request) 
	{	
		$request->merge(['slug_ar'=>$this->make_slug($request->model_name)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->model_name)]);

		CarsModels::create($request->all());
		return redirect()->to(Url('/').'/admin/cars_models')->with(['msg'=>'تم إضافه الموديل بنجاح']);		
	}

	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$model     = CarsModels::findOrFail($id);
		$brands    = CarsBrands::lists('brand_name','id');

		$countries = Countries::lists('name_ar','id') ;
		$cities    = Cities::lists('name_ar','id') ;

		return view('admin.cars.cars_models.edit' , compact('model','brands','countries' , 'cities'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request ,$id)
	{
		
		$request->merge(['slug_ar'=>$this->make_slug($request->model_name)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->model_name)]);
				
		$data = $request->all();
		CarsModels::findOrFail($id)->update($data);
		return redirect()->to(Url('/').'/admin/cars_models')->with(['msg'=>'تم تعديل الموديل بنجاح']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CarsModels::findOrFail($id)->delete();
		return redirect()->to(Url('/').'/admin/cars_models')->with(['msg' => 'تم الحذف بنجاح']);
	}

}
