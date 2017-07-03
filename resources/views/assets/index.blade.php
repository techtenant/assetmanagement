@extends('centaur.app')
@section('content')
<div class="page-header">
  <h1 class="text-center text-muted">Company Assets
      <a href="{{ route('create-new-asset') }}" class="pull-right btn btn-primary">
         <i class="fa fa-plus-circle" aria-hidden="true"></i> Add new</a>
  </h1>

</div>
    <div class="col-xs-8  col-sm-8 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">

			</div>
			<div class="panel-body">
				<a href="{{ route('to-pdf') }}" class="pull-right btn btn-info">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> Export Pdf</a>
			</div>

			<!-- Table -->
			<table class="table table-bordered table-hover table-striped">
				<thead>
				<tr>
					<th> <i class="fa fa-caret-down" aria-hidden="true"></i> #</th>
					<th><i class="fa fa-edit" aria-hidden="true"></i> Name</th>
					<th><i class="fa fa-edit" aria-hidden="true"></i> Serial</th>
					<th><i class="fa fa-calendar" aria-hidden="true"></i> Date Added</th>
					<th colspan="2">Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($assets as $asset)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td><i class="fa fa-edit" aria-hidden="true"></i> {{ strtoupper($asset->name) }}</td>
						<td><i class="fa fa-edit" aria-hidden="true"></i> {{ strtoupper($asset->serial_number) }}</td>
						<td><i class="fa fa-calendar" aria-hidden="true"></i> {{ Carbon\Carbon::parse($asset->created_at)->format('d-M-Y') }}</td>
						<td>
							<button type="button" class="btn btn-primary bootstrap-modal-form-open" data-toggle="modal" data-target="#exampleModal{{ $asset->id }}" data-whatever="@mdo">
								<i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
							</button>
							<div class="modal fade" id="exampleModal{{ $asset->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<form class="bootstrap-modal-form" action="{{ route('update-asset',$asset->id) }}" method="post" autocomplete="off">
											{{ csrf_field() }}
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="exampleModalLabel">Update</h4>
										</div>
										<div class="modal-body">

												<div class="form-group">
													<label for="recipient-name" class="control-label">Name:</label>
													<input value="{{ $asset->name }}" type="text" name="name" class="form-control" id="recipient-name">
												</div>
												<div class="form-group">
													<label for="message-text" class="control-label">Serial Number:</label>
													<input value="{{ $asset->serial_number }}" name="serial_number" type="text" class="form-control" id="recipient-name">
												</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default bootstrap-modal-form-open" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
										</form>
									</div>
								</div>
							</div>
						</td>
						<td>
							<form action="{{ route('delete-asset',$asset->id) }}" method="POST" role="form">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<button onclick="confirm_delete(this.form)" class="btn btn-danger" type="button">
									<i class="fa fa-trash" aria-hidden="true"></i>
										Delete
									</button>
								</div>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>

	</div>
    @stop