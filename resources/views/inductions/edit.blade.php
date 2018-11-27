@extends('layouts.layout')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Edit Induction</h3>
        </div>
    </div>

    <form class="form form-horizontal" action="{{ route('inductions.update', ['id' => $induction->id ]) }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-body col-sm-8 offset-1">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="file_number">File
                        Number</label>
                        <div class="col-md-9">
                            <input type="text" id="file_number"
                                   class="form-control border-primary"
                                   name="first_name"
                                   value="{{ $induction->file_number }}">
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-md-3 label-control"
                               for="do_number">DO number</label>
                        <div class="col-md-9">
                            <input type="text" id="do_number"
                                   class="form-control border-primary"
                                   name="do_number"
                                   value="{{ $induction->do_number }}">
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-md-3 label-control"
                                   for="induction_date">Date of Induction </label>
                            <div class="col-md-9">
                                <input type="text" id="induction_date"
                                       class="form-control border-primary dp-month-year hasDatepicker"
                                       name="induction_date"
                                       value="{{ $induction->induction_date }}">
                            </div>
                        </div>
                    </div>
                </div>


        </div>

        <div class="form-actions row">
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Add Employee</button>
            </div>
            <div class="col-sm-6 text-right">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="ft-x"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                </button>
            </div>

        </div>
    </form>


    <div id="employee-list">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">Employee No</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">PAO ID No</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($induction->employees()->get() as $employee)
            <tr class="table-active">
                <td>{{ $employee->employee_number }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->pao_id_number }}</td>
                <td>
                    <a type="button" class="btn btn-sm btn-primary" href="{{ route('employees.show', ['id' => $employee->id]) }}">View</a>
                    <a type="button" class="btn btn-sm btn-info" href="{{ route('employees.edit', ['id' => $employee->id]) }}">Edit</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

    </div>

    @verbatim
    <script type="text/template" id="template-employee-list">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">Employee No</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">PAO ID No</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            {{# employees }}
                <tr class="table-active">
                    <td>{{ employee_number }}</td>
                    <td>{{ first_name }}</td>
                    <td>{{ last_name }}</td>
                    <td>{{ pao_id_number }}</td>
                    <td>
                        <a type="button" class="btn btn-sm btn-primary" href="{{ showPath }}">View</a>
                        <a type="button" class="btn btn-sm btn-info" href="{{ editPath }}">Edit</a>
                    </td>
                </tr>
            {{/ employees }}

            </tbody>
        </table>
    </script>
    @endverbatim


    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body col-sm-8 offset-2">
                    <form id="frmInductionEdit" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="first_name">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="first_name"
                                               class="form-control border-primary"
                                               name="first_name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="last_name">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="last_name"
                                               class="form-control border-primary"
                                               name="last_name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="rank_id">Rank</label>
                                    <div class="col-md-9">
                                        <select id="rank_id"
                                                class="form-control border-primary"
                                                name="rank_id">
                                            <option value="">Select Rank</option>
                                            @foreach($ranks as $rank)
                                                <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="employee_number">Employee Number</label>
                                    <div class="col-md-9">
                                        <input type="text" id="employee_number"
                                               class="form-control border-primary"
                                               name="employee_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="parent_unit_number">Parent Unit Number</label>
                                    <div class="col-md-9">
                                        <input type="text" id="parent_unit_number"
                                               class="form-control border-primary"
                                               name="parent_unit_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="designation_id">Parent Unit Rank</label>
                                    <div class="col-md-9">
                                        <select id="designation_id"
                                                class="form-control border-primary"
                                                name="designation_id">
                                            <option value="">Select Parent Unit Rank</option>
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="nativeunit_id">Parent Unit </label>
                                    <div class="col-md-9">
                                        <select id="nativeunit_id"
                                                class="form-control border-primary"
                                                name="nativeunit_id">
                                            <option value="">Select Parent Unit Rank</option>
                                            @foreach($nativeunits as $nativeunit)
                                                <option value="{{ $nativeunit->id }}">{{ $nativeunit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="pao_id_number">PAO ID Number</label>
                                    <div class="col-md-9">
                                        <input type="text" id="pao_id_number"
                                               class="form-control border-primary"
                                               name="pao_id_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1" id="closeModal" data-dismiss="modal">
                        <i class="ft-x"></i> Close
                    </button>
                    <button type="submit" id="saveEmployee" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/inductions/inductions.edit.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            var inductionId = '{{ $induction->id }}';
            var publicPath = '{{ url('/') }}';
            console.log(publicPath)
            var induction = new InductionsEdit(inductionId, publicPath);
            induction.init();
        });
    </script>
@stop