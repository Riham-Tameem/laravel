@extends("layouts.admin")

@section("title"," عرض التخصص   # $item->id")


@section("content")


    <form>
        <div class="mb-3">
            <label class="form-label">التخصص</label>
            <input disabled value='{{$item->name}}' type="text" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" disabled {{$item->active?"checked":""}} class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">الحالة</label>
        </div>
        <a href="{{route('speciality.index')}}" class="btn btn-secondary">الغاء</a>
    </form>

@endsection
