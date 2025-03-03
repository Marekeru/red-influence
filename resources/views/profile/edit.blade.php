@extends('layouts.app')

@section('title', 'Profil bearbeiten')

@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
            </div>

            @if(auth()->user()->role === 'admin')
                <div class="mb-3">
                    <label class="form-label">E-Mail-Adresse</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Speichern</button>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#passwordModal">
                Passwort ändern
            </button>
        </form>
    </div>

    <!-- 🔹 Passwort ändern Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Passwort ändern</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Neues Passwort</label>
                            <input type="password" name="password" class="form-control" required autocomplete="new-password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Passwort bestätigen</label>
                            <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                        <button type="submit" class="btn btn-success">Passwort speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
