@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Kunden-Referenzen
                            <a href="{{ route('admin.add-member') }}" class="btn btn-primary float-end">Team-Mitglied hinzufügen</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Bereiche</th>
                                <th>Grafik</th>
                                <th>Aktionen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>
                                        @foreach($member->areas ?? [] as $area)
                                            <span class="badge bg-primary me-1">{{ $area }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/members/'.$member->image) }}" width="150px" alt="Image">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit-member', $member->id) }}" class="btn btn-warning btn-sm">Bearbeiten</a>
                                        <a href="{{ route('admin.delete-member', $member->id) }}" class="btn btn-danger btn-sm">Löschen</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
