@extends("layouts.bootstrap")

@section("title","Show Category # $item->id")

@section("content")


<form>
<div class="mb-3">
    <label for="name" class="form-label">Category</label>
    <input type="text" class="form-control" id="name" value='{{$item->name}}' name='name' aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 form-check">
    <input  {{$item->active?"checked":""}} type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" >Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
  <a href="{{route('category.index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection