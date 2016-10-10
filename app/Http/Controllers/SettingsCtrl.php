<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Settings;
use App\Admin;
use Auth ;

class SettingsCtrl extends Controller {
	

	public function index()
	{	
		$check = Auth::admin()->get()->pre ;
		
 		if(in_array('settings', explode('|', $check)))
		{
			$settings = Settings::first();
			return view('admin.settings' , compact('settings')) ;
		}

		return redirect()->to(Url('/').'/admin')->with(['msgErr'=>'عفوا , غير مسموح بزيارة هذة الصفحة']);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request , $id)
	{
		$data = $request->all();
     
	    Settings::findOrFail($id)->update($data);

        return redirect()->back()->with(['msg'=>'تم حفظ التعديلات .']);; 
	
	}

	

}
