@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @include('admin.clients.index')
        @include('admin.projects.index')
    </div>
@endsection
