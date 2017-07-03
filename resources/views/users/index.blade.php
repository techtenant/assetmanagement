@extends('centaur.app')

@section('title','Resources Under my custody')

    @section('content')
        <div class="page-header">
            <h3 class="text-muted text-center">Resources Under My Custody
                <small></small>
            </h3>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"></div>
            <!-- Table -->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>From Date</th>
                    <th>To Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($resources as $resource)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucwords(\App\Asset::find($resource->asset_id)->name) }}</td>
                        <td>{{ \Carbon\Carbon::parse($resource->from_date)->format('d-M-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($resource->to_date)->format('d-M-Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @stop