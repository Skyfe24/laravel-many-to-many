@extends('layouts.app')


@section('content')
    <div class="container mt-5">

        <table class="table">
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
                        <th scope="row">{{ $project->nameid }}</th>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->link }}</td>
                        
                        <td class="d-flex align-items-center justify-content-end">
                            
                            <form action="{{ route('projects.destroy', $project) }}" method="Post" class="delete-form ms-2"
                                data-name="{{ $project->name }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach

            </tbody>
        </table>
        <div class="container d-flex justify-content-between">
            
            
        </div>
    </div>
@endsection