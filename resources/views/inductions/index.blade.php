@extends('layouts.layout')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Inductions List</h3>
        </div>
        <div class="col-md-3 text-right">
            <a type="button" class="btn btn-success" href="{{ route('inductions.create') }}">Create New Induction</a>
        </div>
    </div>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col">File Number</th>
            <th scope="col">DO Number</th>
            <th scope="col">Induction Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $induction)
            <tr class="table-active">
                <td>{{ $induction->file_number }}</td>
                <td>{{ $induction->do_number }}</td>
                <td>{{ $induction->induction_date }}</td>
                <td>{{ $induction->status }}</td>
                <td>
                    <a type="button" class="btn btn-sm btn-primary" href="{{ route('inductions.show', ['id' => $induction->id]) }}">View</a>
                    <a type="button" class="btn btn-sm btn-info" href="{{ route('inductions.edit', ['id' => $induction->id]) }}">Edit</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection