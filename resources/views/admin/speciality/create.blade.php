@extends("layouts.admin")

@section("title","  اضافة تخصص ")

@section("content")

<form method='post' action='{{route("speciality.store")}}'>
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">التخصص</label>
    <input value='{{old("name")}}' type="text" class="form-control" id="name" name='name'>

  </div>
  <div class="mb-3 form-check">
    <input type='hidden' name='active' value='0'/>
    <input {{old("active")?"checked":""}} type="checkbox" name='active' value='1' class="form-check-input" id="active">
    <label class="form-check-label" for="active">Active </label>
  </div>
  <button type="submit" class="btn btn-primary">اضافة</button>
  <a href="{{route('speciality.index')}}" class="btn btn-secondary">الغاء</a>
</form>

@endsection
