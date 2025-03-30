<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('add-client') }}" class="btn btn-primary float-end">Klienten-Logo hinzufügen</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Grafik</th>
                                <th>Bearbeiten</th>
                                <th>Löschen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($client as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/clients/'.$item->image) }}" width="70px" alt="Image">
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Bearbeiten</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm">Löschen</a>
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
