<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Name <span class="required-text">*</span></label>
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
    <label for="site_id" class="label text-sm mb-2 block">Site</label>

    <select name="site_id">
        <option value="">Select Site</option>
        @foreach($client->sites as $client_site)
            <option value="{{ $client_site->id }}">{{ $client_site->name }}</option>
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
