<select name="host_id" required>
    @foreach($hosting as $host)
        <?php $selected = $host->id == $site->host_id ? ' selected' : '';?>
        <option value="{{$host->id}}"<?=$selected?>>{{$host->name}} ({{\App\Enums\Owners::getKey($host->owner)}})</option>
    @endforeach
</select>
