@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if(session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Klient bearbeiten
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-danger float-end">Zurück</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.update-client', $client->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $client->name }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Grafik</label>
                                <input type="file" name="image" class="form-control mb-3">
                                <img src="{{ asset('uploads/clients/'.$client->image) }}" width="150px" alt="Image" style="background-color: grey; padding: 5px; border-radius: 5px;">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success">Aktualisieren</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
