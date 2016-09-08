<?php
Route::get('notification' , function(){

			//$users = User::where('device_token','!=','')->get();
			$message = PushNotification::Message('سوافور',array(
		        'msgcnt'=> 1,
		        'title'=>'عربى',
		        'image'=>'http://sawa4.com.eg/sawa4-profile/images/logo.png',
			));
			//foreach ($users as $user) {

			PushNotification::app('Android')
                ->to("f25mwZgO5tE:APA91bFLc4seSr1UryuAh3RSFNUM28bys1sDsNOGhKmlWUJKLO7wc6dbGpPLRI8ybOO26u0lxqqyhPBxQWn-pX36mf_nL9_pUYvNGbIa7Sk-sMY26aW3Dw6KFeMHRoX4ehvvOBfN8TcF"/*$user->device_token*/)
                ->send($message);

			//}
		});
/*  Start Front End Routes */

Route::get('/',function()
{
	return View('front.layout');
});

/*  End Front End Routes */
	

/***************** Start Api Routes ***********************/	

Route::group(['prefix'=>'api'],function(){

	//global APIs
		Route::get('locations/countries','Api\LocationsCtrl@getCountries');
		Route::get('locations/cities','Api\LocationsCtrl@getCities');
		Route::get('settings/get','Api\getSettings@getSettings');
	//global APIs
	
	//User APIs
		Route::post('users/register','Api\Users@register');
		Route::post('users/login','Api\Users@login');
		Route::post('users/social','Api\Users@loginSocial');
		Route::post('users/logout','Api\Users@logout');
	//User APIs
	
	//Hotels Route .	
		Route::get('hotels/all','Api\HotelsCtrl@getHotels');
		Route::get('hotels/one','Api\HotelsCtrl@getOneHotel');
		Route::get('hotels/search','Api\HotelsCtrl@getSearchHotels'); 
		Route::post('hotels/reservations','Api\HotelsCtrl@startReservations'); 
	//Hotels Route .
		
	// Countires Api
		
		Route::get('countries/all','api\AllCountries@getCountries');
		Route::get('cities/all','api\AllCities@getCities');

	// Countires Api

	/* Start Cars Api Route */
		Route::get('cars/brand','Api\BrandCtrl@getBrand'); 
		Route::get('cars/offers','Api\OffersCtrl@searchOffers'); 
		Route::post('cars/reserv','Api\OffersCtrl@offersReserv'); 
	/* End Cars Api Route */
	
	// Travels ..
		Route::get('travels','Api\TravelsCtrl@getTravels'); 
		Route::post('travel/reserv','Api\TravelsCtrl@ReservTravel'); 
	// Travels ..

	// Messages
		Route::get('messages','Api\MessagesCtrl@get_msgs'); 
		Route::post('messages/send','Api\MessagesCtrl@send'); 
	// Messages ..

	// WishList
		Route::get('wishlist','Api\WishListCtrl@getWishList'); 
		Route::post('wishlist/add','Api\WishListCtrl@addToWishList'); 
	// WishList ..
	
	// Special Offers
		Route::get('offers/get','Api\SpecialOffersApi@getSpecialOffers'); 
		Route::post('offer/reserv','Api\SpecialOffersApi@ReservSpecialOffers'); 
	// Special Offers
		
		

});

/*
**********************************************************
  ******** Start Application Route [ Back End ] ********
**********************************************************
*/

Route::get('admin/login','LoginCtrl@showAdminLogin');
Route::post('admin/login','LoginCtrl@postAdminLogin');
Route::get('admin/logout','LoginCtrl@AdminLogout');
	
Route::group(['prefix'=>'admin','middleware'=>'authAdmin'],function(){
	
	Route::get('/',function()
	{
		return View('admin.layout');
	});

	// Countries and cities .
	Route::resource('countries','CountriesCtrl');
	Route::resource('cities','CitiesCtrl');
	// Countries and cities .
	
	// Cars  
	Route::resource('cars_brand','CarsBrandCtrl');
	Route::resource('cars_models','CarsModelsCtrl');
	// Cars Offer //
	Route::resource('carsOffers','CarsOffersCtrl');
	// Cars  
	
	// Hotels
	Route::get('hotels/delete_img/{id}/{img_name}','HotelsController@img_delete');
	Route::resource('hotels','HotelsController');
	// Hotels
	
	// Settings 
	Route::resource('settings','SettingsCtrl');
	// Settings 
	
	// Admins 
	Route::resource('admins','AdminsCtrl');
	// Admins 

	// Travels
	Route::resource('travels','TravelsCtrl');
	Route::get('travels/delete_img/{pid}/{name}','TravelsCtrl@delete_img');
	// Travels

	// Special Offers
	Route::resource('special-offers','SpecialOffersCtrl');
	Route::get('special-offers/{id}/activate','SpecialOffersCtrl@startReservOffers');
	Route::get('special-offers/delete_img/{pid}/{name}','SpecialOffersCtrl@delete_img');
	// Special Offers
	
	// Air_ports
	Route::resource('air_ports','AirPortsCtrl');
	// Air_ports
	
	
	// Users
	Route::resource('users','UsersCtrl');
	// Users
	
	// bookings
	Route::get('bookings/cars','BookingsCtrl@getCars');
	Route::get('bookings/hotels','BookingsCtrl@gethotels');
	Route::get('bookings/travels','BookingsCtrl@getTeavels');
	Route::get('bookings/special-offers','BookingsCtrl');
	// bookings 

	/*
		Route::resource('areas','AreasCtrl');
		Route::resource('salons','SalonsCtrl'); 
	*/
	
	
});

/*
**********************************************************
  ******** End Application Route [ Back End ] ********
**********************************************************
*/


/*
**********************************************************
  ******** Start Application Route [ Front End ] ********
**********************************************************
*/

	Route::get('/','FrontCtrl@index');

/*
**********************************************************
  ******** End Application Route [ Front End ] ********
**********************************************************
*/