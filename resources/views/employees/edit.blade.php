@extends('layouts.layout')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Edit Employee {{ $employee->first_name }}</h3>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-sm-3">
            <img src="{{ asset('images/avatars') . '/' . $employee->photo }}" alt="{{ $employee->first_name }}"
                 width="100">
        </div>
    </div>


    <ul class="nav nav-tabs pt-1 pb-1">
        <li class="nav-item">
            <a class="nav-link active show" data-toggle="tab" href="#profile1">Profile1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile2">Profile2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#address">Address Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#bankdetails">Bank Details</a>
        </li>

    </ul>

    <div class="row pt-1 pb-1">
        <div id="myTabContent" class="tab-content col-sm-12">
            <div class="tab-pane fade active show" id="profile1">

                @include('employees.profile1',  ['employee' => $employee])

            </div>

            <div class="tab-pane fade" id="profile2">

                @include('employees.profile2',  ['employee' => $employee])

            </div>
            <div class="tab-pane fade" id="address">

               @include('employees.address', ['employee' => $employee])


            </div>
            <div class="tab-pane fade" id="bankdetails">

                @include('employees.bankdetails',  ['employee' => $employee])
            </div>

        </div>
    </div>



@endsection

@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/app/employees.js') }}"></script>
@endsection