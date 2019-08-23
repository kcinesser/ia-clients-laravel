<div class="field mb-6">
    <label for="title" class="label text-sm mb-2 block">Title <span class="required-text">*</span></label>

    <div class="control">
        <input type="text" name="title" value="{{ $job->title }}" required>
    </div>
</div>

<div class="field mb-6">
   <label for="site" class="label text-sm mb-2 block">Site</label>

    <div class="control">
        <select id="site_id" name="site_id" value="{{ old('site_id') }}">
                <option value="">None</option>
            @foreach ($sites as $site)
                <option value="{{ $site->id }}">{{ $site->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>

    <div class="control">
        <textarea name="description" rows="10">{{ $job->description }}</textarea>
    </div>

    @if ($errors->has('site_id'))
        <span class="help-block">
            <strong>{{ $errors->first('site_id') }}</strong>
        </span>
    @endif
</div>

 <div class="field mb-6{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="status" class="label text-sm mb-2 block">Status <span class="required-text">*</span></label>

    <div class="control">
        <select id="status" id="grid-state" name="status" required>
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
       <input type="text" class="date-field" autocomplete="off" name="start_date" value="{{ $job->start_date }}">
    </div>
</div>

 <div class="field mb-6{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="end_date" class="label text-sm mb-2 block">End Date</label>

    <div class="control">
       <input type="text" class="date-field" autocomplete="off" name="end_date" value="{{ $job->end_date }}">
    </div>
</div>

<div class="field mb-6{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="go_live_date" class="label text-sm mb-2 block">Go Live Date</label>

    <div class="control">
       <input type="text" name="go_live_date" class="date-field" autocomplete="off" value="{{ $job->go_live_date }}">
    </div>
</div>

<div class="field mb-6">
    <label for="developer_id" class="label text-sm mb-2 block">Primary Developer</label>

    <div class="control">
        <select name="developer_id">
                <option value="">Select Developer</option>
            @foreach($developers as $developer)
                <option value="{{ $developer->id }}" {{ $developer->id == $job->developer_id ? "selected" : "" }}>{{ $developer->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="field mb-6">
    <label for="technology" class="label text-sm mb-2 block">Technology <span class="required-text">*</span></label>

    <div class="control">
        <select name="technology">
            @foreach ($technologies as $value => $technology)
                <option value="{{$value}}" {{ $value == $job->technology ? "selected" : "" }} >{{ $technology }}</option>
            @endforeach
        </select>
    </div>
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
