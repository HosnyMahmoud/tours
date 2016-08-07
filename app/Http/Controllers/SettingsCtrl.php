<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Settings;
class SettingsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$settings = Settings::first();
		return view('admin.settings' , compact('settings')) ;
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

        return redirect()->back(); 
	
	}

	

}
