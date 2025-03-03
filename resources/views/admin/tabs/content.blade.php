<div class="row">
    <!-- Sidebar für Abschnitte -->
    <div class="col-md-3">
        <ul class="nav flex-column nav-pills" id="sectionTabs">
            <li class="nav-item">
                <a class="nav-link active" id="section1-tab" data-bs-toggle="pill" href="#section1">Abschnitt 1 - Start</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="section2-tab" data-bs-toggle="pill" href="#section2">Abschnitt 2 - Vorstellung</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="section3-tab" data-bs-toggle="pill" href="#section3">Abschnitt 3 - Projekte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="section4-tab" data-bs-toggle="pill" href="#section4">Abschnitt 4 - Leistungen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="section5-tab" data-bs-toggle="pill" href="#section5">Abschnitt 5 - Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="section6-tab" data-bs-toggle="pill" href="#section6">Abschnitt 6 - Kunden</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="section7-tab" data-bs-toggle="pill" href="#section7">Abschnitt 7 - Kontakt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="section8-tab" data-bs-toggle="pill" href="#section8">Abschnitt 8 - Kontakt-Formular</a>
            </li>
        </ul>
    </div>

    <!-- Inhaltsbereich für den gewählten Abschnitt -->
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane fade show active p-3 border rounded bg-white" id="section1">
                <form action="{{ route('admin.updateContent') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Überschrift</label>
                        <input type="text" name="settings[site_heading]" value="{{ $settings['site_heading']->value ?? '' }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Untertitel</label>
                        <input type="text" name="settings[site_subtitle]" value="{{ $settings['site_subtitle']->value ?? '' }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Top-Bar Text</label>
                        <input type="text" name="settings[top_bar_text]" value="{{ $settings['top_bar_text']->value ?? '' }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                </form>
            </div>

            <!-- Vorlage für weitere Abschnitte -->
            @for ($i = 2; $i <= 8; $i++)
                <div class="tab-pane fade p-3 border rounded bg-white" id="section{{ $i }}">
                    <form action="{{ route('admin.updateContent') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Speichern</button>
                    </form>
                </div>
            @endfor
        </div>
    </div>
</div>
