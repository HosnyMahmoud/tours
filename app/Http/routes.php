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


/******************* START API ROUTES ***********************/	

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
	
	// Get All Air Ports by city Id
		Route::get('air-ports','Api\AirPorts@getAirPortsByCityId'); 
	// Get All Air Ports by city Id
	
	// Reservation Tickets Airline 
		Route::post('tickets/reserv','Api\AirPorts@ticketsReservation'); 
	// Reservation Tickets Airline 		
			




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
		return View('admin.index');
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
	Route::get('bookings/special-offers','BookingsCtrl@getSpecialOffers');
	Route::get('bookings/tickets','BookingsCtrl@getTickets');
	Route::get('bookings/{type}/{id}','BookingsCtrl@confirmReserv');
	// bookings 

	// contactUs
	Route::resource('about', 'ContactUsCtrl');		
	// contactUs
});

/*
*********************************************************
*********** End Application Route [ Back End ] **********
*********************************************************
*/




/*
**********************************************************
  ******** Start Application Route [ Front End ] ********
**********************************************************
*/

	Route::get('/','FrontCtrl@index');
	Route::post('/','FrontCtrl@reserv_tickets');
	
	//Route::get('/','FrontCtrl@index');
	Route::get('get_airports/{id}','FrontCtrl@get_Airports');

	Route::get('lang/{lang}','LanguageCtrl@switcher');

	Route::get('travels','FrontCtrl@travels');
	Route::get('travels/{id}-{slug}','FrontCtrl@travel');

	Route::get('hotels','FrontCtrl@hotels');
	Route::get('hotels/{id}-{slug}','FrontCtrl@hotel');

	Route::get('services','FrontCtrl@services');

	Route::get('services','FrontCtrl@services');

	Route::get('contact','FrontCtrl@contact');
	
	Route::post('contact','FrontCtrl@sendContact');

/*
**********************************************************
  ******** End Application Route [ Front End ] ********
**********************************************************
*/

/*
**********************************************************
  ******** Start Application Route [ Dashboard ] ********
**********************************************************
*/

Route::get('login','LoginCtrl@showClientLogin');
Route::post('login','LoginCtrl@postClientLogin');

Route::get('register','LoginCtrl@showClientReg');
Route::post('register','LoginCtrl@postClientReg');
Route::get('success','LoginCtrl@RegSuccess');
Route::get('unverified_account','LoginCtrl@mustVerify');
Route::get('verify/{code}','LoginCtrl@verify');

Route::get('logout','LoginCtrl@ClientLogout');

Route::group(['prefix'=>'dashboard','middleware'=>'auth'],function(){

	Route::get('/','DashboardCtrl@index');
	Route::get('reservations','DashboardCtrl@reservations');
	Route::post('reservations','DashboardCtrl@check_reservations');

	Route::get('wishlist','DashboardCtrl@wishlist');
	Route::get('wishlist/{id}/delete','DashboardCtrl@wishlist_delete');
	Route::get('wishlist/hotels/add/{id}','FrontCtrl@hotelWishlist');
	Route::get('wishlist/travels/add/{id}','FrontCtrl@travelsWishlist');

	Route::post('hotels/reserv','FrontCtrl@reserve_hotels');

	
	Route::get('messages','DashboardCtrl@msgs');
	Route::post('messages','DashboardCtrl@msgsSend');

	Route::get('edit_personal','DashboardCtrl@editProfile');
	Route::post('edit_personal','DashboardCtrl@postProfile');



});
/*
**********************************************************
  ********  End Application Route [ Dashboard ]  ********
**********************************************************
*/