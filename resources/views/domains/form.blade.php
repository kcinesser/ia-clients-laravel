<div class="field mb-6">
    <label for="title" class="label text-sm mb-2 block">Domain Name</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="name" value="{{ $domain->name }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="url" class="label text-sm mb-2 block">URL</label>

    <div class="control">
        <input type="text" name="url" class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full" required>{{ $account->url }}</textarea>
    </div>
</div>

<div class="field mb-6">
    <label for="url_description" class="label text-sm mb-2 block">URL Description</label>

    <div class="control">
        <input type="text" name="url_description" class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full" required>{{ $account->description }}</textarea>
    </div>
</div>

<div class="field mb-6">
    <label for="domain_owner" class="label text-sm mb-2 block">Who owns the account?</label>


    <div class="control">
        <select id="domain_owner" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="domain_owner" value="{{ old('domain_wner') }}" required autofocus>
            @foreach ($owners as $value => $owner)
                <option value="{{$value}}" >{{ $owner }}</option>
            @endforeach
        </select>

        @if ($errors->has('owner'))
            <span class="help-block">
                <strong>{{ $errors->first('owner') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Expiration Date</label>

    <div class="control">
        <input type="text" name="exp_date"S class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full" required>{{ $domain->exp_date }}</textarea>
    </div>
</div>

<div class="field mb-6">
    <label for="registrar_id" class="label text-sm mb-2 block">Registrar</label>

    <select name="registrar_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
        @foreach ($registrars as $registrar)
            <option value="{{ $registrar->id }}">{{ $registrar->name }}</option>
        @endforeach
    </select>
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