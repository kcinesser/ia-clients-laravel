<div class="modal fade" id="newSiteMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Site</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="field mb-6">
                        <label for="name" class="label text-sm mb-2 block">Site Name</label>

                        <div class="control">
                            <input type="text" name="name" required>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="url" class="label text-sm mb-2 block">URL (optional)</label>

                        <div class="control">
                            <input type="text" name="URL">
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="client" class="label text-sm mb-2 block">Client</label>

                        <div class="control">
                            <select id="site-client-select" name="client">
                                    <option>Select Client</option>
                                    @foreach(App\Client::all()->sortBy('name') as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="registrar" class="label text-sm mb-2 block">Where is the site registered? (optional)</label>

                        <div class="control">
                            <select name="registrar" required>
                                    <option>Select Registrar</option>
                                @foreach(App\Registrar::all() as $registrar)
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
                            <input type="text" name="description" >
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="status" class="label text-sm mb-2 block">Status</label>

                        <div class="control">
                            <select name="status" required>
                                @foreach (App\Enums\SiteStatus::toSelectArray() as $value => $status)
                                    <option value="{{$value}}">{{ $status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="technology" class="label text-sm mb-2 block">Technology</label>

                        <div class="control">
                            <select name="technology" required>
                                @foreach (App\Enums\Technologies::toSelectArray() as $value => $technology)
                                    <option value="{{$value}}">{{ $technology }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="services" class="label text-sm mb-2 block">Hosting</label>

                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="host_id" required>
                            @foreach(App\Hosting::all() as $host)
                                <option value="{{$host->id}}">{{$host->name}} ({{\App\Enums\Owners::getKey($host->owner)}})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field mb-6">
                        <label for="prev_dev" class="label text-sm mb-2 block">Previous Developers</label>
                        
                        <div class="control">
                            <input type="text" name="prev_dev">
                        </div>
                    </div>


                    <div class="field mb-6">
                        <label for="services" class="label text-sm mb-2 block">Services</label>
                            @foreach(App\Service::all() as $service)
                                    <div>
                                        <input id="service-{{$service->id}}" type="checkbox" name="services[]" value="{{$service->id}}">
                                        <label class="text-gray-800 text-sm font-normal" for="service-{{$service->id}}">{{$service->name}}</label>
                                    </div>
                            @endforeach                   
                    </div>

                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="button is-link mr-2">Create Site</button>
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