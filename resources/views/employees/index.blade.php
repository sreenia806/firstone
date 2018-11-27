@extends('layouts.layout')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Employee List</h3>
        </div>
        <div class="col-md-3 text-right">
            <a type="button" class="btn btn-success" href="{{ route('employees.create') }}">Create New Employee</a>
        </div>
    </div>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col">Employee No</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Rank</th>
            <th scope="col">Parent Unit No</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $employee)
        <tr class="table-active">
            <td>{{ $employee->employee_number }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->parent_unit_number }}</td>
            <td>

                <select class="form-control" name="actions" id="actions">
                    <option value="">Select Action</option>
                    <option value="{{ route('employees.show', ['id' => $employee->id]) }}">View</option>
                    <option value="{{ route('employees.edit', ['id' => $employee->id]) }}">Edit</option>
                    <option value="{{ route('rewards.index', ['employeeId' => $employee->id]) }}">Add Rewards</option>
                    <option value="{{ route('leaves.index', ['employeeId' => $employee->id]) }}">Add Leaves</option>>

                </select>

            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection

@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/employees/employees.js') }}"></script>
@endsection