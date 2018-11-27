@extends('layouts.layout')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Employee Punishments</h3>
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
                <button class="btn btn-success" id="add-promotion" data-toggle="modal"
                        data-target="#myModal">Add Promotion
                </button>
            </div>
            <div class="col-md-6">
                <label><b>First Name:</b></label> <span id="first_name"></span>
            </div>
            <div class="col-md-6">
                <label><b>Last Name:</b></label> <span id="last_name"></span>
            </div>

        </div>

        <div class="form-group row" id="promotion-list"></div>


        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Promotion</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ route('promotions.store') }}" method="POST">
                            {{ csrf_field() }}

                            <input type="hidden" id="employee_id_hidden" name="employee_id" value="">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="promotion_type">Promotion
                                        Type</label>
                                    <select class="form-control" name="promotion_type" required>
                                        <option value="">Select Promotion Type</option>
                                        <option value="Regular">Regular</option>
                                        <option value="O/S">O/S</option>
                                        <option value="Accelerated">Accelerated</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="designation_id">Designation
                                    Number</label>

                                    <select name="designation_id" id="designation_id" class="form-control">
                                        <option value="">Select Designation</option>

                                        @foreach($designations as $designation)

                                            <option value="{{ $designation->id }}">{{ $designation->name }}
                                            </option>
                                        @endforeach

                                    </select>
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
                                    <label class="label-control" for="order_date">Order Date</label>
                                    <input class="datePicker form-control" type="text" name="order_date"
                                           id="order_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="from_date">From Date</label>
                                    <input class="datePicker form-control" type="text" name="from_date"
                                           id="from_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="to_date">To Date</label>
                                    <input class="datePicker form-control" type="text" name="to_date"
                                           id="to_date">
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
    <script type="text/template" id="promotion-list-template">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Promotion Type</th>
                <th>Rank</th>
                <th>Ref No</th>
                <th>Order_date</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Action</th>
            </tr>
            {{#promotions}}
            <tr>
                <td>{{ promotion_type }}</td>
                <th>{{ designation_name }}</th>
                <td>{{ reference_number }}</td>
                <td>{{ order_date }}</td>
                <td>{{ from_date }}</td>
                <td>{{ to_date }}</td>
                <td>
                    <button class="btn btn-sm btn-success btn-block edit-promotion"
                            data-id="{{ id }}"
                            data-promotion_type="{{promotion_type}}"
                            data-designation_id="{{designation_id}}"
                            data-designation_name="{{ designation_name }}"
                            data-reference_number="{{ reference_number }}"
                            data-order_date="{{ order_date }}"
                            data-from_date="{{ from_date }}"
                            data-to_date="{{to_date}}">
                        Edit
                    </button>
                </td>
            </tr>
            {{/promotions}}
            </tbody>
        </table>
    </script>

    <script type="text/template" id="edit-promotion-template">
        <div class="modal" id="edit-promotion">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Promotion</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ edit_path }}" method="POST">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="promotion_type">Promotion
                                        Type</label>
                                    <select class="form-control" name="promotion_type_edit" name="promotion_type"
                                            required>
                                        <option value="">Select Promotion Type</option>
                                        <option value="Regular" {{ showSelected "Regular" promotion_type }}>Regular</option>
                                        <option value="O/S" {{ showSelected "O/S" promotion_type }}>O/S</option>
                                        <option value="Accelerated" {{ showSelected "Accelerated" promotion_type }}>Accelerated</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="designation_id">Designation
                                        Number</label>
                                    <<select class="form-control" name="designation_id_edit" name="designation_id"
                                             required>
                                        <option value="">Select Promotion Type</option>

                                        {{# designations }}
                                        <option value="{{ id }}" {{ selected }}>{{ name }}</option>
                                        {{/ designations }}
                                    </select>
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
                                    <label class="label-control" for="order_date">Order Date</label>
                                    <input class="form-control datePicker" type="text" name="order_date"
                                           id="order_date_edit" value="{{ order_date }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="from_date">From Date</label>
                                    <input class="form-control datePicker" type="text" name="from_date"
                                           id="from_date_edit" value="{{ from_date }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="to_date">To Date</label>
                                    <input class="form-control datePicker" type="text" name="from_date"
                                           id="to_date_edit" value="{{ to_date }}">
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
        var editPath = '{{ url('/') . '/promotions/updatePromotion/' }}';

        var designations = [];

        @foreach($designations as $designation)
            designations.push({
                id: {{ $designation->id }},
                name: '{{ $designation->name }}'
            });
        @endforeach

        console.log(designations)
    </script>

    <script type="text/javascript" src="{{ asset('js/app/promotions.js') }}"></script>
@endsection