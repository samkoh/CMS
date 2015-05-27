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
                        <input type="hidden" name="conference_id" value="{{$conferenceId}}">

                        @if($conferenceId == null)
                            {{--0 means register without invitation request--}}
                            <input type="hidden" name="register_upon_invitation" value="0">
                        @else
                            {{--1 means register invitation request--}}
                            <input type="hidden" name="register_upon_invitation" value="1">
                        @endif

						<div class="form-group">
                            <label class="col-md-4 control-label">First Name: <font color="red">*</font></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Last Name:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                            </div>
                        </div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address: <font color="red">*</font></label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password: <font color="red">*</font></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password:</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Title:</label>
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
                            <label class="col-md-4 control-label">Gender: <font color="red">*</font></label>
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
                            <label class="col-md-4 control-label">Date of Birth: <font color="red">*</font></label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="dateOfBirth">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">National Identity No:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nationalIdentityNo">
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">Country</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" class="form-control" name="country">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Address Line 1: <font color="red">*</font></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="addressLine1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Address Line 2:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="addressLine2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Address Line 3:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="addressLine3">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">City:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">State:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="state">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">PostCode:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="postalCode">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Country:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="country">
                                    <option value="" disabled="disabled" selected="selected">Please select </option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="India">India</option>
                                    <option value="China">China</option>
                                    <option value="Australia">Australia</option>
                                    <option value="United State">United State</option>
                                    <option value="Russia">Russia</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Germany">Germany</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="New Zealand">New Zealand</option>
                                </select>
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">Country:</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="dropdownlist" class="form-control" name="gender">--}}
                                {{--<select class="form-control" name="gender">--}}
                                    {{--@foreach ($country as $id => $name)--}}
                                        {{--<option value="{{ $id }}">{{ $name }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}



                        <div class="form-group">
                            <label class="col-md-4 control-label">Contact No: <font color="red">*</font></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="contactNo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Fax No:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="faxNo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Graduated From:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="education">
                            </div>
                        </div>

                        @if($conferenceId == null)
                            <div class="form-group">
                                <label class="col-md-4 control-label">Register as:</label>

                                <div class="col-md-6">
                                    <input checked="checked" name="user_role" type="radio" value="6"> Author<br>
                                    <input name="user_role" type="radio" value="7"> Participant
                                </div>
                            </div>
                        @endif


                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">User Role:</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<select class="form-control" name="user_role">--}}
                                    {{--<option value="" disabled="disabled" selected="selected">Please select </option>--}}
                                    {{--<option value="Conference Chair">Conference Chair</option>--}}
                                    {{--<option value="Conference Manager">Conference Manager</option>--}}
                                    {{--<option value="Technical Committee">Technical Committee</option>--}}
                                    {{--<option value="Program Committee">Program Committee</option>--}}
                                    {{--<option value="Author">Author</option>--}}
                                    {{--<option value="Reviewer">Reviewer</option>--}}
                                    {{--<option value="Participant">Participant</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

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
