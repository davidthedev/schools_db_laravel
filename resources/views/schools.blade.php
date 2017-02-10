@extends('master')

@section('page-title')
    Schools
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
            <div class="panel-heading">
                Schools
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schools as $school)
                        <tr>
                            <td>{{ $school->id }}</td>
                            <td>{{ $school->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $schools->links() }}
    </div>
</div>

@endsection
