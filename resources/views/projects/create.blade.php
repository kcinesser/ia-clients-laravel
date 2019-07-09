@extends('layouts.app')

@section('content')
    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <h1>Create a Project</h1>

        <div>
            <label for="title">Title</label>

            <div class="control">
                <input type="text" class="input" name="title">
            </div>
        </div>

        <div>
            <label for="description">Description</label>

            <div>
                <input type="text" name="description">
            </div>
        </div>

        <div>
            <div>
                <button type="submit">Create Project</button>
                <a href="/projects">Cancel</a>
            </div>
        </div>
    </form>
@endsection