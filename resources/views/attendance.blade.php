@extends('layouts.admin')

@section('content')
    <h2>Attendance</h2>

    <form action="{{ route('attendanceViewByDate') }}" method="get">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="date" class="col-1">Date</label>
            <div class="col-3">
                <input class="form-control" type="date" id="date" name="date"
                       value="{{ \Carbon\Carbon::parse('sunday')->toDateString() }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br/>
    <h2>Attendance Summary</h2>
    <table class="table" style="width:70%">
        <tr>
            <td>Date</td>
            <td>Male</td>
            <td>Female</td>
            <td>Total</td>
        </tr>
    @foreach($summary as $key => $value)
        <tr>
            <td>{{ $key }}</td>
            <td>{{ $value['M'] }}</td>
            <td>{{ $value['F'] }}</td>
            <td>{{ $value['total'] }}</td>
        </tr>
    @endforeach
    </table>
@endsection
