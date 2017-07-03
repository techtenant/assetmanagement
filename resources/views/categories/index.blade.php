@extends('centaur.app')
@section('title')
    And new Category
@stop

@section('content')
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
        <div class="well">
            <form autocomplete="off" action="{{ route('save-new-category') }}" method="POST" role="form">
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="">Cateogory Name</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="Category name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Save
                    </button>
                    <button type="reset" class="btn btn-info">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                        reset
                    </button>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
        

        <hr>
        <div class="panel panel-default">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucwords($category->name) }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $category->id }}" data-whatever="@mdo">
                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                            </button>

                            <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <form id="category_edit_form" action="{{ route('update-category',$category->id) }}" method="post" autocomplete="off">
                                        {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                                        </div>
                                        <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name:</label>
                                                    <input type="text" name="name" class="form-control" id="recipient-name" value="{{  $category->name }}">
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-save" aria-hidden="true"></i>
                                                Save changes
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop