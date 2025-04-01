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
                                <th>Bearbeiten</th>
                                <th>Löschen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->areas }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/members/'.$member->image) }}" width="150px" alt="Image" style="background-color: grey; padding: 5px; border-radius: 5px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit-member', $member->id) }}" class="btn btn-primary btn-sm">Bearbeiten</a>
                                    </td>
                                    <td>
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
