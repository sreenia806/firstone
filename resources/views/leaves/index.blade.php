@extends('layouts.layout')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Employee Leaves</h3>
        </div>

    </div>

    <div class="form-body">
        <div class="form-group row">

            <label class="col-md-3 label-control" for="employee_id">Employee
                Number</label>
            <div class="col-md-6">
                <select name="employee_id" id="employee_id" class="form-control">
                    <option value="">Select employee</option>

                    @foreach($data as $employee)

                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}
                            ({{ $employee->employee_number }})
                        </option>
                    @endforeach

                </select>
            </div>

        </div>
        <div class="form-group row" style="display: none" id="employee-block">
            <div class="col-md-12 text-right">
                <button class="btn btn-success" id="add-leave" data-toggle="modal"
                        data-target="#myModal">Add Leave
                </button>
            </div>
            <div class="col-md-6">
                <label><b>First Name:</b></label> <span id="first_name"></span>
            </div>
            <div class="col-md-6">
                <label><b>Last Name:</b></label> <span id="last_name"></span>
            </div>

        </div>

        <div class="form-group row" id="leave-list"></div>


        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Leave</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ route('leaves.store') }}" method="POST">
                            {{ csrf_field() }}

                            <input type="hidden" id="employee_id_hidden" name="employee_id" value="">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="leave_type">Leave
                                        Type</label>
                                    <select class="form-control" name="leave_type" required>
                                        <option value="">Select Leave Type</option>
                                        <option value="EL">Earned Leave</option>
                                        <option value="ML">Medical Leave</option>
                                        <option value="HPL">Half Pay Leave</option>
                                        <option value="MAL">Maternity Leave</option>
                                        <option value="PL">Paternity Leave</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="no_of_days">Number
                                        of days</label>
                                    <input class="form-control" type="text" name="no_of_days"
                                           id="no_of_days">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="reference_number">Reference
                                        Number</label>
                                    <input class="form-control" type="text" name="reference_number"
                                           id="reference_number">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="sanction_date">Sanction Date</label>
                                    <input class="datePicker form-control" type="text" name="sanction_date"
                                           id="sanction_date">
                                </div>
                            </div>


                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div>



    <script type="text/template">

    </script>


@endsection

@verbatim
    <script type="text/template" id="leave-list-template">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Leave Type</th>
                <th>No_of_days</th>
                <th>Ref No</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            {{#leaves}}
            <tr>
                <td>{{ leave_type }}</td>
                <td>{{ no_of_days }}</td>
                <td>{{ reference_number }}</td>
                <td>{{ sanction_date }}</td>
                <td>
                    <button class="btn btn-sm btn-success btn-block edit-leave"
                            data-id="{{ id }}"
                            data-leave_type="{{leave_type}}"
                            data-no_of_days="{{ no_of_days }}"
                            data-reference_number="{{ reference_number }}"
                            data-sanction_date="{{ sanction_date }}">
                        Edit
                    </button>
                </td>
            </tr>
            {{/leaves}}
            </tbody>
        </table>
    </script>

    <script type="text/template" id="edit-leave-template">
        <div class="modal" id="edit-leave">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Leave</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ edit_path }}" method="POST">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="leave_type">Leave
                                        Type</label>
                                    <select class="form-control" name="leave_type_edit" name="leave_type"
                                            required>
                                        <option value="">Select Leave Type</option>
                                        <option value="EL" {{ showSelected "EL" leave_type }}>Earned Leave</option>
                                        <option value="ML" {{ showSelected "ML" leave_type }}>Medical Leave</option>
                                        <option value="HPL" {{ showSelected "HPL" leave_type }}>Half Pay Leave</option>
                                        <option value="MAL" {{ showSelected "MAL" leave_type }}>Maternity Leave</option>
                                        <option value="PL" {{ showSelected "PL" leave_type }}>Paternity Leave</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="no_of_days">No_of_days
                                        </label>
                                    <input class="form-control" type="text" name="no_of_days"
                                           id="no_of_days_edit" value="{{ no_of_days }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="reference_number">Reference
                                        Number</label>
                                    <input class="form-control" type="text" name="reference_number"
                                           id="reference_number_edit" value="{{ reference_number }}">
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="sanction_date">Sanction Date</label>
                                    <input class="form-control datePicker" type="text" name="sanction_date"
                                           id="sanction_date_edit" value="{{ sanction_date }}">
                                </div>
                            </div>


                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </script>
@endverbatim


@section('javascripts')
    <script type="text/javascript">
        var baseUrl = '{{ url('/') }}';
        var editPath = '{{ url('/') . '/leaves/updateLeave/' }}';
    </script>

    <script type="text/javascript" src="{{ asset('js/app/leaves.js') }}"></script>
@endsection