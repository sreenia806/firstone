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
                    <label class="col-md-3 label-control" for="account_number">Account
                        Number</label>
                    <div class="col-md-9">
                        <input type="text" id="account_number"
                               class="form-control border-primary"
                               name="account_number"
                               value="{{ $employee->account_number }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="bankname">Bank
                        Name</label>
                    <div class="col-md-9">
                        <input type="text" id="bankname"
                               class="form-control border-primary"
                               name="bankname"
                               value="{{ $employee->bankname }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="branchname">Branch Name</label>
                    <div class="col-md-9">
                        <input type="text" id="branchname"
                               class="form-control border-primary"
                               name="branchname"
                               value="{{ $employee->branchname }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="micrcode">MICR
                        Code</label>
                    <div class="col-md-9">
                        <input type="text" id="micrcode"
                               class="form-control border-primary"
                               name="micrcode"
                               value="{{ $employee->micrcode }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="ifsccode">IFSC Code</label>
                    <div class="col-md-9">
                        <input type="text" id="ifsccode"
                               class="form-control border-primary"
                               name="ifsccode"
                               value="{{ $employee->ifsccode }}">
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