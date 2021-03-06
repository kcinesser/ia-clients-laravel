<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Site Name <span class="required-text">*</span></label>

    <div class="control">
        <input type="text" name="name" value="" required>
    </div>
</div>

<div class="field mb-6">
    <label for="url" class="label text-sm mb-2 block">URL <span class="required-text">*</span></label>
    <div class="control">
        <input type="text" name="URL" required>
    </div>
    <p class="input-description">Must contain http:// or https://</p>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>

    <div class="control">
        <input type="text" name="description" >
    </div>
</div>

<div class="field mb-6">
    <label for="status" class="label text-sm mb-2 block">Status <span class="required-text">*</span></label>

    <div class="control">
        <select name="status" required>
            @foreach ($statuses as $value => $status)
                <option value="{{$value}}">{{ $status}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="technology" class="label text-sm mb-2 block">Technology <span class="required-text">*</span></label>

    <div class="control">
        <select name="technology" required>
            @foreach ($technologies as $value => $technology)
                <option value="{{$value}}">{{ $technology }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="services" class="label text-sm mb-2 block">Hosting <span class="required-text">*</span></label>
    @include('hosting.select', ['hosting' => App\Hosting::all()])
</div>

<div class="field mb-6">
    <label for="prev_dev" class="label text-sm mb-2 block">Previous Developers</label>
    
    <div class="control">
        <input type="text" name="prev_dev">
    </div>
</div>

<div class="field mb-6">
    <label for="services" class="label text-sm mb-2 block">Services</label>
    @include('services.form')
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
