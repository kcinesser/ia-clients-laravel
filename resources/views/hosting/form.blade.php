<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Name <span class="required-text">*</span></label>

    <div class="control">
        <input id="name" type="text" value="" name="name" required>
    </div>
</div>

<div class="field mb-6">
    <label for="details" class="label text-sm mb-2 block">Details</label>

    <div class="control">
        <textarea id="details" name="details" rows="10"></textarea>
    </div>
</div>

<div class="field mb-6">
    <label for="owner" class="label text-sm mb-2 block">Owner <span class="required-text">*</span></label>

    <div class="control">
        <select id="owner" name="owner" required>
            @foreach ($owners as $value => $owner)
                <option value="{{$value}}">{{ $owner }}</option>
            @endforeach
        </select>
    </div>
</div>
