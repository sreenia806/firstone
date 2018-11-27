@extends('layouts.layout')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Employee Outside Trainings</h3>
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
                <button class="btn btn-success" id="add-outside_training" data-toggle="modal"
                        data-target="#myModal">Add Outside Training
                </button>
            </div>
            <div class="col-md-6">
                <label><b>First Name:</b></label> <span id="first_name"></span>
            </div>
            <div class="col-md-6">
                <label><b>Last Name:</b></label> <span id="last_name"></span>
            </div>

        </div>

        <div class="form-group row" id="outside_training-list"></div>


        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Outside Training</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ route('outside_trainings.store') }}" method="POST">
                            {{ csrf_field() }}

                            <input type="hidden" id="employee_id_hidden" name="employee_id" value="">

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
                                    <label class="label-control" for="order_date">Order Date</label>
                                    <input class="datePicker form-control" type="text" name="order_date"
                                           id="order_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="training_details">Training
                                        details</label>
                                    <input class="form-control" type="text" name="training_details"
                                           id="training_details">
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
    <script type="text/template" id="outside_training-list-template">
        <table class="table table-bordered">
            <tbody>
            <tr>

                <th>Ref No</th>
                <th>Date</th>
                <th>Training Details</th>
                <th>Action</th>
            </tr>
            {{#outside_trainings}}
            <tr>
                <td>{{ reference_number }}</td>
                <td>{{ order_date }}</td>
                <td>{{ training_details }}</td>
                <td>
                    <button class="btn btn-sm btn-success btn-block edit-outside_training"
                            data-id="{{ id }}"
                            data-reference_number="{{ reference_number }}"
                            data-order_date="{{ order_date }}"
                            data-training_details="{{ training_details }}">
                        Edit
                    </button>
                </td>
            </tr>
            {{/outside_trainings}}
            </tbody>
        </table>
    </script>

    <script type="text/template" id="edit-outside_training-template">
        <div class="modal" id="edit-outside_training">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Outside Training</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ edit_path }}" method="POST">


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
                                    <label class="label-control" for="order_date">Order Date</label>
                                    <input class="form-control datePicker" type="text" name="order_date"
                                           id="order_date_edit" value="{{ order_date }}">
                                </div>-
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="training_details">Training Details
                                    </label>
                                    <input class="form-control" type="text" name="training_details"
                                           id="training_details_edit" value="{{ training_details }}">
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
        var editPath = '{{ url('/') . '/outside_trainings/updateOutside_training/' }}';
    </script>

    <script type="text/javascript" src="{{ asset('js/app/outside_trainings.js') }}"></script>
@endsection