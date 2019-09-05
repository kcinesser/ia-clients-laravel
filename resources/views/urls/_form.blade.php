<div class="field mb-6">
    <label for="url" class="label text-sm mb-2 block">URL <span class="required-text">*</span></label>

    <div class="control">
        <input type="text" name="url" required>
    </div>
</div>

<div class="field mb-6">
    <label for="environment" class="label text-sm mb-2 block">Environment <span class="required-text">*</span></label>

    <div class="control">
        <select name="environment" required>
            @foreach ($environments as $value => $environment)
                <option value="{{$value}}">{{ $environment }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="type" class="label text-sm mb-2 block">Type<span class="required-text">*</span></label>

    <div class="control">
        <select name="type" required>
            @foreach ($types as $value => $type)
                <option value="{{$value}}">{{ $type }}</option>
            @endforeach
        </select>
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
