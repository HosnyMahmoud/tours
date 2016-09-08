<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel ;
use Image;

use App\Countries;
use App\Cities;
class HotelsController extends Controller {
	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{
		$hotels = Hotel::paginate(20) ;
		return view('admin.hotels.index', compact('hotels'));
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

		return view('admin.hotels.create', compact('countries','cities'));
	}
	/**
	* Store a newly created resource in storage.
	*
	* @return Response
	*/
	public function store(Request $request)
	{
		$time = time();
		if($request->hasFile('log'))
		{
		$dest = 'uploads/hotels/logo/';
		$file_name = $time.'.'.$request->file('log')->getClientOriginalExtension();
		$request->file('log')->move($dest,$file_name);
		
		//Image Proccess
			$img = Image::make($dest.$file_name);
			$img->resize(300, 200);
			$img->save('uploads/hotels/logo/thumb/'.$file_name);
		//Image Proccess
		$request->merge(['logo'=>$file_name]);
		}
		if($request->hasFile('image'))
			{
			$i = 1 ;
			$filename = '';
			foreach ($request->file('image') as $file) {
				$dest = 'uploads/hotels/';
				$file_name = $time."_$i.".$file->getClientOriginalExtension();
				$file->move($dest,$file_name);
				if($i == 1)
				{
					$filename .= $file_name ;
				}else{
					$filename .= '|'.$file_name ;
				}
				$i++ ;
			}
			$request->merge(['images'=>$filename]);
		}
		
		$request->merge(['slug_ar'=>$this->make_slug($request->name_ar)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->name_en)]) ;
		
		/*dd($request->all());*/
		
		Hotel::create($request->all()) ;
		
		return redirect()->to('admin/hotels')->with(['msg'=>'تمت الأضافة بنجاح']);
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function edit($id)
	{
		$hotel     = Hotel::findOrFail($id) ;
		$countries = Countries::lists('name_ar','id') ;
		$cities    = Cities::lists('name_ar','id') ;
		
		return view('admin.hotels.edit' , compact('hotel','countries','cities')) ;
	}


	public function show($id)
	{
		// Hotels // 
		$hotel     	= Hotel::findOrFail($id);
	
		$countries 	= Countries::all() ;
		$cities    	= Cities::all();

		return View('admin.hotels.show',compact('hotel','countries','cities'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update(Request $request,$id)
	{
		$hotel = Hotel::findOrFail($id) ;
		$time = time();
		if($request->hasFile('log'))
		{
			$dest = 'uploads/hotels/logo';
			$file_name = $time.'.'.$request->file('log')->getClientOriginalExtension();
			$request->file('log')->move($dest,$file_name);
			$request->merge(['logo'=>$file_name]);
		}
		
		if($request->hasFile('image'))
		{
			$i = 1 ;
			$filename = $hotel->images ;
			foreach ($request->file('image') as $file) {
				$dest = 'uploads/hotels/';
				$file_name = $time."_$i.".$file->getClientOriginalExtension();
				$file->move($dest,$file_name);
				if($filename == "")
				{
					$filename .= $file_name ;
				}else{
					$filename .= '|'.$file_name ;
				}
				$i++ ;
			}
			
			$request->merge(['images'=>$filename]);
		}

		$request->merge(['slug_ar'=>$this->make_slug($request->name_ar)]);		
		$request->merge(['slug_en'=>$this->make_slug($request->name_en)]) ;
		
		$hotel->update($request->all());
		return redirect()->to('admin/hotels')->with(['msg'=>'تمت التعديل بنجاح']);
	}
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function destroy($id)
	{
		//
		Hotel::findOrFail($id)->delete();
		return redirect()->to('admin/hotels')->with(['msg'=>'تم الحذف بنجاح']);
	}
	public function img_delete($id,$image)
	{
		$articles = Hotel::findOrFail($id);
		$images =  explode('|',$articles->images);
		foreach (array_keys($images, $image, true) as $key) {
		unset($images[$key]);
		}
		$new = implode('|', $images);
		$articles->update(['images'=>$new]);
		return redirect()->back();
	}
	
	/*public function make_slug($string = null, $separator = "-") {
	if (is_null($string)) {
	return "";
	}
	// Remove spaces from the beginning and from the end of the string
	$string = trim($string);
	// Lower case everything
	// using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
	$string = mb_strtolower($string, "UTF-8");
	// Make alphanumeric (removes all other characters)
	// this makes the string safe especially when used as a part of a URL
	// this keeps latin characters and arabic charactrs as well
	$string = preg_replace("/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);
	// Remove multiple dashes or whitespaces
	$string = preg_replace("/[\s-]+/", " ", $string);
	// Convert whitespaces and underscore to the given separator
	$string = preg_replace("/[\s_]/", $separator, $string);
	return str_limit($string,100,'');
	}
	*/
}