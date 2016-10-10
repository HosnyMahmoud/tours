<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\contactUs ;
use Validator ;
	
class ContactUsCtrl extends Controller {

	public function index()
	{	
		$rows = contactUs::paginate(30);
		return view('admin.contact_us.index' , compact('rows')) ;
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
	public function create()
	{
		return view('admin.contact_us.create') ;
	}

	public function store(Request $bag)
	{	
		$validation = Validator::make($bag->all(),$this->rules()) ;
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		contactUs::create($bag->all());
		return redirect()->to(Url('/').'/admin/about')->with(['msg'=>'تمت الأضافة بنجاح']) ;
 	}

 	public function edit($id)
	{
		// Countries 
		$row = contactUs::findOrFail($id);
		return view('admin.countries.countries.edit' , compact('row')) ;
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
