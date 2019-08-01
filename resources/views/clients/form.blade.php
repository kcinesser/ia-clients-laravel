<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Name</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="name" value="{{ $client->name }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="account_manager_id" class="label text-sm mb-2 block">Account Manager</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="account_manager_id" required>
            <option value="">Select Account Manager</option>
            @foreach($account_managers as $account_manager)
                <option value="{{ $account_manager->id }}" {{ $account_manager->id == $client->account_manager_id ? "selected" : "" }}>{{ $account_manager->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="primary_name" class="label text-sm mb-2 block">Primary Contact Name</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="contact_name" value="{{ $client->contact_name }}" required>
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