<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Name</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="name" value="{{ $client->name }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="primary_email" class="label text-sm mb-2 block">Primary Contact Email</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="contact_email" value="{{ $client->contact_email }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="primary_phone" class="label text-sm mb-2 block">Primary Contact Phone</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="contact_phone" value="{{ $client->contact_phone }}" required>
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="button is-link mr-2">{{ $buttonText }}</button>
        <a href="{{ $cancelURL }}" class="button">Cancel</a>
    </div>
</div>

@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red-500">{{ $error }}</li>
        @endforeach
    </div>
@endif