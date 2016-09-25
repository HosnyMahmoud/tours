<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\contactUs ;
use Validator ;
	
class ContactUsCtrl extends Controller {

	public function index()
	{	
		$col = contactUs::first();
		return view('admin.contactUs' , compact('col')) ;
	}
	
	
	public function rules()
	{
		return [
					'title_ar'     => 'required',
					'title_en'     => 'required',
					'content_ar'   => 'required',
					'content_en'   => 'required',
				];
	}


	public function update(Request $request , $id)
	{
		$validation = Validator::make($request->all(),$this->rules()) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		$data = $request->all();
	    contactUs::findOrFail($id)->update($data);

        return redirect()->back()->with(['msg'=>'تم حفظ التعديلات']); 
	
	}

		
}
