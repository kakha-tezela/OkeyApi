@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">

                        
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">FirstName</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" " required autofocus>
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('LastName') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Lastname</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" " required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>
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
