@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      <div class="form-group">
                        <avatarupload endpoint="{{ route('account.avatar.store')}}" send-as="image" current-avatar="{{ Auth::user()->getAvatarPath() }}"></avatarupload>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?: Auth::user()->name }}">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
