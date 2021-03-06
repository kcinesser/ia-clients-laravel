<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Name <span class="required-text">*</span></label>

    <div class="control">
        <input type="text" name="name" value="{{ $client->name }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="account_manager_id" class="label text-sm mb-2 block">Account Manager <span class="required-text">*</span></label>

    <div class="control">
        <select name="account_manager_id" required>
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
        <input type="text" name="contact_name" value="{{ $client->contact_name }}">
    </div>
</div>

<div class="field mb-6">
    <label for="primary_email" class="label text-sm mb-2 block">Primary Contact Email</label>

    <div class="control">
        <input type="text"  name="contact_email" value="{{ $client->contact_email }}">
    </div>
</div>

<div class="field mb-6">
    <label for="primary_phone" class="label text-sm mb-2 block">Primary Contact Phone</label>

    <div class="control">
        <input type="text" name="contact_phone" value="{{ $client->contact_phone }}">
    </div>
</div>

<div class="field mb-6{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="status" class="label text-sm mb-2 block">Status <span class="required-text">*</span></label>

    <div class="control">
        <select id="status" id="grid-state" name="status" value="{{ old('status') }}" required>
            @foreach ($statuses as $value => $status)
                <option value="{{$value}}" {{ $value == $client->status ? "selected" : "" }}>{{ $status }}</option>
            @endforeach
        </select>

        @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="field mb-6{{ $errors->has('enterprise_client_id') ? ' has-error' : '' }}">
    <label for="enterprise_client_id" class="label text-sm mb-2 block">Enterprise Client ID</label>

    <div class="control">
        <input type="text" name="enterprise_client_id" value="{{ $client->enterprise_client_id }}">
    </div>
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
