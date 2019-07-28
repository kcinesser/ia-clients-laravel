<div class="field mb-6">
    <label for="title" class="label text-sm mb-2 block">Title</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="title" value="{{ $job->title }}" required>
    </div>
</div>

<div class="field mb-6">
   <label for="site" class="label text-sm mb-2 block">Site</label>

    <div class="control">
        <select id="site_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="site_id" value="{{ old('side_id') }}" autofocus>
                <option value="">None</option>
            @foreach ($sites as $site)
                <option value="{{ $site->id }}" {{ $site->id == $job->site->id ? "selected" : "" }}>{{ $site->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>

    <div class="control">
        <textarea name="description" rows="10" class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full">{{ $job->description }}</textarea>
    </div>

    @if ($errors->has('site_id'))
        <span class="help-block">
            <strong>{{ $errors->first('site_id') }}</strong>
        </span>
    @endif
</div>

 <div class="field mb-6{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="status" class="label text-sm mb-2 block">Status</label>

    <div class="control">
        <select id="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="status" value="{{ old('status') }}" required autofocus>
            @foreach ($statuses as $value => $status)
                <option value="{{$value}}" {{ $value == $job->status ? "selected" : "" }}>{{ $status }}</option>
            @endforeach
        </select>

        @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>
</div>

 <div class="field mb-6{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="start_date" class="label text-sm mb-2 block">Start Date</label>

    <div class="control">
       <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="start_date" value="{{ $job->start_date }}">
    </div>
</div>

 <div class="field mb-6{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="end_date" class="label text-sm mb-2 block">End Date</label>

    <div class="control">
       <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="end_date" value="{{ $job->end_date }}">
    </div>
</div>

<div class="field mb-6{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="go_live_date" class="label text-sm mb-2 block">Go Live Date</label>

    <div class="control">
       <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="go_live_date" value="{{ $job->go_live_date }}">
    </div>
</div>

<div class="field mb-6">
    <label for="developer_id" class="label text-sm mb-2 block">Primary Developer</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="developer_id" value="" required>
                <option>Select Developer</option>
            @foreach($developers as $developer)
                <option value="{{ $developer->id }}" {{ $developer->id == $job->developer_id ? "selected" : "" }}>{{ $developer->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="technology" class="label text-sm mb-2 block">Technology</label>

    <div class="control">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="technology" required>
            @foreach ($technologies as $value => $technology)
                <option value="{{$value}}" {{ $value == $job->technology ? "selected" : "" }} >{{ $technology }}</option>
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