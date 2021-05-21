

@extends('layouts.app1')


@section('content')
  <div class="container mt-5" id="parent">
      <div class="row">

          @foreach ($tasks as $task)
          
           <div class="card border-primary mb-3 col-md-3 mr-5 text-center" >
             
              <div class="card-header"><h3 class="text-secondary">{{$task->title}}</h3></div>
              <div class="card-body text-primary">

                @foreach ($task->sub_tasks as $sub)
                <div class="d-flex justify-content-between">
                <p class="card-text">
                  {{$sub->content}}
                </p> 
<div class="d-flex">
                <form action="{{route('deleteSubTask',['id'=>$sub->id])}}" method="post">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger float-right mr-1">
                    <i class="fa fa-trash"></i>
                  </button>

                </form>

                <div>
                <button class="btn btn-warning here"><i class="fa fa-edit"></i></button>
                
                </div>



                 <form action="{{route('updateSubTask',['id'=>$sub->id])}}" method="post" class="d-none">
                  
                  @csrf
                  @method('PUT')

                  <button class="btn btn-success btn-sm fa fa-edit mx-1 "></button>
                  <input type="text" class=""  value="{{$sub->content}}" name="content"> 
                  
                </form>


</div>

               

              </div>
                @endforeach
            </div>
              <form action="{{route('saveSubTask')}}" method="post">
                @csrf
                  <div class="form-group">
                      <input name="content" type="text" placeholder="add sub task" class="form-control mt-2">
                      <input type="hidden" value="{{$task->id}}" name="task_id">
                      <button class="btn btn-primary form-control mt-1">add</button>
                  </div>
              </form>

              <form action="{{route('deleteTask',['id'=>$task->id])}}" method="post">
                @csrf
                @method("DELETE")
                <div class="form-group">
                    <button class="btn btn-danger form-control mt-1">delete</button>
                </div>
            </form>


            <form action="{{route('updateTask',['id'=>$task->id])}}" method="post">
              @csrf
              @method("PUT")
              <div class="form-group">
                  <button class="btn btn-warning form-control mt-1">update</button>
              </div>
          </form>
            </div>
          
          @endforeach

      </div>
  </div>  
<script>
document.querySelector('#parent').addEventListener('click',(event)=>{
  let change=event.target.classList.contains('here');
  if(change){
    event.target.classList.add('d-none');
    event.target.parentElement.nextElementSibling.classList.toggle('d-none');
  }
})

</script>
@endsection