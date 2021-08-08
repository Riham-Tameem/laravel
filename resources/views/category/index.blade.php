@extends("layouts.bootstrap")

@section("title","Category List")

@section("content")

<a class='btn btn-success' href='{{route("category.create")}}'>Create New One</a>

@if($items->count())
<table class='table table-hover'>
    <thead>
        <tr>
            <th width='1%'>#</th>
            <th>Name</th>
            <th width='10%'>Active</th>
            <th width='20%'>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->active?'Active':'In Active'}}</td>
            <td>
                <form method='post' action="{{route('category.destroy',$item->id)}}">
                    @csrf
                    @method('delete')
                    <a href='{{route("category.show",$item->id)}}' class='btn btn-info'>Show</a>
                    <a href='{{route("category.edit",$item->id)}}' class='btn btn-primary'>Edit</a>

                    <input onclick='return confirm("Are you sure?")' type='submit' class='btn btn-danger' value='Delete'>
                </form>
            </td>
    
    @foreach($item as $items)
        <tr>
            <td>{{$items->id}}</td>
            <td>{{$items->name}}</td>
            <td>{{$items->active}}</td>
            <td>            
                <form method='post' action="{{route('category.destroy',$items->id)}}">
                    @csrf
                    @method('delete')
                    <a href='{{route("category.show",$items->id)}}' class='btn btn-info'>Show</a>
                    <a href='{{route("category.edit",$items->id)}}' class='btn btn-primary'>Edit</a>
                    
                    <input onclick='return confirm("Are you sure?")' type='submit' class='btn btn-danger' value='Delete'>
                    <a href='{{ route("category.delete",$items->id) }}' class='btn btn-warning btn-sm' onclick='return confirm("Are you sure?")'>Delete</a>
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
