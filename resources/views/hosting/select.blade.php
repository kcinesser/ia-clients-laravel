<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="host_id" required>
    @foreach($hosting as $host)
        <?php $selected = $host->id == $site->host_id ? ' selected' : '';?>
        <option value="{{$host->id}}"<?=$selected?>>{{$host->name}} ({{\App\Enums\Owners::getKey($host->owner)}})</option>
    @endforeach
</select>
