@extends('centaur.app')

@section('title','Reservations')

@section('content')
    <div class="page-header">
        <h3 class="text-center text-muted">Reservations</h3>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Reservations</div>
            <table class="table  table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Asset</th>
                    <th>Serial Number</th>
                    <th>From Date</th>
                    <th>To Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords(\App\User::find($reservation->user_id)->first_name) }}</td>

                    <td>{{ ucwords(\App\Asset::find($reservation->asset_id)->name) }}</td>
                    <td>{{ ucwords(\App\Asset::find($reservation->asset_id)->serial_number) }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->from_date)->format('d-M-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->to_date)->format('d-M-Y') }}</td>
                    <td>
                        @if($reservation->approved == 1)
                            <button class="btn btn-success">
                                <i class="fa fa-check"></i> Approve</button>
                            @elseif($reservation->approved == 0)
                            <a class="btn btn-warning" href="{{ route('approve-reservation',$reservation->id) }}">
                                <i class="fa fa-spinner fa-spin"></i> Approve</a>
                        @endif
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@stop