@extends("layouts.admin")

@section("title"," تعديل بيانات مريض ")

@section("content")


<form class="form" action="{{route('patient.update',$item->id)}}" method="post" id="registrationForm"
    enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="row">

        <div class="col-sm-8">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">
                            <h5>الاسم</h5>
                        </label>
                        <input disabled type="text" class="form-control" name="name" id="name" title="enter your  name if any."
                            value="{{old('name',$item->name)}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">
                            <h5>الإيميل </h5>
                        </label>
                        <input  disabled type="email" class="form-control" name="email" id="email" title="enter your email."
                            value="{{old('email',$item->user->email)}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="mobile">
                            <h5>الجوال</h5>
                        </label>
                        <input disabled type="number" class="form-control" name="mobile" id="mobile" value="{{old('mobile',$item->mobile)}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="city_id">
                            <h5>المدينة</h5>
                        </label>
                        <input disabled type="text" class="form-control" name="city_id" id="city_id" value="{{old('city_id',$item->city->name ??'')}}">
                        {{-- <select disabled class="form-select form-control" aria-label="Default select example" name="city_id"
                            id="city_id">
                            <option value="">اختر المدينة</option>
                            @foreach($cities as $city)
                            <option {{old('city_id',$item->city_id)==$city->id?"selected":""}} value="{{$city->id}}">{{$city->name}}
                            </option>
                            @endforeach

                        </select> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="gender">
                            <h5>الجنس</h5>
                        </label>
                        <input disabled type="text" class="form-control" name="gender" id="gender" value="{{old('gender',$item->gender)}}">

                        {{-- <select disabled class="form-select form-control" aria-label="Default select example" name="gender"
                            id="gender">
                            <option value="">اختر الجنس</option>

                            <option {{old('gender',$item->gender)=='M'? 'selected': ''}} value="M">ذكر</option>
                            <option {{old('gender',$item->gender)=='F'? 'selected': ''}} value="F"> أنثى </option>


                        </select> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">
                            <h5>العنوان</h5>
                        </label>
                        <input disabled type="text" class="form-control" name="address" id="address" title="العنوان"
                            value="{{old('address',$item->address)}}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">

                        {{-- <br>
                        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                            حفظ</button>
                        <a href='{{route("patient.index")}}' class="btn btn-default" type="reset"><i class="glyphicon glyphicon-repeat"></i> إلغاء </a> --}}

                    </div>
                </div>
            </div>


        </div>
        <!--/col-9-->
        <div class="col-sm-4">
            <!--left col-->

            <div class="text-center">
                @if($item->image)
                <img style="max-height: auto;" src="{{asset('storage/images/'.$item->image)}}"  name="img" class="avatar  img-thumbnail rounded-circle" alt="avatar">
            @else
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"  name="img" class="avatar  img-thumbnail rounded-circle" alt="avatar">

            @endif
                <h4>{{auth()->user()->name}}</h4>
                {{-- <h6>حمل صورة أخرى ...</h6> --}}
                {{-- <input type="file" class="text-center center-block file-upload" name="image"> --}}
            </div>


        </div>
        <!--/col-3-->
    </div>
    <!--/row-->
</form>

@endsection
