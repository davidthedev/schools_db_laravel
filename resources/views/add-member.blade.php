@extends('master')

@section('page-title')
    Add member
@endsection

@section('body')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        @if (count($errors) > 0)
            @component('components.danger-alert')
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            @endcomponent
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                Add a new member
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('store.member') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="name">Member name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter member name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Member email:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter member email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="school">Select school:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="school" name="school_id">
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
