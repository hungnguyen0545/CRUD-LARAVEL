@extends('layouts.app')
@section('style')
<style>
.alert-changepwd{
    text-align: center;
    text-transform: uppercase;
    font-size: 20px;
    font-weight: 800;
    color: cadetblue;
    border: 3px solid rgba(0,0,0,0.5);
    margin: 11px 342px;
    box-shadow: 6px 5px rgba(0,0,0,0.1);
}
</style>
@endsection
@section('content')
@if(session()->get('alert'))
<div class="alert alert-changepwd">
    {{ session()->get('alert')}}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laravel - Change Password </div>
   
                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                         @csrf 
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
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
@section('script')
<script src="{{ asset('js/check.js')}}"></script>
@endsection