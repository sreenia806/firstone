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
                    <label class="col-md-3 label-control" for="aadhar_number">Aadhar
                        Number</label>
                    <div class="col-md-9">
                        <input type="text" id="aadhar_number"
                               class="form-control border-primary"
                               name="aadhar_number"
                               value="{{ $employee->aadhar_number }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="pan_number">PAN
                        Number</label>
                    <div class="col-md-9">
                        <input type="text" id="pan_number"
                               class="form-control border-primary"
                               name="pan_number"
                               value="{{ $employee->pan_number }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="blood_group">Blood Group</label>
                    <div class="col-md-9">
                        <select class="form-control" name="blood_group">

                            @foreach($bloodgroups as $bloodgroup => $value)
                                <option value="{{ $bloodgroup }}" {{ $value }}>{{ $bloodgroup }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="gh_unit_id">GH Unit</label>
                    <div class="col-md-9">
                        <select class="form-control" name="gh_unit_id" id="rank_id"
                                data-parsley-required="true">
                            <option value="">Select GHs unit</option>
                            @foreach ($units as $unit)

                                <option value="{{ $unit->id }}"
                                        @if ($employee->gh_unit_id == $unit->id)
                                        selected
                                        @endif
                                >{{ $unit->name }}</option>

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
                           for="caste">Caste</label>
                    <div class="col-md-9">
                        <select class="form-control" name="caste">

                            @foreach($castes as $caste => $value)
                                <option value="{{ $caste }}" {{ $value }}>{{ $caste }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="community">Community
                    </label>
                    <div class="col-md-9">
                        <input type="text" id="community"
                               class="form-control border-primary"
                               name="community"
                               value="{{ $employee->community }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="qualification">Qualification</label>
                    <div class="col-md-9">
                        <input type="text" id="qualification"
                               class="form-control border-primary"
                               name="qualification"
                               value="{{ $employee->qualification }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="tech_qualification">Technical
                    Qualification</label>
                    <div class="col-md-9">
                        <input type="text" id="tech_qualification"
                               class="form-control border-primary"
                               name="tech_qualification"
                               value="{{ $employee->tech_qualification }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="qualification">GPF number</label>
                    <div class="col-md-9">
                        <input type="text" id="gpf_number"
                               class="form-control border-primary"
                               name="gpf_number"
                               value="{{ $employee->gpf_number }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="cps_number">CPS Number</label>
                    <div class="col-md-9">
                        <input type="text" id="cps_number"
                               class="form-control border-primary"
                               name="cps_number"
                               value="{{ $employee->cps_number }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="tsgli_number">TSGLI Number</label>
                    <div class="col-md-9">
                        <input type="text" id="tsgli_number"
                               class="form-control border-primary"
                               name="tsgli_number"
                               value="{{ $employee->tsgli_number }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="bhadrata_number">Bhadratha Number</label>
                    <div class="col-md-9">
                        <input type="text" id="bhadrata_number"
                               class="form-control border-primary"
                               name="bhadrata_number"
                               value="{{ $employee->bhadrata_number }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="mobile_number">Mobile Number</label>
                    <div class="col-md-9">
                        <input type="text" id="mobile_number"
                               class="form-control border-primary"
                               name="mobile_number"
                               value="{{ $employee->mobile_number }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="alternate_mobile_number">Alternate
                        Mobile Number</label>
                    <div class="col-md-9">
                        <input type="text" id="alternate_mobile_number"
                               class="form-control border-primary"
                               name="alternate_mobile_number"
                               value="{{ $employee->alternate_mobile_number }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="caste">Promotion Type</label>
                    <div class="col-md-9">
                        <select class="form-control" name="promotiontype">

                            <option value="">Select Promotion Type</option>
                            @foreach($promotiontypes as $promotiontype => $value)
                                <option value="{{ $promotiontype }}" {{ $value }}>{{ $promotiontype }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="date_of_promotion">Date of Promoion
                    </label>
                    <div class="col-md-9">
                        <input type="text" id="date_of_promotion"
                               class="form-control border-primary hasDatepicker"
                               name="date_of_promotion"
                               value="{{ $employee->date_of_promotion }}" >
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