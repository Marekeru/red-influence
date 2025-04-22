@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Farben</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Hintergrundfarbe Dunkel</label>
                                <input type="text" name="settings[background_color_dark]" value="{{ $settings['background_color_dark']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Hintergrundfarbe Akzent</label>
                                <input type="text" name="settings[background_color_accent]" value="{{ $settings['background_color_accent']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Schriftfarbe Hell</label>
                                <input type="text" name="settings[font_color_light]" value="{{ $settings['font_color_light']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Schriftfarbe Akzent</label>
                                <input type="text" name="settings[font_color_accent]" value="{{ $settings['font_color_accent']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Animationsgeschwindigkeit von Kunden</label>
                                <input type="text" name="settings[client_animation_speed]" value="{{ $settings['client_animation_speed']->value ?? '' }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
