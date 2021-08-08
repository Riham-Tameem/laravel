@extends("layouts.bootstrap")

@section("title","Edit Category ")

@section("content")

<form method='post' action='{{asset("category".$itemss->id)}}'>
@csrf
@method('put')
<div class="mb-3">
    <label for="name" class="form-label">Category</label>
    <input type="text" class="form-control" id="name" value='{{ old('name',$itemss->name) }}' name='name' aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 form-check">
    <input  {{$itemss->active=='1'?"checked":""}} type="checkbox" class="form-check-input" id="exampleCheck1" value='{{"$itemss->active"}}'>
    <label class="form-check-label" for="exampleCheck1">Active</label>
<form method='post' action='{{route("category.update",$item->id)}}'>
@csrf
@method('put')
  <div class="mb-3">
    <label for="name" class="form-label">Category</label>
    <input type="text" value='{{old('name',$item->name)}}' class="form-control" id="name" name='name'>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 form-check">
    <input type='hidden' name='active' value='0'/>
    <input {{old('active',$item->active)?"checked":""}} type="checkbox" class="form-check-input" value='1' name='active' id="active">
    <label class="form-check-label" for="active">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="{{route('category.index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection