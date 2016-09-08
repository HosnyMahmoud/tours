<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SpecialOffers ;
use Carbon\Carbon ;
use Validator ;

class SpecialOffersCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $bag)
	{	
		if($bag->has('sort'))
		{	
			if($bag->sort == 0)
			{	
				$offers = SpecialOffers::paginate(10); 
			}
			if($bag->sort == 1)
			{	
				$offers = SpecialOffers::where('date_to','<',Carbon::now())->paginate(20); 
			}
			if($bag->sort == 2) {
				$offers = SpecialOffers::where('date_to','>=',Carbon::now())->paginate(20); 
			}
			if($bag->sort == 3)
			{
				$offers = SpecialOffers::where('status',0)->where('date_to','>',Carbon::now())->paginate(20);  
			}
			return view('admin.special_offers.index' , compact('offers','bag'));	
		}

		$offers = SpecialOffers::paginate(10); 
		return view('admin.special_offers.index' , compact('offers','bag'));	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.special_offers.create') ;
	}

	/** Show Function **/
	
	public function show($id)
	{
		$data = SpecialOffers::findOrFail($id) ;

		return View('admin.special_offers.show',compact('data'));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $bag)
	{	
		$validation = Validator::make($bag->all(),SpecialOffers::rules('add'));
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput() ;
		}

		if($bag->hasFile('imgs'))
		{	
			$dest     = 'uploads/special_offers/' ;
		    $i 		  = 1 ;
		    $paths    = '' ;
			foreach ($bag->file('imgs') as $image) // Mack For loop to upload multi images .
		 	{
				$fileName = $i.'_'.time().'.'.$image->getClientOriginalExtension();
				$image->move($dest,$fileName) ;
				
				($i == 1) ? $paths .= $fileName : $paths .= '|'.$fileName ;
				
				$i++ ;
			} 
			
			$bag->merge(['images' => $paths]);
		}

		$bag->merge(['slug_ar'=>$this->make_slug($bag->name_ar)]);		
		$bag->merge(['slug_en'=>$this->make_slug($bag->name_en)]);

		SpecialOffers::create($bag->all());
		return redirect()->to(Url('/').'/admin/special-offers')->with(['msg'=>'تمت الأضافة بنجاح']);
	}

	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$offer  = SpecialOffers::findOrFail($id) ;
		$exp    = explode('|', $offer->images) ; 
		return view('admin.special_offers.edit', compact('offer','exp')) ;
	}

	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $bag ,$id)
	{
		// All Data To Update .
		$offer   = SpecialOffers::findOrFail($id) ;
		// Case If user Choose images . 
		if($bag->hasFile('imgs'))
		{	
			$dest     = 'uploads/special_offers/' ;
		    $i 		  = 1 ;
		    $paths    = $offer->images ;
		    // Mack For loop to upload multi images .
			foreach($bag->file('imgs') as $image) {
				
				$fileName = $i.'_'.time().'.'.$image->getClientOriginalExtension();
				$image->move($dest,$fileName) ;
			
			    ($paths == "") ? $paths .= $fileName : $paths .= '|'.$fileName ;
				
				$i++ ;
			} 
			$bag->merge(['images' => $paths]);
		}else
		{
			$bag->merge(['images' => $offer->images]) ;
		}

		$bag->merge(['slug_ar'=>$this->make_slug($bag->name_ar)]);		
		$bag->merge(['slug_en'=>$this->make_slug($bag->name_en)]) ;
		
		$offer->update($bag->all()) ;
		return redirect()->to(Url('/').'/admin/special-offers')->with(['msg'=>'تمت التعديل بنجاح']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	 	SpecialOffers::findOrFail($id)->delete() ;
		return Redirect()->to(Url('/').'/admin/special-offers')->with(['msg'=>'تم الحذف بنجاح']);
	}


	public function startReservOffers($id)
	{
	 	$data = SpecialOffers::findOrFail($id);
	 	($data->status === 0)? $data->update(['status'=>1]) : $data->update(['status'=>0]);
		return Redirect()->to(Url('/').'/admin/special-offers')->with(['msg'=>'تم حفظ التعديلات بنجاح']);
	}

	public function delete_img($id, $name)
	{
		$data = SpecialOffers::findOrFail($id) ;
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
