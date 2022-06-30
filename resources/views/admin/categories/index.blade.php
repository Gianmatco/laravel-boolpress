@extends('layouts.admin')

@section('content')

<div class="modal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">confirm post delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare la categoria con id: @{{itemid}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @@click="submitForm()">si cancella</button>
      </div>
    </div>
  </div>
</div>



<a href="{{route('admin.categories.create')}}" class="btn btn-primary">crea nuovo post</a>
@if (session()->has('message'))
    <div class="alert alert-success">
      {{session()->get('message')}}
    </div>
    
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">data creazione</th>
        <th scope="col">modifica</th>
        <th scope="col">cancella</th>

        
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td> <a href="{{route('admin.categories.show',$category->id)}}">{{$category->id}} </td>
          <td> <a href="{{route('admin.categories.show',$category->id)}}">{{$category->title}} </td>
          <td>{{$category->created_at}}</td>
          <td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary">modifica</a></td>
          <td>
            <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" @@click="openModal($event, {{$category->id}})" class="btn btn-warning delete">
                DELETE

              </button>
            </form>
          </td>
      
        </tr>
            
      @endforeach
      
    </tbody>
</table>
{{$categories->links()}}
    
@endsection