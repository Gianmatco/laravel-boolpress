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
        Sei sicuro di voler eliminare il post con id: @{{postid}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @@click="submitForm()">si cancella</button>
      </div>
    </div>
  </div>
</div>



<a href="{{route('admin.posts.create')}}" class="btn btn-primary">crea nuovo post</a>
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
      @foreach ($posts as $post)
        <tr>
          <td> <a href="{{route('admin.posts.show',$post->id)}}">{{$post->id}} </td>
          <td> <a href="{{route('admin.posts.show',$post->id)}}">{{$post->title}} </td>
          <td>{{$post->created_at}}</td>
          <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">modifica</a></td>
          <td>
            <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" @@click="openModal($event, {{$post->id}})" class="btn btn-warning delete">
                DELETE

              </button>
            </form>
          </td>
      
        </tr>
            
      @endforeach
      
    </tbody>
</table>
{{$posts->links()}}
    
@endsection