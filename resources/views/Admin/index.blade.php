@extends('layouts.app')

@section('content')
  
  <div class="d-flex justify-content-end mt-3">
    <a class="btn btn-primary" href="{{ route('projects.create')}}" >Create</a>
  </div>
  <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">name</th>
        
        
        <th scope="col">description</th>
        
        <th scope="col">link</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
        <tr>
          <th>{{ $project->name }}</th>
          <td>{{ $project->created_at }}</td>
          <td>{{ $project->updated_at }}</td>
          <td>
            <div class="d-flex justify-content-end">
              <a class="btn btn-success" href="{{ route('projects.show', $project) }}">Details</a>
              <a class="btn btn-warning mx-3" href="{{ route('projects.edit', $project) }}">Edit</a>
              <form action="{{ route('projects.destroy', $project) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
              