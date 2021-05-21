
@extends('layouts.app1')


@section('content')

    
    <form action="{{route('editTask',['id'=>$tasks->id])}}" method="post" >
        @csrf
        @method('PUT')
        
<div class="form-group col-md-6 offset-3">
    <input class="form-control" type="text"name="title" placeholder="edit task" value="{{$tasks->title}}">

    <button class="btn btn-primary form-control m-2 ">Save</button>
</div>
    </form>

@endsection