@extends('layouts.layout')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Employee Rewards</h3>
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
                <button class="btn btn-success" id="add-reward" data-toggle="modal"
                        data-target="#myModal">Add Reward
                </button>
            </div>
            <div class="col-md-6">
                <label><b>First Name:</b></label> <span id="first_name"></span>
            </div>
            <div class="col-md-6">
                <label><b>Last Name:</b></label> <span id="last_name"></span>
            </div>

        </div>

        <div class="form-group row" id="reward-list">

        </div>


        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Reward</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ route('rewards.store') }}" method="POST">
                            {{ csrf_field() }}

                            <input type="hidden" id="employee_id_hidden" name="employee_id" value="">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="reward_type">Reward
                                        Type</label>
                                    <select class="form-control" name="reward_type" required>
                                        <option value="">Select Reward Type</option>
                                        <option value="CASH">Cash Reward</option>
                                        <option value="GSE">Good Service Entry</option>
                                        <option value="GSE">Appreciation</option>
                                        <option value="COMM">Commendation</option>
                                        <option value="SP">Seva Pathakam</option>
                                        <option value="KSP">Katina Seva Pathakam</option>
                                        <option value="MSP">Mahonnata Seva Pathakam</option>
                                        <option value="USP">Uttama Seva Pathakam</option>
                                        <option value="MMSP">Mukyamantri Showrya Pathakam</option>
                                        <option value="PMG">Police Medal for Gallantry</option>
                                        <option value="PPMG">President Police Medal for Gallantry</option>
                                        <option value="ASP">Antrik Suraksha Seva Padak</option>
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
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="reward_details">Reward
                                        details</label>
                                    <input class="form-control" type="text" name="reward_details"
                                           id="reward_details">
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


@endsection

@verbatim
    <script type="text/template" id="reward-list-template">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Reward Type</th>
                <th>Ref No</th>
                <th>Date</th>
                <th>Reward Details</th>
                <th>Action</th>
            </tr>
            {{#rewards}}
            <tr>
                <td>{{ reward_type }}</td>
                <td>{{ reference_number }}</td>
                <td>{{ sanction_date }}</td>
                <td>{{ reward_details }}</td>
                <td>
                    <button class="btn btn-sm btn-success btn-block edit-reward"
                            data-id="{{ id }}"
                            data-reward_type="{{reward_type}}"
                            data-reference_number="{{ reference_number }}"
                            data-sanction_date="{{ sanction_date }}"
                            data-reward_details="{{ reward_details }}">
                        Edit
                    </button>
                </td>
            </tr>
            {{/rewards}}
            </tbody>
        </table>
    </script>

    <script type="text/template" id="edit-reward-template">
        <div class="modal" id="edit-reward">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="content-header-title mb-0 d-inline-block">Add Reward</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form class="form form-horizontal" action="{{ edit_path }}" method="POST">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="reward_type">Reward
                                        Type</label>
                                    <select class="form-control" id="reward_type_edit" name="reward_type"
                                            required>
                                        <option value="">Select Reward Type</option>
                                        <option value="CASH" {{ showSelected "CASH" reward_type }}>Cash Reward</option>
                                        <option value="GSE" {{ showSelected "GSE" reward_type }}>Good Service Entry</option>
                                        <option value="COMM" {{ showSelected "COMM" reward_type }}>Commendation</option>
                                        <option value="APR" {{ showSelected "APR" reward_type }}>Appreciation</option>
                                        <option value="SP" {{ showSelected "SP" reward_type }}>Seva Pathakam</option>
                                        <option value="KSP" {{ showSelected "KSP" reward_type }}>Katina Seva Pathakam</option>
                                        <option value="MSP" {{ showSelected "MSP" reward_type }}>Mahonnata Seva Pathakam</option>
                                        <option value="USP" {{ showSelected "USP" reward_type }}>Uttama Seva Pathakam</option>
                                        <option value="MMSP" {{ showSelected "MMSP" reward_type }}>Mukyamantri Showrya Pathakam</option>
                                        <option value="PMG" {{ showSelected "PMG" reward_type }}>Police Medal for Gallantry</option>
                                        <option value="PPMG" {{ showSelected "PPMG" reward_type }}>President Police Medal for Gallantry</option>
                                        <option value="ASP" {{ showSelected "ASP" reward_type }}>Antrik Suraksha Seva Padak</option>
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
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="label-control" for="reward_details">Reward Details
                                    </label>
                                    <input class="form-control" type="text" name="reward_details"
                                           id="reward_details_edit" value="{{ reward_details }}">
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
        var editPath = '{{ url('/') . '/rewards/updateReward/' }}';
        var employeeId = '{{ $employeeId }}';
    </script>

    <script type="text/javascript" src="{{ asset('js/app/rewards.js') }}"></script>
@endsection