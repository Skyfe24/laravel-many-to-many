@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="border rounded mt-3">
            <h1 class="text-center mt-3">{{ $project->title }}</h1>
            <hr class="m-0">
            <div class="row justify-content-around">
                <div class="col-5 d-flex align-items-center">
                    <img src="{{ $project->cover }}" alt="{{ $project->title }}" class="img-fluid ps-4">
                </div>
                <div class="col-7 text-justify mt-3">
                    <ul class="list-group pe-4 pb-4">
                        <li class="list-group-item">
                            <h5>name</h5>
                            {{ $project->name }}
                        </li>
                        <li class="list-group-item">
                            <h5>description</h5>
                            {{ $project->description }}
                        </li>
                        <li class="list-group-item">
                            <h5>link</h5>
                            {{ $project->link }}
                        </li>
                        
                        </li>
                        @if ($project->image)
                        <img src="{{ $project->getImage() }}" alt="{{ $project->name }}">
                        @endif
                    </ul>
                </div>
            </div>
            <p style="background-color: {{ $project->tag->color }}
            "> {{ $project->tag->label }} </p>
        </div>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-4">Back</a>

    </div>
@endsection