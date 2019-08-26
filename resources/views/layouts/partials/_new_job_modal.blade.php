<div class="modal fade" id="newJobMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="field mb-6">
                        <label for="title" class="label text-sm mb-2 block">Title</label>

                        <div class="control">
                            <input type="text" name="title" value="" required>
                        </div>
                    </div>


                    <div class="field mb-6">
                       <label for="site" class="label text-sm mb-2 block">Client</label>

                        <div class="control">
                            <select id="job-client-select" name="site_id">
                                    <option value="">None</option>
                                @foreach (App\Client::all()->sortBy('name') as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="field mb-6">
                       <label for="site" class="label text-sm mb-2 block">Site (optional)</label>

                        <div class="control">
                            <select id="job-site-select" name="site_id">
                                    <option value="">None</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="description" class="label text-sm mb-2 block">Description</label>

                        <div class="control">
                            <textarea name="description" rows="10"></textarea>
                        </div>
                    </div>

                     <div class="field mb-6}">
                        <label for="status" class="label text-sm mb-2 block">Status</label>

                        <div class="control">
                            <select id="grid-state" name="status" value="{{ old('status') }}" required>
                                @foreach (App\Enums\JobStatus::toSelectArray() as $value => $status)
                                    <option value="{{$value}}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                     <div class="field mb-6">
                        <label for="start_date" class="label text-sm mb-2 block">Start Date</label>

                        <div class="control">
                           <input type="text" name="start_date">
                        </div>
                    </div>

                     <div class="field mb-6">
                        <label for="end_date" class="label text-sm mb-2 block">End Date</label>

                        <div class="control">
                           <input type="text" name="end_date" value="">
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="go_live_date" class="label text-sm mb-2 block">Go Live Date</label>

                        <div class="control">
                           <input type="text" name="go_live_date" value="">
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="developer_id" class="label text-sm mb-2 block">Primary Developer</label>

                        <div class="control">
                            <select name="developer_id" value="" required>
                                    <option>Select Developer</option>
                                @foreach(App\User::all()->where('role', 0) as $developer)
                                    <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="technology" class="label text-sm mb-2 block">Technology</label>

                        <div class="control">
                            <select name="technology" required>
                                @foreach (App\Enums\Technologies::toSelectArray() as $value => $technology)
                                    <option value="{{$value}}" >{{ $technology }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="button is-link">Create Job</button>
                    </div>


                    @if ($errors->any())
                        <div class="field mt-6">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-500">{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif


                </form>
            </div>
        </div>
    </div>
</div>
