@extends('layouts.layout')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Employee Increments</h3>
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
                <button class="btn btn-success" id="add-increment" data-toggle="modal"
                        data-target="#myModal">Add Increment
                </button>
            </div>
            <div class="col-md-6">
                <label><b>First Name:</b></label> <span id="first_name"></span>
            </div>
            <div class="col-md-6">
                <label><b>Last Name:</b></label> <span id="last_name"></span>
            </div>

        </div>

        <div class="form-group row" id="increment-list"></div>


        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Increment</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ route('increments.store') }}" method="POST">
                            {{ csrf_field() }}

                            <input type="hidden" id="employee_id_hidden" name="employee_id" value="">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="increment_type">Increment
                                        Type</label>
                                    <select class="form-control" name="increment_type" required>
                                        <option value="">Select Increment Type</option>
                                        <option value="Promotion">Promotion Increment</option>
                                        <option value="6 Years">6 Years Grade Increment</option>
                                        <option value="12 Years">12 Years Grade Increment</option>
                                        <option value="18 Years">18 Years Grade Increment</option>
                                        <option value="24 Years">24 Years Grade Increment</option>
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
    <script type="text/template" id="increment-list-template">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Increment Type</th>
                <th>Ref No</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            {{#increments}}
            <tr>
                <td>{{ increment_type }}</td>
                <td>{{ reference_number }}</td>
                <td>{{ sanction_date }}</td>
                <td>
                    <button class="btn btn-sm btn-success btn-block edit-increment"
                            data-id="{{ id }}"
                            data-reference_number="{{ reference_number }}"
                            data-increment_type="{{ increment_type }}"
                            data-sanction_date="{{ sanction_date }}">
                        Edit
                    </button>
                </td>
            </tr>
            {{/increments}}
            </tbody>
        </table>
    </script>

    <script type="text/template" id="edit-increment-template">
        <div class="modal" id="edit-increment">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Increment</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ edit_path }}" method="POST">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="increment_type">Increment
                                        Type</label>
                                    <select class="form-control" name="increment_type_edit" name="increment_type"
                                            required>
                                        <option value="">Select Increment Type</option>
                                        <option value="Promotion" {{ showSelected "Promotion" increment_type }}>Promotion Increment</option>
                                        <option value="6 Years" {{ showSelected "6 Years" increment_type }}>6 Years Grade Increment</option>
                                        <option value="12 Years" {{ showSelected "12 Years" increment_type }}>12 Years Grade Increment</option>
                                        <option value="18 Years" {{ showSelected "18 Years" increment_type }}>18 Years Grade Increment</option>
                                        <option value="24 Years" {{ showSelected "24 Years" increment_type }}>24 Years Grade Increment</option>
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
        var editPath = '{{ url('/') . '/increments/updateIncrement/' }}';
    </script>

    <script type="text/javascript" src="{{ asset('js/app/increments.js') }}"></script>
@endsection