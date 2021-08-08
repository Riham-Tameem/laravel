@extends("layouts.admin")

@section("title","Doctor List   # $item->id")


@section("content")


    <form>
        <div class="mb-3">
            <label class="form-label">doctor</label>
            <input disabled value='{{$item->name}}' type="text" class="form-control" id="exampleInputEmail1" >
        </div>
        
        <a href="{{route('doctor.index')}}" class="btn btn-secondary">Cancel</a>
    </form>

@endsection
