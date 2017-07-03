@extends('centaur.app')

@section('title', 'Create New User')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create New User</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('users.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="First Name" name="first_name" type="text" value="{{ old('first_name') }}" />
                        {!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Last Name" name="last_name" type="text" value="{{ old('last_name') }}" />
                        {!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
                        {!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
                    </div>

                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" name="department" id="department">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <h5>Roles</h5>
                    @foreach ($roles as $role)
                        <div class="checkbox">
                            <label>

                                @if($role->slug == 'administrator')
                                    <input style="display: none" disabled  type="checkbox" name="roles[{{ $role->slug }}]" value="{{ $role->id }}" >

                                    @elseif($role->slug == 'moderator')
                                    <input checked type="checkbox" name="roles[{{ $role->slug }}]" value="{{ $role->id }}" >
                                    {{ $role->name }}
                                    @elseif($role->slug == 'subscriber')
                                    {{--<input disabled  type="checkbox" name="roles[{{ $role->slug }}]" value="{{ $role->id }}" >--}}


                                    @endif
                            </label>
                        </div>
                    @endforeach
                    <hr />
                    <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        {!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password" />
                        {!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="activate" type="checkbox" value="true" {{ old('activate') == 'true' ? 'checked' : ''}}> Activate
                        </label>
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-primary" type="submit" value="Create">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop