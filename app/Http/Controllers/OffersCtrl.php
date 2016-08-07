<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Offers ;
use App\Hotel ;
use App\Countries ;
use App\Cities ;

class OffersCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$offers = Offers::paginate(20) ; 
		return view('admin.offers.index' , compact('offers'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$hotels    = Hotel::lists('name_ar','id');
		$countries = Countries::lists('name_ar','id');
		$cities    = Cities::lists('name_ar','id');

		return view('admin.offers.create' ,compact('hotels','countries','cities')) ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{	

		$hotelName = Hotel::findOrFail($request->hotel_id) ;

		$request->merge(['slug_ar'=>$this->make_slug($request->$hotelName)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->$hotelName)]);
		
		Offers::create($request->all());
		return redirect()->to('admin/offers')->with(['msg'=>'تمت الأضافة بنجاح']);
	}

	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$offer     = Offers::findOrFail($id) ;
		$hotels    = Hotel::lists('name_ar','id');
		$countries = Countries::lists('name_ar','id');
		$cities    = Cities::lists('name_ar','id');

		return view('admin.offers.edit', compact('offer','hotels','countries','cities')) ;
	}

	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request ,$id)
	{
		Offers::create($request->all());
		return redirect()->to('admin/offers')->with(['msg'=>'تمت التعديل بنجاح']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	 	Offers::findOrFail($id)->delete() ;
		return Redirect()->to('admin/offers/')->with(['msg'=>'تم الحذف بنجاح']);
	}

}
