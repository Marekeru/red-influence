<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Projekte
                    <a href="{{ route('admin.add-project') }}" class="btn btn-primary float-end">Projekte hinzufügen</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Medium</th>
                        <th>Bearbeiten</th>
                        <th>Löschen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($projects->isNotEmpty())
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->name }}</td>
                                <td>
                                    @php
                                        $filePath = asset('uploads/projects/' . $project->video);
                                        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png']))
                                    <img src="{{ $filePath }}" width="150px" alt="Image" style="background-color: grey; padding: 5px; border-radius: 5px;">
                                    @elseif(in_array($extension, ['mp4', 'avi', 'mkv']))
                                    <video width="150px" controls>
                                        <source src="{{ $filePath }}" type="video/{{ $extension }}">
                                        Ihr Browser unterstützt das Video-Tag nicht.
                                    </video>
                                    @else
                                        <span class="text-danger">Ungültige Datei</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit-project', $project->id) }}" class="btn btn-primary btn-sm">Bearbeiten</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.delete-project', $project->id) }}" class="btn btn-danger btn-sm">Löschen</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
