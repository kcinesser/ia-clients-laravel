<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Site Name</label>

    <div class="control">
        <input type="text" name="name" value="{{ $site->name }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>

    <div class="control">
        <input type="text" name="description">{{ $site->description }}</textarea>
    </div>
</div>

<div class="field mb-6">
    <label for="status" class="label text-sm mb-2 block">Status</label>

    <div class="control">
        <select name="status" required>
            @foreach ($statuses as $value => $status)
                <option value="{{$value}}" {{ $value == $site->status ? "selected" : "" }} >{{ $status}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="technology" class="label text-sm mb-2 block">Technology</label>

    <div class="control">
        <select name="technology" required>
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
