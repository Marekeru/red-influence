@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Kunden-Referenzen
                            <a href="{{ route('admin.add-client') }}" class="btn btn-primary float-end">Kunden-Referenz hinzufügen</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Grafik</th>
                                <th>Aktionen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/clients/'.$client->image) }}" width="150px" alt="Image" style="background-color: grey; padding: 5px; border-radius: 5px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit-client', $client->id) }}" class="btn btn-warning btn-sm">Bearbeiten</a>
                                        <a href="{{ route('admin.delete-client', $client->id) }}" class="btn btn-danger btn-sm">Löschen</a>
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
