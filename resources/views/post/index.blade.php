@extends("layouts.bootstrap")

@section("title","Post List")

@section("content")

<form class='row'>
    <div class='col-sm-3'>
        <input class='form-control' autofocus value='{{request()->q??''}}' name='q' type='text' placeholder='Enter your search' />
    </div>
    <div class='col-sm-2'>
        <select name='published' class='form-control'>
            <option value=''>Any Status</option>
            <option {{request()->published?'selected':''}} value='1'>Published</option>
            <option {{request()->published=='0'?'selected':''}} value='0'>Unpublished</option>
        </select>
    </div>

   <div class="col-sm-3">
        <select class="form-control" id="category_id"  name='category_id'>
            <option value=''>Any Category </option>
            @foreach($categories as $category)
                <option {{old('category_id',request()->category_id)==$category->id?"selected":""}}  value='{{$category->id}}' > {{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class='col-sm-1'>
        <input type='submit' Value='Search' class='btn btn-primary' />
    </div>
    <div class='col-sm-1'>
        <a class='btn btn-success' href='{{route("post.create")}}'>Create</a>
    </div>
</form>
@if($items->count())
<table class='table table-hover'>
    <thead>
        <tr>
            <th width='1%'>#</th>
            <th>Title</th>
            <th width='10%'>Category</th>
            <th width='10%'>Published</th>
            <th width='20%'>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item?->category?->name}}</td>
            <td>{{$item->published?'Published':'Not Published'}}</td>
            <td>
                <form method='post' action="{{route('post.destroy',$item->id)}}">
                    @csrf
                    @method('delete')
                    <a href='{{route("post.show",$item->id)}}' class='btn btn-info'>Show</a>
                    <a href='{{route("post.edit",$item->id)}}' class='btn btn-primary'>Edit</a>

                    <input onclick='return confirm("Are you sure?")' type='submit' class='btn btn-danger' value='Delete'>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$items->links()}}
@else
<div class='alert alert-info mt-4'>There is no items to show</div>
@endif
@endsection
