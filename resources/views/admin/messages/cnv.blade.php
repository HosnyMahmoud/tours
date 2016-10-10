@extends('admin.layout')
@section('title', @$user->name)
@section('content')
<style type="text/css">
/* Start Messages [ plugin & my Style ]  */
* {
  box-sizing: border-box;
}

body {
  background-color: #edeff2;
  font-family: "Calibri", "Roboto", sans-serif;
}

.msgs-wrap{ height: 300px;
    overflow-y: auto;
    overflow-x: hidden;
    width: 122%;
    margin-right: -50px;
    zoom: -3;
}
.messages {
  position: relative;
  list-style: none;
  padding: 20px 10px 0 10px;
  margin: 0;
  height: 347px;
 /* overflow: scroll; */
}
.messages .message {
  clear: both;
  overflow: hidden;
  margin-bottom: 20px;
  transition: all 0.5s linear;
  opacity: 0;
}
.messages .message.left .avatar {
  background-color: #f5886e;
  float: left;
}
.messages .message.left .text_wrapper {
  background-color: #ffe6cb;
  margin-left: 20px;
  height :55px
}
.messages .message.left .text_wrapper::after, .messages .message.left .text_wrapper::before {
  right: 100%;
  border-right-color: #ffe6cb;
}
.messages .message.left .text {
  color: #c48843;
}
.messages .message.right .avatar {
  background-color: #fdbf68;
  float: right;
}
.messages .message.right .text_wrapper {
  background-color: #c7eafc;
  margin-right: 20px;
  float: right;
  height:55px ;
}
.messages .message.right .text_wrapper::after, .messages .message.right .text_wrapper::before {
  left: 100%;
  border-left-color: #c7eafc;
}
.messages .message.right .text {
  color: #45829b;
}
.messages .message.appeared {
  opacity: 1;
  
}
.messages .message .avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: inline-block;
}
.messages .message .text_wrapper {
  display: inline-block;
  padding: 20px;
  border-radius: 6px;
  width: calc(100% - 85px);
  min-width: 100px;
  position: relative;
}
.messages .message .text_wrapper::after, .messages .message .text_wrapper:before {
  top: 18px;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}
.messages .message .text_wrapper::after {
  border-width: 13px;
  margin-top: 0px;
}
.messages .message .text_wrapper::before {
  border-width: 15px;
  margin-top: -2px;
}
.messages .message .text_wrapper .text {
  font-size: 18px;
  font-weight: 300;
}
.msg-left{
  float: left 
}
/*  Me Style  */
.messages .msgs-wrap{
  
  min-height:250px;
  max-height:500px;
  overflow-y:auto;
  overflow-x:hidden;
}
.messages .new-msg {
  
  padding-top:10px;
  min-height:50px;
}
.messages .new-msg #message {
  height: 34px;
  width: 941px;
  top: 0px;
}

#send {
  margin-top: 7px 
}
</style>
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-body col-md-11">
			<div class="col-lg-12">
				<p style="padding:10px;">محادثه مع العضو : {{@$user->name}}</p>
				<hr />
				<div class="messages">
					<div class="msgs-wrap">
						<ul class="messages form-gourp">
							@if($messages->count() > 0)
								@foreach($messages as $msg)
									@if($msg->sender == 0)
										<li class="message right appeared">
											<div class="avatar"></div>
											<div class="text_wrapper">
												<div class="message right appeared">{{$msg->msg}}</div>
											</div>
										</li>
									@elseif ($msg->sender == 1)
										<li class="message left appeared ">
											<div class="avatar"></div>
											<div class="text_wrapper">
												<div class="message left appeared msg-left">{{$msg->msg}}
												</div>
											</div>
										</li>
									@endif
								@endforeach
							@endif
						</ul>
					</div>

					
						{!! Form::open() !!}
						<div class="new-msg" style="">
							<div class="input-group">
								<textarea id="message" class="form-control" placeholder="اكتب رسالتك هنا" style="" name="msg" cols="50" rows="10"></textarea><br /><br />
								<button class="btn btn-success" id="send" type="submit"><i class="fa fa-send"></i>إرسال</button>
							</div>
						</div>
						{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@section('inlineJS')
<script type="text/javascript">

// To scroll to last msg in chat after relode ( after send and redirect back )  
$('.msgs-wrap').animate({ scrollTop: $('.msgs-wrap').prop("scrollHeight")},1000);
	
	$('#message').keydown(function (event) {
		var msg = $('#message').val();
		if(msg.trim() !== ''){
		    if(event.shiftKey && event.keyCode == 13 ) {
	          
	        }else if(event.keyCode == 13){
	        	event.preventDefault();
	        	$('#message').val(msg.trim());
	        	$('#message').attr( 'disabled' );
	            $('form').submit();
	        }
		}
    });

    $('#send').click(function(event) {
    	var msg = $('#message').val();
    	$('#message').val(msg.trim());
		if(msg.trim() == ''){
           event.preventDefault();
		}
    });

    $(".msgs-wrap").niceScroll({
    	'cursorcolor' : '#FFF' ,
    	'cursorborder' : 'rgb(241, 243, 250)' ,
    });

/* End Messages page */
</script>
@endsection
@endsection
@stop