<div class="card mb-3">
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-500 mb-3 pl-4">
        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
    </h3>
	<div class="mb-3">
		<p class="text-gray-800 text-sm font-normal">Description</p>
    	<p class="text-gray-500 text-sm font-normal">{{ $project->description }}</p>
    </div>
	<div class="mb-3">
		<p class="text-gray-800 text-sm font-normal">Technology</p>
    	<p class="text-gray-500 text-sm font-normal">{{ \App\Enums\Technologies::getDescription($project->technology) }}</p>
    </div>
</div>
