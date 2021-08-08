@extends("layouts.bootstrap")

@section("title","Create Category")

@section("content")

<form method='post' action='{{route("category.store")}}'>
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Category</label>
    <input value='{{old("name")}}' type="text" class="form-control" id="name" name='name'>
    
  </div>
  <div class="mb-3 form-check">
    <input type='hidden' name='active' value='0'/>
    <input {{old("active")?"checked":""}} type="checkbox" name='active' value='1' class="form-check-input" id="active">
    <label class="form-check-label" for="active">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
  <a href="{{route('category.index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection