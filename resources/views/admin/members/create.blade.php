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
                        <h4>Team-Mitglied hinzufügen
                            <a href="{{ route('admin.members.index') }}" class="btn btn-danger float-end">Zurück</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.add-member.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="areas">Bereiche</label>
                                <div id="tag-container" class="mb-2">
                                    @foreach(json_decode(old('areas', '[]'), true) as $area)
                                        <span class="badge bg-primary tag m-5">
                                            {{ $area }}
                                            <span class="remove-tag" onclick="removeTag(this)"> × </span>
                                        </span>
                                    @endforeach
                                </div>
                                <input type="text" id="area-input" class="form-control mb-3" placeholder="Neuen Bereich hinzufügen">
                                <input type="hidden" name="areas" id="areas-hidden" value="{{ old('areas', '[]') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Grafik</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success">Speichern</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .tag {
        display: inline-block;
        padding: 8px 12px;
        margin: 5px;
        border-radius: 20px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        cursor: default;
    }
    .remove-tag {
        margin-left: 10px;
        font-weight: bold;
        cursor: pointer;
    }
    .remove-tag:hover {
        color: red;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let tagContainer = document.getElementById("tag-container");
        let areaInput = document.getElementById("area-input");
        let areasHidden = document.getElementById("areas-hidden");

        let areas = JSON.parse(areasHidden.value || "[]");

        function updateHiddenInput() {
            areasHidden.value = JSON.stringify(areas);
        }

        function removeTag(element) {
            let tagText = element.parentElement.firstChild.textContent.trim();
            areas = areas.filter(area => area !== tagText);
            element.parentElement.remove();
            updateHiddenInput();
        }

        areaInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                let newArea = areaInput.value.trim();
                if (newArea && !areas.includes(newArea)) {
                    areas.push(newArea);
                    let tagElement = document.createElement("span");
                    tagElement.classList.add("badge", "bg-primary", "tag");
                    tagElement.innerHTML = `${newArea} <span class="remove-tag" onclick="removeTag(this)"> × </span>`;
                    tagContainer.appendChild(tagElement);
                    updateHiddenInput();
                }
                areaInput.value = "";
            }
        });

        window.removeTag = removeTag;
    });
</script>
