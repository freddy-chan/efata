@extends('layouts.admin')

@section('content')
    <h2>Create New Member</h2>
    <br/>
    <form action="{{ route("storeNewMember") }}" method="POST">
        <div class="form-group row">
            <label for='first_name' class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for='middle_name' class="col-sm-2 col-form-label">Middle Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="middle_name" name="middle_name">
            </div>
        </div>
        <div class="form-group row">
            <label for='last_name' class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for='nick_name' class="col-sm-2 col-form-label">Nick Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nick_name" name="nick_name">
            </div>
        </div>
        <div class="form-group row">
            <label for='email' class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="nick_name" name="nick_name">
            </div>
        </div>
        <div class="form-group row">
            <label for='bod' class="col-sm-2 col-form-label">Birthday</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="bod" name="bod">
            </div>
        </div>
        <div class="form-group row">
            <label for='birth_place' class="col-sm-2 col-form-label">Birth Place</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="birth_place" name="birth_place">
            </div>
        </div>
        <div class="form-group row">
            <label for='gender' class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select id="gender" class="form-control">
                    <option value="M" selected>Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for='marital_status' class="col-sm-2 col-form-label">Marital Status</label>
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
            <label for='address' class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address">
            </div>
        </div>
        <div class="form-group row">
            <label for='address2' class="col-sm-2 col-form-label">Address 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address2" name="address2">
            </div>
        </div>
        <div class="form-group row">
            <label for='city' class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="city" name="city" value="Tampa">
            </div>
        </div>
        <div class="form-group row">
            <label for='state' class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="state" name="state" value="Florida">
            </div>
        </div>
        <div class="form-group row">
            <label for='country' class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="country" name="country" value="United States">
            </div>
        </div>
        <div class="form-group row">
            <label for='zip_code' class="col-sm-2 col-form-label">Zip Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="zip_code" name="zip_code">
            </div>
        </div>
        <div class="form-group row">
            <label for='phone' class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for='home_phone' class="col-sm-2 col-form-label">Home Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="home_phone" name="home_phone">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
