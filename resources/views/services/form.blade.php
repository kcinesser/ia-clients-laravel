@foreach($services as $service)
        <?php $checked = in_array($service->id, $site->services->pluck('id')->all()) ? ' checked' : '';?>
        <div>
            <input id="service-{{$service->id}}"type="checkbox" name="services[]" value="{{$service->id}}"<?=$checked?>>
            <label class="text-gray-800 text-sm font-normal" for="service-{{$service->id}}">{{$service->name}}</label>
        </div>
@endforeach