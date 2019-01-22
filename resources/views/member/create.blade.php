@extends('layouts.admin')

@section('content')
    <h2>Create New Member</h2>

    <div class="form-group row">
        <div class="col">
            <a href="">Create New Member</a>
        </div>
    </div>

    <form action="{{ route("storeNewMember") }}" method="POST">
        <div class="form-group row">
            <label for='first_name'>First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="first_name" name="first_name">
            </div>
        </div>
        <div class="form-group row">
            <label for='middle_name'>Middle Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="middle_name" name="middle_name">
            </div>
        </div>
        <div class="form-group row">
            <label for='last_name'>Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="last_name" name="last_name">
            </div>
        </div>
        <div class="form-group row">
            <label for='nick_name'>Nick Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="nick_name" name="nick_name">
            </div>
        </div>
        <div class="form-group row">
            <label for='email'>Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control-plaintext" id="nick_name" name="nick_name">
            </div>
        </div>
        <div class="form-group row">
            <label for='bod'>Birthday</label>
            <div class="col-sm-10">
                <input type="date" class="form-control-plaintext" id="bod" name="bod">
            </div>
        </div>
        <div class="form-group row">
            <label for='birth_place'>Birth Place</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="birth_place" name="birth_place">
            </div>
        </div>
        <div class="form-group row">
            <label for='gender'>Gender</label>
            <div class="col-sm-10">
                <select id="gender" class="form-control">
                    <option value="M" selected>Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for='marital_status'>Marital Status</label>
            <div class="col-sm-10">
                <select id="marital_status" class="form-control">
                    <option value="single" selected>Single</option>
                    <option value="married">Married</option>
                    <option value="separated">Separated</option>
                    <option value="divorced">Divorced</option>
                    <option value="widowed">Widowed</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for='address'>Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="address" name="address">
            </div>
        </div>
        <div class="form-group row">
            <label for='address2'>Address 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="address2" name="address2">
            </div>
        </div>
        <div class="form-group row">
            <label for='city'>City</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="city" name="city" value="Tampa">
            </div>
        </div>
        <div class="form-group row">
            <label for='state'>State</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="state" name="state" value="Florida">
            </div>
        </div>
        <div class="form-group row">
            <label for='country'>Country</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="country" name="country" value="United States">
            </div>
        </div>
        <div class="form-group row">
            <label for='zip_code'>Zip Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="zip_code" name="zip_code">
            </div>
        </div>
        <div class="form-group row">
            <label for='phone'>Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="phone" name="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for='home_phone'>Home Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="home_phone" name="home_phone">
            </div>
        </div>
    </form>
@endsection
