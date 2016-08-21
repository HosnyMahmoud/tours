
						<div class="form-group">
							<label class="col-md-4 control-label">الإسم</label>
							<div class="col-md-6">
								{!! Form::text('name',null,['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">البريد الإلكترونى</label>
							<div class="col-md-6">
								{!! Form::email('email',null,['class'=>'form-control'])!!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">كلمه المرور</label>
							<div class="col-md-6">
								{!! Form::password('password',['class'=>'form-control'])!!}
								@if(@$help)
								{!!$help!!}
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">الصلاحيات</label>
							<div class="col-md-6 col-md-offset-4">
								@if($type == 'add')							
									<input type="checkbox" name="pre[]" value="settings">
									{!! Form::label('settings',' الأعدادات ') !!}
									<br>

									<input type="checkbox" name="pre[]" value="users">
									{!! Form::label('users',' الأعضاء ') !!}		
									<br>
									
									<input type="checkbox" name="pre[]" value="admins">
									{!! Form::label('admins',' المديرين ') !!}		
									<br>
								@else
									<input type="checkbox" {{(in_array('settings',$pre))?"checked" : ""}} name="pre[]" value="settings">
									{!! Form::label('settings',' الأعدادات ') !!}
									<br>

									<input type="checkbox" {{(in_array('users',$pre))?"checked" : ""}} name="pre[]" value="users">
									{!! Form::label('users',' الأعضاء ') !!}		
									<br>
									
									<input type="checkbox" {{(in_array('admins',$pre))?"checked" : ""}} name="pre[]" value="admins">
									{!! Form::label('admins',' المديرين ') !!}		
								

								@endif	
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									{!! $text !!}
								</button>
							</div>
						</div>
					</form>