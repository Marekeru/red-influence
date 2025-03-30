@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">Seitentitel</label>
            <input type="text" name="settings[site_title]" value="{{ $settings['site_title']->value ?? '' }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Favicon hochladen</label>
            <input type="file" name="favicon" class="form-control">
            @if(isset($settings['favicon']->value))
                <img src="{{ asset('storage/' . $settings['favicon']->value) }}" class="mt-2 rounded shadow" style="max-height: 50px;">
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Logo hochladen</label>
            <input type="file" name="logo" class="form-control">
            @if(isset($settings['logo']->value))
                <img src="{{ asset('storage/' . $settings['logo']->value) }}" class="mt-2 rounded shadow" style="max-height: 100px;">
            @endif
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
    </form>
@endsection
