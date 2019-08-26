<div class="field mb-6">
    <label for="name" class="label text-sm mb-2 block">Name <span class="required-text">*</span></label>

    <div class="control">
        <input id="name" type="text" value="" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="name" required>
    </div>
</div>

<div class="field mb-6">
    <label for="details" class="label text-sm mb-2 block">Details</label>

    <div class="control">
        <textarea id="details" name="details" rows="10" class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full"></textarea>
    </div>
</div>

<div class="field mb-6">
    <label for="owner" class="label text-sm mb-2 block">Owner <span class="required-text">*</span></label>

    <div class="control">
        <select id="owner" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="owner" required>
            @foreach ($owners as $value => $owner)
                <option value="{{$value}}">{{ $owner }}</option>
            @endforeach
        </select>
    </div>
</div>