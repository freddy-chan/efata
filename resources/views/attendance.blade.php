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
@endsection
