@extends("layouts.bootstrap")

@section("title","Show Post")

@section("content")

<div method='post' enctype='multipart/form-data' action='{{route("post.update",$post->id)}}'>
   
  <div class="mb-3">
    <label for="name" class="form-label">Title</label>
    <input readonly value='{{old("title",$post->title)}}' type="text" class="form-control" id="title" name='title'>
    
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input readonly value='{{old("slug",$post->slug)}}' type="text" class="form-control" id="slug" name='slug'>
    
  </div>
  
  <div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select disabled class="form-control" id="category_id" name='category_id'>
      <option value=''>Select Category</option>
      @foreach($categories as $category)
      <option {{old('category_id',$post->category_id)==$category->id?"selected":""}} value='{{$category->id}}'>{{$category->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="summary" class="form-label">Summary</label>
    <textarea type="text" readonly class="form-control" id="summary" name='summary'>{{old("summary",$post->summary)}}</textarea>
    
  </div>
  <div class="mb-3">
    <label for="details" class="form-label">Details</label>
    <textarea type="text" readonly  class="form-control" rows='10' id="details" name='details'>{{old("details",$post->details)}}</textarea>
    
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <br>
    <img src='{{asset("storage/images/".$post->image)}}' width='250' />
  </div>
  <div class="mb-3 form-check">
    <input type='hidden' name='published' value='0'/>
    <input id='published' disabled {{old("published",$post->published)?"checked":""}} type="checkbox" name='published' value='1' class="form-check-input" id="active">
    <label class="form-check-label" for="published">Published</label>
  </div>
  <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary">Edit</a>
  <a href="{{route('post.index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection