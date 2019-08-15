<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Site Name</label>

    <div class="control">
        <input type="text" name="name" value="{{ $site->name }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="url" class="label text-sm mb-2 block">URL (optional)</label>

    <div class="control">
        <input type="text" name="URL">
    </div>
</div>

<div class="field mb-6">
    <label for="registrar" class="label text-sm mb-2 block">Where is the site registered? (optional)</label>

    <div class="control">
        <select name="registrar">
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
        <input type="text" name="exp_date">
    </div>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>

    <div class="control">
        <input type="text" name="description" >{{ $site->description }}</textarea>
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
    <label for="services" class="label text-sm mb-2 block">Services</label>
    @include('services.form')
</div>

<div class="modal-footer">
    <a href="" class="button btn-blue" data-dismiss="modal">Cancel</a>
    <button type="submit" class="button is-link mr-2">{{ $buttonText }}</button>
</div>


@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red-500">{{ $error }}</li>
        @endforeach
    </div>
@endif
