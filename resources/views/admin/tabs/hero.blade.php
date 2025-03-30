<form action="{{ route('admin.updateContent') }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="tab" value="{{ request('tab', 'hero') }}">
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
