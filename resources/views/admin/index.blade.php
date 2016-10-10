<?php 
use App\User ;
use App\Hotel ;
use App\Travels ;
use App\SpecialOffers ;


$countUser = User::all()->count() ;
$countHotel = Hotel::all()->count() ;
$countTravels = Travels::all()->count() ;
$countSpecialOffers = SpecialOffers::all()->count() ;

?>
@extends('admin.layout')
@section('content')
	<style type="text/css">
		/****************************  Index [ admin ] *************************************/
.home-stat .stat{

    background-color: #69D2E7 ;
    padding: 25px ;
    font-size: 18px ;
    color: #FFF;
    border-radius: 10px ;
    position: relative;
    overflow: hidden

}

.home-stat .stat i {
    font-size: 80px;
    top: 37px;
    position: absolute;
    left: 19px;
}

.home-stat .stat .info{
    float: right
}

.home-stat .stat a,
.home-stat .stat a:hover {
    color: #FFF ;
    text-decoration: none
}

.home-stat .stat span{

    display: block ;
    font-size: 65px
}

.home-stat .stat-members{
    background-color: #6C7A89

}
.home-stat .stat-pind{
    background-color: #95A5A6
}
.home-stat .stat-items{
    background-color: #6C7A89
}

.home-stat .stat-comment{
    background-color: #6C7A89
}

.home-stat .row > div{
    margin-bottom: 20px;
}
/****************************  Index [ admin ] *************************************/

	</style>
	<div class=" home-stat text-center">
			<h1 class="text-center"> Dashboard </h1>

			<div class="row">
				<div class="col-md-3">
					<div class="stat stat-members">
						<i class="fa fa-users"></i>
						<div class="info">
							عدد الاعـضاء
							<span><a href="{{Url('/')}}/admin/users">{{$countUser}}</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="stat stat-pind">
						<i class="fa fa-h-square"></i>
						<div class="info">
							الفنادق
							<span>
                                   <a href="{{Url('/')}}/admin/hotels">
										{{$countHotel}}
                                   </a>
                              </span>
						</div>
					</div>

				</div>
				<div class="col-md-3">
					<div class="stat stat-comment">
						<i class="fa fa-suitcase"></i>
						<div class="info">
							عدد الرحلات
							<span><a href="{{Url('/')}}/admin/travels">{{$countTravels}}</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="stat stat-pind">
						<i class="fa fa-table"></i>
						<div class="info">
							العــــــروض	
							<span><a href="{{Url('/')}}/admin/special-offers">{{$countSpecialOffers}}</a></span>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>

@stop