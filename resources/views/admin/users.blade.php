@extends('layouts.app')

@section('content')
    <table class="table mt-4 ff">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Aktionen</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}">
                        <i class="bi bi-pencil"></i> Bearbeiten
                    </button>

                    <form action="{{ route('admin.deleteEditor', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Löschen</button>
                    </form>
                </td>
            </tr>

            <!-- Bearbeiten Modal -->
            <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editor bearbeiten</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.updateEditor', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">E-Mail</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                                <button type="submit" class="btn btn-success">Speichern</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>

    <!-- Editor hinzufügen Button -->
    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEditorModal">
            <i class="bi bi-person-plus"></i> Editor hinzufügen
        </button>
    </div>

    <!-- Editor hinzufügen Modal -->
    <div class="modal fade" id="addEditorModal" tabindex="-1" aria-labelledby="addEditorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Neuen Editor hinzufügen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.storeEditor') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-Mail</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Passwort</label>
                            <input type="password" name="password" class="form-control" autocomplete="new-password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                        <button type="submit" class="btn btn-success">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
