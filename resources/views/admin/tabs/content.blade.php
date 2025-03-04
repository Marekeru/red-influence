<div class="row">
    <!-- Sidebar für Abschnitte -->
    <div class="col-md-3">
        <ul class="nav flex-column nav-pills" id="sectionTabs">
            @for ($i = 1; $i <= 8; $i++)
                <li class="nav-item">
                    <a class="nav-link {{ $i === 1 ? 'active' : '' }}" id="section{{ $i }}-tab" data-bs-toggle="pill" href="#section{{ $i }}">Abschnitt {{ $i }} - Titel</a>
                </li>
            @endfor
        </ul>
    </div>

    <!-- Inhaltsbereich für den gewählten Abschnitt -->
    <div class="col-md-9">
        <div class="tab-content">
            <!-- Abschnitt 1 - Start -->
            <div class="tab-pane fade show active p-3 border rounded bg-white" id="section1">
                <form action="{{ route('admin.updateContent') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Überschrift</label>
                        <input type="text" name="settings[hero_site_heading]" value="{{ $settings['hero_site_heading']->value ?? '' }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Untertitel</label>
                        <input type="text" name="settings[hero_site_subtitle]" value="{{ $settings['hero_site_subtitle']->value ?? '' }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Top-Bar Text</label>
                        <input type="text" name="settings[hero_top_bar_text]" value="{{ $settings['hero_top_bar_text']->value ?? '' }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>

            <!-- Abschnitte 2 -->
            <div class="tab-pane fade p-3 border rounded bg-white" id="section2">
                <form action="{{ route('admin.updateContent') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Text 1</label>
                        <input type="text" name="settings[about_text1]" value="{{ $settings['about_text1']->value ?? '' }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Text 2</label>
                        <input type="text" name="settings[about_text2]" value="{{ $settings['about_text2']->value ?? '' }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Text3</label>
                        <input type="text" name="settings[about_text3]" value="{{ $settings['about_text3']->value ?? '' }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Foto hochladen</label>
                        <input type="file" name="aboutPicture" class="form-control">
                        @if(isset($settings['aboutPicture']->value))
                            <img src="{{ asset('storage/' . $settings['aboutPicture']->value) }}" class="mt-2 rounded shadow" style="max-height: 100px;">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>

            <!-- Abschnitte 3 -->
            <div class="tab-pane fade p-3 border rounded bg-white" id="section3">
                <form action="{{ route('admin.updateContent') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Text 1</label>
                        <input type="text" name="settings[clients_text1]" value="{{ $settings['clients_text1']->value ?? '' }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>

            <!-- Abschnitte 4 -->
            <div class="tab-pane fade p-3 border rounded bg-white" id="section4">
                <form action="{{ route('admin.updateContent') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>

            <!-- Abschnitte 5 -->
            <div class="tab-pane fade p-3 border rounded bg-white" id="section5">
                <form action="{{ route('admin.updateContent') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>

            <!-- Abschnitte 6 -->
            <div class="tab-pane fade p-3 border rounded bg-white" id="section6">
                <form action="{{ route('admin.updateContent') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>

            <!-- Abschnitte 7 -->
            <div class="tab-pane fade p-3 border rounded bg-white" id="section7">
                <form action="{{ route('admin.updateContent') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>

            <!-- Abschnitte 8 -->
            <div class="tab-pane fade p-3 border rounded bg-white" id="section8">
                <form action="{{ route('admin.updateContent') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>
        </div>
    </div>
</div>
