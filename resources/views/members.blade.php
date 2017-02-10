@extends('master')

@section('page-title')
    Members
@endsection

@section('body')

<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        @if (session('status'))
            @component('components.success-alert')
                {{ session('status') }}
            @endcomponent
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <h5 class="pull-left">Members</h5>
                <form method="GET" action="{{ route('members') }}" class="form-inline pull-right">
                    <div class="form-group">
                        <select name="school_id" class="form-control">
                            <option value="view-all">All schools</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="submit" value="Filter" class="btn btn-default">
                    </div>
                    </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>School</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->school->name }}</td>
                            <td>
                                <form method="POST" action="{{ route('destroy.member', [$member->id]) }}">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button type="submit" name="delete" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $members->appends(Request::all())->links() }}
    </div>
</div>

@endsection
