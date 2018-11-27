<form class="form form-horizontal"
      action="{{ route('saveAddress', ['id' => $employee->id ]) }}"
      method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="present[id]"
           @if (!$employee->presentAddress)
           value=""
           @else
           value="{{ $employee->presentAddress->id }}"
            @endif
    >
    <div class="row"><h3>Present Address:</h3></div>

    <div class="form-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="address1">Address1</label>
                    <div class="col-md-9">
                        <input type="text"
                               class="form-control border-primary"
                               name="present[address1]"
                               id="present_address1"
                               @if (!$employee->presentAddress)
                               value=""
                               @else
                               value="{{ $employee->presentAddress->address1 }}"
                                @endif
                        >

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="address2">Address2</label>
                    <div class="col-md-9">
                        <input type="text"
                               class="form-control border-primary"
                               name="present[address2]"
                               id="present_address2"
                               @if (!$employee->presentAddress)
                               value=""
                               @else
                               value="{{ $employee->presentAddress->address2 }}"
                                @endif
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="city">City</label>
                    <div class="col-md-9">
                        <input type="text"
                               class="form-control border-primary"
                               name="present[city]"
                               id="present_city"
                               @if (!$employee->presentAddress)
                               value=""
                               @else
                               value="{{ $employee->presentAddress->city }}"
                                @endif
                        >
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="state">State</label>
                    <div class="col-md-9">
                        <input type="text"
                               class="form-control border-primary"
                               name="present[state]"
                               id="present_state"
                               @if (!$employee->presentAddress)
                               value=""
                               @else
                               value="{{ $employee->presentAddress->state }}"
                                @endif
                        >
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control" for="pincode">PIN CODE</label>
                <div class="col-md-9">
                    <input type="text"
                           class="form-control border-primary"
                           name="present[pincode]"
                           id="present_pincode"
                           @if (!$employee->presentAddress)
                           value=""
                           @else
                           value="{{ $employee->presentAddress->pincode }}"
                            @endif
                    >

                </div>
            </div>
        </div>
    </div>


    <div class="row"><h3>Permanent Address:</h3></div>

    <div class="form-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-md-1 offset-2 text-right">
                        <input type="checkbox" id="same_as_above"
                               class="form-control border-primary"
                               name="same_as_above"
                               value="1">
                    </div>

                    <label class="col-md-9 label-control text-left" for="same_as_above">Same as
                        above</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-body">
        <input type="hidden" name="permanent[id]"
               @if (!$employee->permanentAddress)
               value=""
               @else
               value="{{ $employee->permanentAddress->id }}"
                @endif
        >
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="address1">Address1</label>
                    <div class="col-md-9">
                        <input type="text"
                               class="form-control border-primary"
                               name="permanent[address1]"
                               id="permanent_address1"
                               @if (!$employee->permanentAddress)
                               value=""
                               @else
                               value="{{ $employee->permanentAddress->address1 }}"
                                @endif
                        >

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="address2">Address2</label>
                    <div class="col-md-9">
                        <input type="text"
                               class="form-control border-primary"
                               name="permanent[address2]"
                               id="permanent_address2"
                               @if (!$employee->permanentAddress)
                               value=""
                               @else
                               value="{{ $employee->permanentAddress->address2 }}"
                                @endif
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control" for="city">City</label>
                <div class="col-md-9">
                    <input type="text"
                           class="form-control border-primary"
                           name="permanent[city]"
                           id="permanent_city"
                           @if (!$employee->permanentAddress)
                           value=""
                           @else
                           value="{{ $employee->permanentAddress->city }}"
                            @endif
                    >
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control" for="state">State</label>
                <div class="col-md-9">
                    <input type="text"
                           class="form-control border-primary"
                           name="permanent[state]"
                           id="permanent_state"
                           @if (!$employee->permanentAddress)
                           value=""
                           @else
                           value="{{ $employee->permanentAddress->state }}"
                            @endif
                    >
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control" for="pincode">PIN CODE</label>
                <div class="col-md-9">
                    <input type="text"
                           class="form-control border-primary"
                           name="permanent[pincode]"
                           id="permanent_pincode"
                           @if (!$employee->permanentAddress)
                           value=""
                           @else
                           value="{{ $employee->permanentAddress->pincode }}"
                            @endif
                    >

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