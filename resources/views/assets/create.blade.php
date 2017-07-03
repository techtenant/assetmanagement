@extends('centaur.app')
@section('content')
    <div class="page-header">

    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3">
    	<form action="{{ route('save-new-asset') }}" autocomplete="off" method="POST" role="form">
            {{ csrf_field() }}
    		<legend>New Item</legend>
    	
    		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    			<label for="name">Name</label>
                <div class='input-group date' id=''>
                <span class="input-group-addon">
                 <i class="fa fa-edit" aria-hidden="true"></i>
                                            </span>
    			<input type="text" class="form-control" name="name" id="name" placeholder="Asset Name">
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('searial_number') ? ' has-error' : '' }}">
                <label for="name">Serial Number</label>
                <div class='input-group date' id=''>
                <span class="input-group-addon">
                 <i class="fa fa-edit" aria-hidden="true"></i>
                                            </span>
                    <input type="text" class="form-control" name="serial_number" id="serial_number" placeholder="Item serial Number">
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <div class='input-group date' id=''>
                <span class="input-group-addon">
                 <i class="fa fa-edit" aria-hidden="true"></i>
                                            </span>
                        <select class="form-control" name="category" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
    		<button type="submit" class="btn btn-primary">
                <i class="fa fa-save" aria-hidden="true"></i>
                save
            </button>
    	</form>
    </div>
@stop