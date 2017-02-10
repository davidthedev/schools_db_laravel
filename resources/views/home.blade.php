@extends('master')

@section('page-title')
    Home
@endsection

@section('body')

<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Menu
            </div>
            <div class="panel-body">
                Choose from the options below
            </div>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('members') }}">Members</a></li>
                <li class="list-group-item"><a href="{{ route('schools') }}">Schools</a></li>
            </table>
        </div>
    </div>
</div>

@endsection
