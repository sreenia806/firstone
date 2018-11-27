@extends('layouts.layout')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0 d-inline-block">Induction List</h3>
        </div>
    </div>

    <table class="table table-hover table-bordered">
        <tbody>

        @foreach($fieldsToShow as $field)
            <tr class="table-active">
                <th style="width: 33%">{{ ucwords(str_replace('_', " ", $field)) }}</th>
                <td>{{ $Induction->$field }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection