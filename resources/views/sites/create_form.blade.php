<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Site Name</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="name" value="{{ $site->name }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="url" class="label text-sm mb-2 block">URL (optional)</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="URL">
    </div>
</div>

<div class="field mb-6">
    <label for="registrar" class="label text-sm mb-2 block">Where is the site registered? (optional)</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="registrar">
                <option>Select Registrar</option>
            @foreach($registrars as $registrar)
                <option value="{{ $registrar->id }}">{{ $registrar->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="exp_date" class="label text-sm mb-2 block">When does the domain expire? (optional)</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="exp_date">
    </div>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>

    <div class="control">
        <input type="text" name="description" class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full">{{ $site->description }}</textarea>
    </div>
</div>

<div class="field mb-6">
    <label for="status" class="label text-sm mb-2 block">Status</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="status" required>
            @foreach ($statuses as $value => $status)
                <option value="{{$value}}" {{ $value == $site->status ? "selected" : "" }} >{{ $status}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="technology" class="label text-sm mb-2 block">Technology</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="technology" required>
            @foreach ($technologies as $value => $technology)
                <option value="{{$value}}" {{ $value == $site->technology ? "selected" : "" }} >{{ $technology }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="services" class="label text-sm mb-2 block">Hosting</label>
    @include('hosting.select')
</div>

<div class="field mb-6">
    <label for="services" class="label text-sm mb-2 block">Services</label>
    @include('services.form')
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