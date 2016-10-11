<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Travels ;
use App\Countries ;
use App\Cities ;
use App\CarsBrands ;
use App\CarsModels ;
use App\Hotel ;
use Validator ;
use Carbon\Carbon;

class TravelsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$travels     = Travels::paginate(10) ;
		$countries   = Countries::all();
		$cities      = Cities::all();
		$hotels      = Hotel::all();

		return view('admin.travels.index' ,compact('travels', 'countries','cities','hotels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$hotels      = Hotel::lists('name_ar','id') ;
		$countries   = Countries::lists('name_ar','id');
		$cities      = Cities::lists('name_ar','id');
		/*$countries_all = Countries::all();
	    $cities_all = Cities::get();
	    $data = [];
	    $i = 1;
	    foreach ($countries_all as $country) {
	        $cities_all = Cities::where('country_id',$country->id)->get();
	        $z = 0;
	        foreach ($cities_all as $city) {
	         
	    	$data[$country['name_ar']][$city['id']] =  $city['name_ar']; 
	            $z++;   
	        }
		} // End foreach*/
		return view('admin.travels.create' , compact('hotels','countries','cities')) ;

	}

	public function show($id)
	{
		$travel 	 = Travels::findOrFail($id) ;
		$hotel       = Hotel::all();
		$countries   = Countries::all();
		$cities      = Cities::all();

		return view('admin.travels.show' , compact('travel','hotel','countries','cities')) ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{	
		$validation = Validator::make($bag->all(),Travels::rules('add')) ;		
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput();
		}

		if($bag->hasFile('imgs'))
		{	

			$dest     = 'uploads/travels/' ;
		    $i 		  = 1 ;
		    $paths = '' ;

		    // Mack For loop to upload multi images .
			foreach ($bag->file('imgs') as $image) {
				
				$fileName = $i.'_'.time().'.'.$image->getClientOriginalExtension();
				$image->move($dest,$fileName) ;
			
				if($i == 1)
					$paths .= $fileName ;
				else
					$paths .= '|'.$fileName ;

				$i++ ;
			} // End Foreach .
			
			$bag->merge(['images' => $paths]);
		}

		$bag->merge(['date_from'=>Carbon::parse($bag->date_from)]);	
		$bag->merge(['date_to'=>Carbon::parse($bag->date_to)]);	

		$bag->merge(['slug_ar'=>$this->make_slug($bag->name_ar)]);		
		$bag->merge(['slug_en'=>$this->make_slug($bag->name_en)]);

		Travels::create($bag->all()) ;
		return redirect()->to(Url('/').'/admin/travels')->with(['msg'=>'تمت الأضافة بنجاح']) ;
	}

	
	public function edit($id)
	{
		$travel      = Travels::findOrFail($id) ;
		$hotels      = Hotel::lists('name_ar','id') ;
		$countries   = Countries::lists('name_ar','id');
		$cities      = Cities::lists('name_ar','id');
		$exp = explode('|', $travel->images) ;
	
		/*$countries_all = Countries::all();
	    $cities_all = Cities::get();
	    $data = [];
	    $i = 1;
	    foreach ($countries_all as $country) {
	        $cities_all = Cities::where('country_id',$country->id)->get();
	        $z = 0;
	        foreach ($cities_all as $city) {
	         
	    	$data[$country['name_ar']][$city['id']] =  $city['name_ar']; 
	            $z++;   
	        }
		} // End foreach*/
		return view('admin.travels.edit' , compact('travel','hotels','countries','cities','exp')) ;
	}

	
	public function update(Request $bag ,$id)
	{
		$validation = Validator::make($bag->all(),Travels::rules('edit',$id)) ;		
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput();
		}
		// All Data To Update .
		$travel   = Travels::findOrFail($id) ;
		// Case If user Choose images . 
		if($bag->hasFile('imgs'))
		{	
			$dest     = 'uploads/travels/' ;
		    $i 		  = 1 ;
		    $paths    = $travel->images ;
		    // Mack For loop to upload multi images .
			foreach($bag->file('imgs') as $image) {
				
				$fileName = $i.'_'.time().'.'.$image->getClientOriginalExtension();
				$image->move($dest,$fileName) ;
			
				if($paths == "")
					$paths .= $fileName ;
				else
					$paths .= '|'.$fileName ;

				$i++ ;
			} // End Foreach .
			
			$bag->merge(['images' => $paths]);
		}else
		{
			$bag->merge(['images' => $travel->images]) ;
		}

		$bag->merge(['date_from'=>Carbon::parse($bag->date_from)]);	
		$bag->merge(['date_to'=>Carbon::parse($bag->date_to)]); 

				
		$bag->merge(['slug_ar'=>$this->make_slug($bag->name_ar)]);		
		$bag->merge(['slug_en'=>$this->make_slug($bag->name_en)]) ;
		
		$travel->update($bag->all()) ;
		return redirect()->to(Url('/').'/admin/travels')->with(['msg'=>'تمت حفظ التعديلات']) ;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Travels::findOrFail($id)->delete();
		return redirect()->to(Url('/').'/admin/travels')->with(['msg'=>'تم الحذف بنجاح']) ; 

	}

	public function delete_img($id,$name)
	{
		$data = Travels::findOrFail($id) ;
		$keys = explode('|', $data->images) ;
		
		foreach (array_keys($keys, $name,true) as $key) 
		{
			unset($keys[$key]) ;
		}
		$new = implode('|', $keys) ;
		$data->update(['images'=>$new]);
		return redirect()->back() ;
	}


}
