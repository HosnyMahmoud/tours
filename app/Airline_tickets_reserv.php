<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline_tickets_reserv extends Model {

	protected $table = 'airline_tickets_reservs';
	protected $fillable = ['user_id' , 'airport_from' , 'airport_to' , 'num_persons' , 'num_child' , 'type' , 'date_from' , 'date_to','status'];

}
