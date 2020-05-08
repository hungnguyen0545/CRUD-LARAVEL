@extends('main_template')

@push('styles')
<link href="{{ asset('/css/todolist.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success')}}
</div>
@endif
<div class='box'>
<h1 class="title"> To Do List App </h1>
<h3 class="sub-title"> write anything you want to note </h3>

<form class='form-create' method='POST' action="{{ route('todolists.store')}} ">
@csrf
@method('POST')
<div class="form-group todolist-form">
     <input type="text" class="form-control content " name="content" placeholder="ex : Write anything you want ..."
    value="">
    <button type = "submit" class="btn btn-primary btn-submit"> Save </button>
</div>
</form>

<h1 class="list-items-to-do">
    LISTS ITEMS NEED TO DO : 
</h1>
<div class="show-to-do-list">
   @foreach($listItems as $item)
   <div class="to-do-item">
       <form class='form form-edit' action="{{ route('todolists.update', $item->id)}}" method='POST'>
                @csrf
                @method('PUT')
                @if($item->completed == 0)
                    <input type="text" class= "form-control item-content" name='content' placeholder="learn about Laravel "
                    value='{{ $item->content }}' >
                    <button type='submit' class="btn btn-success btn-edit">
                        <i class="fa fa-edit"></i>
                    </button>
                @elseif($item->completed == 1)
                     <input type="text" class= "form-control item-content" name='content' placeholder="learn about Laravel "
                    value='{{ $item->content }}' disabled>
                @endif  
                
       </form>
        <form class='form form-del' method="POST" action="{{ route('todolists.delete', $item->id) }}">
               @csrf
               @method('DELETE')
                <button type="submit" class="btn btn-danger btn-delete">
                    <i class="fa fa-trash"></i>
                </button>
        </form> 
        @if($item->completed == 0)
       <form class='form form-completed' method="POST" action="{{ route('todolists.complete', $item->id) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary btn-complete">
                    <i class="fa fa-check"></i>
                </button>
       </form>
       @endif
    </div>
   @endforeach
</div>
</div>
@endsection
