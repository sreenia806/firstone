<form class="form form-horizontal"
      action="{{ route('employees.update', ['id' => $employee->id ]) }}"
      method="POST"
      enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}


    <div class="form-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="first_name">Fist
                        Name</label>
                    <div class="col-md-9">
                        <input type="text" id="first_name"
                               class="form-control border-primary"
                               name="first_name"
                               value="{{ $employee->first_name }}">
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
                               name="last_name"
                               value="{{ $employee->last_name }}">
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
                               name="employee_number"
                               value="{{ $employee->employee_number }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="parent_unit_number">Parent Unit
                        No</label>
                    <div class="col-md-9">
                        <input type="text" id="parent_unit_number"
                               class="form-control border-primary"
                               name="parent_unit_number"
                               value="{{ $employee->parent_unit_number }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="nativeunit_id">Parent Unit</label>
                    <div class="col-md-9">
                        <select class="form-control" name="nativeunit_id" id="nativeunit_id"
                                data-parsley-required="true">
                            @foreach ($nativeunits as $nativeunit)

                                <option value="{{ $nativeunit->id }}"
                                        @if ($employee->nativeunit_id == $nativeunit->id)
                                        selected
                                        @endif
                                >{{ $nativeunit->name }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="designation_id">Parent Unit Rank</label>
                    <div class="col-md-9">
                        <select class="form-control" name="designation_id" id="designation_id"
                                data-parsley-required="true">
                            <option value="">Select parent unit Rank</option>
                            @foreach ($designations as $designation)

                                <option value="{{ $designation->id }}"
                                        @if ($employee->designation_id == $designation->id)
                                        selected
                                        @endif
                                >{{ $designation->name }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="date_of_birth">Date of Birth</label>
                    <div class="col-md-9">
                        <input type="text" id="date_of_birth"
                               class="form-control border-primary hasDatepicker"
                               name="date_of_birth"
                               value="{{ $employee->date_of_birth }}" >
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="date_of_appointment">Date of
                        Appointment</label>
                    <div class="col-md-9">
                        <input type="text" id="date_of_appointment"
                               class="form-control border-primary dp-month-year hasDatepicker"
                               name="date_of_appointment"
                               value="{{ $employee->date_of_appointment }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="date_of_birth">Photo</label>
                    <div class="col-md-9">
                        <input type="file" id="avatar"
                               class="form-control border-primary"
                               name="avatar">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="rank_id">GH Rank</label>
                    <div class="col-md-9">
                        <select class="form-control" name="rank_id" id="rank_id"
                                data-parsley-required="true">
                            <option value="">Select GH rank</option>
                            @foreach ($ranks as $rank)

                                <option value="{{ $rank->id }}"
                                        @if ($employee->rank_id == $rank->id)
                                        selected
                                        @endif
                                >{{ $rank->name }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="date_of_joining">Date of Entry
                         into GreyHoundss</label>
                    <div class="col-md-9">
                        <input type="text" id="date_of_joining"
                               class="form-control border-primary dp-month-year hasDatepicker"
                               name="date_of_joining"
                               value="{{ $employee->date_of_joining }}" >
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="category">Category</label>
                    <div class="col-md-9">
                        <select class="form-control" name="category">
                            <option value="">Select Category</option>

                            @foreach($categories as $category => $value)
                            <option value="{{ $category }}" {{ $value }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="father_name">Father Name</label>
                    <div class="col-md-9">
                        <input type="text" id="father_name"
                               class="form-control border-primary"
                               name="father_name"
                               value="{{ $employee->father_name }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="marital_status">Marital
                        Status</label>
                    <div class="col-md-9">
                        <select class="form-control" name="marital_status">
                            <option value="">Select Marital status</option>
                            <option value="Married"
                                    @if ($employee->marital_status == 'Married') selected @endif
                            >Married</option>
                            <option value="Unmarried"
                                    @if ($employee->marital_status == 'Unmarried') selected @endif
                            >Unmarried</option>

                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="spouse_name">Spouse Name</label>
                    <div class="col-md-9">
                        <input type="text" id="spouse_name"
                               class="form-control border-primary"
                               name="spouse_name"
                               value="{{ $employee->spouse_name }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="pao_id_number">PAO IDNO
                    </label>
                    <div class="col-md-9">
                        <input type="text" id="pao_id_number"
                               class="form-control border-primary"
                               name="pao_id_number"
                               value="{{ $employee->pao_id_number }}">
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
