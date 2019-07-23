<div class="field mb-6">
    <label for="title" class="label text-sm mb-2 block">Title</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="title" value="{{ $project->title }}" required>
    </div>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>

    <div class="control">
        <textarea name="description" rows="10" class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full" required>{{ $project->description }}</textarea>
    </div>
</div>

<div class="field mb-6">
    <label for="developer_id" class="label text-sm mb-2 block">Primary Developer</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="developer_id" value="" required>
                <option>Select Developer</option>
            @foreach($developers as $developer)
                <option value="{{ $developer->id }}" {{ $developer->id == $project->developer_id ? "selected" : "" }}>{{ $developer->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="service" class="label text-sm mb-2 block">Service</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="service_id" required>
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="technology" class="label text-sm mb-2 block">Technology</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="technology" required>
            @foreach ($technologies as $value => $technology)
                <option value="{{$value}}" {{ $value == $project->technology ? "selected" : "" }} >{{ $technology }}</option>
            @endforeach
        </select>
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