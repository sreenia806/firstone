@extends('layouts.layout')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Employee List</h3>
        </div>
    </div>

            <div class="row match-height">
        <div class="col-sm-3">
                <img src="{{ asset('images/avatars') . '/' . $employee->photo }}" alt="{{ $employee->first_name }}" style="height: 100px; border-radius: 50%;">
        </div>
    </div>


    <table class="table table-hover table-bordered">
        <tbody>

        <tr class="table-active">
            <th style="width: 33%">First Name</th>
            <td>{{ $employee->first_name }}</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Last Name</th>
            <td>{{ $employee->last_name }}</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Employee Number</th>
            <td>{{ $employee->employee_number }}</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Pao Id Number</th>
            <td>{{ $employee->pao_id_number }}</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Rank</th>
            <td>{{ $employee->rank->name }}</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Date Of Appointment</th>
            <td>{{ $employee->date_of_appointment }}</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Date Of Joining</th>
            <td>{{ $employee->date_of_joining }}</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Category</th>
            <td>{{ $employee->category }}</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Gh Unit Id</th>
            <td>@if ($employee->gh_unit) {{ $employee->gh_unit->name }} @endif</td>
        </tr>
        <tr class="table-active">
            <th style="width: 33%">Blood Group</th>
            <td>{{ $employee->blood_group }}</td>
        </tr>

        </tbody>
    </table>

    {{--<table class="table table-hover table-bordered">--}}
        {{--<tbody>--}}

        {{--@foreach($fieldsToShow as $field)--}}
            {{--<tr class="table-active">--}}
                {{--<th style="width: 33%">{{ ucwords(str_replace('_', " ", $field)) }}</th>--}}
                {{--<td>{{ $employee->$field }}</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}

        {{--</tbody>--}}
    {{--</table>--}}
@endsection