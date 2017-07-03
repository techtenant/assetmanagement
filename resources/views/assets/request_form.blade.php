@extends('centaur.app')

@section('title','Request')

@section('content')
    <div class="page-header">
        <h1 class="text-center text-muted">Resources</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-lg-offset-3">
        <div class="panel panel-default ">
            <!-- Default panel contents -->
            <div class="panel-heading">Available Resources</div>
            <!-- Table -->
            <div class="panel-body">
                <form action="{{ route('reserve-resource') }}" method="POST" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Item</label>
                        <input type="text" value="{{ $resource->name }}" class="form-control" name="name" id="" placeholder="Input...">
                        <input type="hidden" value="{{ $resource->id }}" class="form-control" name="id" id="" placeholder="Input...">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="container">
                                <div class='col-lg-2'>
                                    <div class="form-group{{ $errors->has('from_date') ? ' has-error' : '' }}">
                                        <label for="from_date">From Date</label>
                                        <div class='input-group date' id='datetimepicker6'>
                                            <input name="from_date" type='text' class="form-control" />
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('from_date') }}</strong>
                                    </span>
                                            @endif
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-2'>
                                    <div class="form-group{{ $errors->has('to_date') ? ' has-error' : '' }}">
                                        <label for="to_date">To Date</label>
                                        <div class='input-group date' id='datetimepicker7'>

                                            <input name="to_date"  type='text' class="form-control" />
                                            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker6').datetimepicker();
                                $('#datetimepicker7').datetimepicker({
                                    useCurrent: false //Important! See issue #1075
                                });
                                $("#datetimepicker6").on("dp.change", function (e) {
                                    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                });
                                $("#datetimepicker7").on("dp.change", function (e) {
                                    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                                });
                            });
                        </script>
                    </div>
                    <button type="submit" class="btn btn-primary">
                       <i class="fa fa-send" aria-hidden="true"></i> Send Request</button>
                    <a href="{{ route('all-resources') }}" class="btn btn-info">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                        Cancel Request</a>
                </form>
            </div>
        </div>
    </div>
@stop