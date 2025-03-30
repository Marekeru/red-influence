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
                            <a href="{{ route('admin.content') }}" class="btn btn-danger float-end">Zurück</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.update-project', $project->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $project->name }}" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="video">Grafik/Video</label>
                                <input type="file" name="video" class="form-control mb-3">

                                @php
                                    $filePath = asset('uploads/projects/' . $project->video);
                                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                                @endphp

                                    <!-- Überprüfen, ob es ein Bild oder ein Video ist -->
                                @if(in_array($extension, ['jpg', 'jpeg', 'png'])) <!-- Bild -->
                                <img src="{{ $filePath }}" width="150px" alt="Image" style="background-color: grey; padding: 5px; border-radius: 5px;">
                                @elseif(in_array($extension, ['mp4', 'avi', 'mkv'])) <!-- Video -->
                                <video width="150px" controls>
                                    <source src="{{ $filePath }}" type="video/{{ $extension }}">
                                    Ihr Browser unterstützt das Video-Tag nicht.
                                </video>
                                @else
                                    <!-- Falls kein Bild oder Video gefunden wird -->
                                    <span class="text-danger">Kein gültiges Bild oder Video</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Aktualisieren</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
