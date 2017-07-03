@extends('centaur.app')

@section('title','Request')

    @section('content')
<div class="page-header">
  <h3 class="text-center text-muted">Resources</h3>
</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	 <div class="panel panel-default ">
        		<!-- Default panel contents -->
        		<div class="panel-heading">Available Resources</div>
        	    <!-- Table -->
        	    <table class="table table-bordered">
        	        <thead>
        	            <tr>
        	                <th>#</th>
        	                <th>Serial</th>
        	                <th>Item</th>
        	             </tr>
        	        </thead>
        	        <tbody>
        	            @foreach($resources as $resource)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($resource->serial_number) }}</td>
                                <td> <a href="{{ route('show-resource',$resource->serial_number) }}">
										<i class="fa fa-link"></i>
										{{ ucfirst($resource->name) }}
									</a>
								</td>

                            </tr>
                            @endforeach
        	        </tbody>
        	    </table>
        	</div>
        </div>
        @stop