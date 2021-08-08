@extends("layouts.admin")

@section("title","ادارة الأطباء ")

@section("content")
<div class="mb-3">
<a class='btn btn-success' href='{{route("doctor.create")}}'>اضافة طبيب</a>
</div>
<form>
    <div class="row ">
        <div class="col-md-2 pr-3">
            <input type="text" class="form-control" name="q" value="{{request()->q}}" placeholder="الإسم">
        </div>
    
        <div class="col-md-2 pr-3 pl-0">
            <input type="number" class="form-control" name="mobile" 
             value="{{request()->mobile}}" placeholder="رقم الجوال">
        </div>
    
        <div class="col-md-3 pl-0 pr-3">
            <select name="city" class="form-control">
                <option value=" "> اختر المدينة </option>
                @foreach ($cities as $city)
                   <option {{old("city",request()->city)==$city->id ?'selected':''}} value="{{$city->id}}">{{$city->name}}</option> 
                @endforeach
            </select>
        </div>
        <div class="col-md-3 pl-0 pr-3">
            <select name="gender" class="form-control">
                <option value=" "> اختر الجنس </option>
                <option {{old('gender',request()->gender) =='M'?'selected':''}} value="M" > ذكر </option>
                <option {{old('gender',request()->gender)=='F' ?'selected':''}} value="F"> أنثى </option>
                
            </select>
        </div>
        <div class="col-md-1 pl-0"> 
            <input type="submit" value='بحث' class='btn btn-primary pt-2 p-b-2'  >
        </div>
        <div class="col-md-1 pl-2"> 
            <a href='{{route("doctor.index")}}' class='btn btn-primary pt-2 p-b-2'>رجوع</a>
        </div>
        
    </div>
</form>


@if($items->count())
    <table class='table table-hover'>
        <thead>
        <tr>
            <th width='1%'>#</th>
            <th>الاسم</th>
            <th>الجوال</th>
            <th>المدينة</th>
            <th>العنوان</th>
            <th>التخصص</th>
            <th width='10%'>الجنس</th>
            <th width='30%'>خيارات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->mobile}}</td>
                <td>{{$item->city->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item?->speciality?->name}}</td>
                <td>{{$item->gender=='M'?"ذكر":"انثى"}}</td>
                
                <td>
                    <form method='post' action="{{route('doctor.destroy',$item->id)}}">
                        @csrf
                        @method('delete')
                        <a href='{{route("doctor.show",$item->id)}}' class='btn btn-info'>عرض</a>
                        <a href='{{route("doctor.edit",$item->id)}}' class='btn btn-primary'>تعديل</a>

                        <input onclick='return confirm("هل أنت متأكد?")' type='submit' class='btn btn-danger' value='حذف'>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$items->links()}}
@else
    <div class='alert alert-info mt-4'>لا يوجد سجلات للعرض</div>
@endif
@endsection

