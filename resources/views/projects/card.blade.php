<div class="card" style="height:200px;">
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-500 mb-3 pl-4">
        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
    </h3>
    <div class="text-gray-500">{{ str_limit($project->description, 10) }}</div>
</div>
