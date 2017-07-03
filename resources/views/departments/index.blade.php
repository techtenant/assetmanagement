@extends('centaur.app')
@section('title')
    Departments
    @stop
@section('content')
    <div class="page-header">
      <h1>Departments
          <button type="button" class="btn btn-primary pull-right bootstrap-modal-form-open" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              <i class="fa fa-plus-circle" aria-hidden="true"></i> Add new
          </button>
      </h1>
    </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<div class="panel panel-default">
                <!-- Table -->
        	    <table class="table table-bordered table-responsive table-striped">
        	        <thead>
        	            <tr>
        	                <th>#</th>
        	                <th>Department Name</th>
                            <th>Date Added</th>
        	                {{--<th colspan="2">Actions</th>--}}
        	            </tr>
        	        </thead>
        	        <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucwords($department->name) }}</td>
                            <td>{{ Carbon\Carbon::parse($department->created_at)->format('d-m-Y') }}</td>
                            {{--<td>--}}
                                {{--<a href="" class="btn btn-danger">--}}
                                    {{--<i class="fa fa-trash" aria-hidden="true"></i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<a href="" class="btn btn-warning">--}}
                                    {{--<i class="fa fa-edit" aria-hidden="true"></i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        </tr>

                    @endforeach
        	        </tbody>
        	    </table>
        	</div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <form class="bootstrap-modal-form" action="{{ route('save-new-department') }}" method="post">
                    {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">New Department</h4>
                    </div>
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="name" class="control-label">Department Name</label>
                                <input autofocus  type="text" name="name" class="form-control" id="name">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    @stop