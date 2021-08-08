@extends("layouts.bootstrap")

@section("title","Create Post")

@section("content")

<form method='post' enctype='multipart/form-data' action='{{route("post.store")}}'>
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Title</label>
    <input autofocus value='{{old("title")}}' type="text" class="form-control" id="title" name='title'>
    
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input  value='{{old("slug")}}' type="text" class="form-control" id="slug" name='slug'>
    
  </div>
  
  <div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select class="form-control" id="category_id" name='category_id'>
      <option value=''>Select Category</option>
      @foreach($categories as $category)
      <option {{old('category_id')==$category->id?"selected":""}} value='{{$category->id}}'>{{$category->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="summary" class="form-label">Summary</label>
    <textarea type="text" class="form-control" id="summary" name='summary'>{{old("summary")}}</textarea>
    
  </div>
  <div class="mb-3">
    <label for="details" class="form-label">Details</label>
    <textarea type="text"  class="form-control" rows='10' id="details" name='details'>{{old("details")}}</textarea>
    
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name='image'>
    
  </div>
  <div class="mb-3 form-check">
    <input type='hidden' name='published' value='0'/>
    <input id='published' {{old("published")?"checked":""}} type="checkbox" name='published' value='1' class="form-check-input" id="active">
    <label class="form-check-label" for="published">Published</label>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
  <a href="{{route('post.index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection