<div class="field mb-6">
    <label for="title" class="label text-sm mb-2 block">Domain Name</label>

    <div class="control">
        <input type="text" name="name" value="{{ $domain->name }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="exp_date" class="label text-sm mb-2 block">Expiration Date</label>

    <div class="control">
        <input type="text" class="date-field" autocomplete="off" name="exp_date" value="{{ $domain->exp_date }}">
    </div>
</div>

<div class="field mb-6">
    <label for="registrar_id" class="label text-sm mb-2 block">Registrar</label>

    <select name="registrar_id" id="grid-state">
        @foreach ($registrars as $registrar)
            <option value="{{ $registrar->id }}" {{ $registrar->id == $domain->registrar_id ? "selected" : "" }}>{{ $registrar->name }}</option>
        @endforeach
    </select>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="button is-link mr-2">{{ $buttonText }}</button>
        <a href="{{ $cancelURL }}" class="button btn-secondary">Cancel</a>
    </div>
</div>

@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red-500">{{ $error }}</li>
        @endforeach
    </div>
@endif
