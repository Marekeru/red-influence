<form action="{{ route('admin.updateContent') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type="hidden" name="tab" value="{{ request('tab', 'about') }}">
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
