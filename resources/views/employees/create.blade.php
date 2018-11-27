@extends('layouts.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Create New Employee</h3>
        </div>
    </div>

    <form class="form form-horizontal" action="{{ route('employees.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-body">
            <h4 class="form-section"><i class="la la-eye"></i> Basic Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="first_name">Fist
                            Name</label>
                        <div class="col-md-9">
                            <input type="text" id="first_name"
                                   class="form-control border-primary"
                                   name="first_name">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="last_name">Last
                            Name</label>
                        <div class="col-md-9">
                            <input type="text" id="last_name"
                                   class="form-control border-primary"
                                   name="last_name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-3 label-control"
                               for="employee_number">Employee No</label>
                        <div class="col-md-9">
                            <input type="text" id="employee_number"
                                   class="form-control border-primary"
                                   name="employee_number">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="parent_unit_number">Parent Unit No</label>
                        <div class="col-md-9">
                            <input type="text" id="parent_unit_number"
                                   class="form-control border-primary"
                                   name="parent_unit_number">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-3 label-control"
                               for="date_of_birth">Date of Birth</label>
                        <div class="col-md-9">
                            <input type="text" id="date_of_birth"
                                   class="form-control border-primary hasDatepicker"
                                   name="date_of_birth">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="date_of_appointment">Date of Appointment</label>
                        <div class="col-md-9">
                            <input type="text" id="date_of_appointment"
                                   class="form-control border-primary dp-month-year hasDatepicker"
                                   name="date_of_appointment">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-actions right">
            <button type="button" class="btn btn-warning mr-1">
                <i class="ft-x"></i> Cancel
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> Save
            </button>
        </div>



    </form>

@endsection