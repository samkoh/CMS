@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" value="{{ old('lastmame') }}">
                            </div>
                        </div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                {{--<input type="text" class="form-control" name="nameTitlePrefix">--}}
                                <select class="form-control" name="nameTitlePrefix">
                                    <option value="" disabled="disabled" selected="selected">Please select </option>
                                    <option value="Sir">Sir.</option>
                                    <option value="Mr">Mr.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Miss">Miss.</option>
                                    <option value="Dr">Dr.</option>
                                    <option value="Professor">Prof.</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                {{--<input type="dropdownlist" class="form-control" name="gender">--}}
                                <select class="form-control" name="gender">
                                    <option value="" disabled="disabled" selected="selected">Please select </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Date of Birth</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="dateOfBirth">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">National Identity No</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nationalIdentityNo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Country</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Contact No</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="contactNo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Fax No</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="faxNo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Graduated From</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="education">
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>



				</div>
			</div>
		</div>
	</div>
</div>
@endsection
