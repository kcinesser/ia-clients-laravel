<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">URL <span class="required-text">*</span></label>

    <div class="control">
        <input type="text" name="name" value="" required>
    </div>
</div>

<div class="field mb-6">
    <label for="exp_date" class="label text-sm mb-2 block">Expiration Date </label>

    <div class="control">

        <input type="text" class="date-field" autocomplete="off" name="exp_date" value="">

    </div>
</div>

<div class="field mb-6">
    <label for="registrar_id" class="label text-sm mb-2 block">Registrar <span class="required-text">*</span></label>

    <select name="registrar_id" id="grid-state">
        @foreach ($registrars as $registrar)
            <option value="{{ $registrar->id }}" >{{ $registrar->name }}</option>
        @endforeach
    </select>
</div>

<div class="modal-footer">
    <a href="" class="button btn-blue" data-dismiss="modal">Cancel</a>
    <button type="submit" class="button is-link">{{ $buttonText }}</button>
</div>

@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red-500">{{ $error }}</li>
        @endforeach
    </div>
@endif
