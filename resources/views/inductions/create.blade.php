@extends('layouts.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Create New Induction</h3>
        </div>
    </div>

    <form class="form form-horizontal" action="{{ route('inductions.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-body col-sm-8 offset-1">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="file_number">File Number</label>
                        <div class="col-md-9">
                            <input type="text" id="file_number"
                                   class="form-control border-primary"
                                   name="file_number">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-md-3 label-control"
                               for="do_number">DO Number</label>
                        <div class="col-md-9">
                            <input type="text" id="do_number"
                                   class="form-control border-primary"
                                   name="do_number">
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="induction_date">Date of Induction</label>
                        <div class="col-md-9">
                            <input type="text" id="induction_date"
                                   class="form-control border-primary dp-month-year hasDatepicker"
                                   name="induction_date">
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

@endsection