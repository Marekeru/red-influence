@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Allgemeine Elemente</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Seitentitel</label>
                                <input type="text" name="settings[site_title]" value="{{ $settings['site_title']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Favicon</label>
                                <input type="file" name="favicon" class="form-control">
                                @if(isset($settings['favicon']->value))
                                    <img src="{{ asset('storage/' . $settings['favicon']->value) }}" class="mt-2" style="max-height: 50px;">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                @if(isset($settings['logo']->value))
                                    <img src="{{ asset('storage/' . $settings['logo']->value) }}" class="mt-2" width="150px">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Adresse</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name (Verantwortlicher)</label>
                                <input type="text" name="settings[name]" value="{{ $settings['name']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Umsatzsteuer Identifikationsnummer</label>
                                <input type="text" name="settings[u_id]" value="{{ $settings['u_id']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="text" name="settings[email]" value="{{ $settings['email']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Telefon</label>
                                <input type="text" name="settings[phone]" value="{{ $settings['phone']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Straße</label>
                                <input type="text" name="settings[street]" value="{{ $settings['street']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Hausnummer</label>
                                <input type="text" name="settings[house_number]" value="{{ $settings['house_number']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Postleitzahl</label>
                                <input type="text" name="settings[plz]" value="{{ $settings['plz']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Stadt</label>
                                <input type="text" name="settings[city]" value="{{ $settings['city']->value ?? '' }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i>Speichern</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Links</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Linked-In</label>
                                <input type="text" name="settings[linked_in]" value="{{ $settings['linked_in']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Instagram</label>
                                <input type="text" name="settings[instagram]" value="{{ $settings['instagram']->value ?? '' }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Calendly</label>
                                <input type="text" name="settings[calendly]" value="{{ $settings['calendly']->value ?? '' }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i>Speichern</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
