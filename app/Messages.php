<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model {

	protected $table   = 'messages' ;
	protected $fillable = ['msg', 'user_id', 'admin_id', 'sender', 'status'] ;

}
