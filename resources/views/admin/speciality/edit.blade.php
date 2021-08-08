@extends("layouts.admin")

@section("title"," تعديل التخصص # $item->id")


@section("content")
<form method='post' action='{{route("speciality.update",$item->id)}}'>
@csrf
@method('put')
  <div class="mb-3">
    <label for="name" class="form-label">اسم التخصص</label>
    <input type="text" value='{{old('name',$item->name)}}' class="form-control" id="name" name='name'>

  </div>
  <div class="mb-3 form-check">
    <input type='hidden' name='active' value='0'/>
    <input {{old('active',$item->active)?"checked":""}} type="checkbox" class="form-check-input" value='1' name='active' id="active">
    <label class="form-check-label" for="active">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">تعديل</button>
  <a href="{{route('speciality.index')}}" class="btn btn-secondary">الغاء </a>
</form>

@endsection
