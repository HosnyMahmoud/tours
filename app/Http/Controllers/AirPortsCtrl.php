<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\AirPort ;
use App\Cities ;
use Validator ;
class AirPortsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$airPorts = AirPort::paginate(10) ;
		return view('admin.air_ports.index' , compact('airPorts')) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$cities = Cities::lists('name_ar','id');
		return view('admin.air_ports.create' , compact('cities')) ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		AirPort::create($request->all()) ;
		return redirect()->to(Url('/').'/admin/air_ports')->with(['msg'=>'تمت الأضافة بنجاح']) ;	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$airPorts = AirPort::findOrfail($id) ;
		$cities = Cities::all() ;
		return view('admin.air_ports.show' ,compact('airPorts','cities')) ;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$airPort   = AirPort::findOrFail($id);
		$cities    = Cities::lists('name_ar','id');
		
		return view('admin.air_ports.edit' , compact('airPort','cities')) ;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request ,$id)
	{
		AirPort::findOrfail($id)->update($request->all());
		return redirect()->to(Url('/').'/admin/air_ports')->with(['msg'=>'تم التعديل بنجاح']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		AirPort::findOrfail($id)->delete();
		return redirect()->to(Url('/').'/admin/air_ports')->with(['msg'=>'تم الحذف بنجاح']);
	}

}
