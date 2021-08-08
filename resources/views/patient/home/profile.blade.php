@extends("layouts.base")

@section("aside")
    @include("layouts.components.patient-menu")
@endsection

@section("title","الصفحة الشخصية")

@section('css')
    <style>
        body{
            text-align: right;
            font-family: Roboto !important;
            /*font-size: 1.55rem !important;*/
        }
        h4,h5{
            font-family: Roboto !important;
            font-size: 1.55rem !important;
            font-weight: 400;
        }
        .img-thumbnail{
            width: 200px;
            height: 200px;
            max-height: 100%;
        }
        .m-content{
            max-width: 1050px;
        }
        .form-control{
            font-size: 1.1rem;
        }
    </style>
@endsection

@section('content')

    <section>
        <div class="container bootstrap snippet">
            @include('layouts.msg')

            @if(isset($items) && !$items->isEmpty())
                <form class="form" action="{{route('profile.update',auth()->user()->id)}}" method="post" id="registrationForm" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @foreach($items as $item)

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name"><h5>الاسم</h5></label>
                                            <input  type="text" class="form-control" name="name" id="name"  title="enter your  name if any."
                                                    value="{{old('name',auth()->user()->name)}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email"><h5>الإيميل </h5></label>
                                            <input  type="email" class="form-control" name="email" id="email"  title="enter your email."
                                                    value="{{old('name',auth()->user()->email)}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="mobile"><h5>الجوال</h5></label>
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                   value="{{old('mobile',$item->mobile)}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="city_id"><h5>المدينة</h5></label>

                                            <select class="form-select form-control" aria-label="Default select example"
                                                    name="city_id" id="city_id">
                                                <option value="">اختر المدينة</option>
                                                @foreach($cities as $city)
                                                    <option  {{old('city_id',$item->city_id)==$city->id?"selected":""}} value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender"><h5>الجنس</h5></label>
                                            <select class="form-select form-control" aria-label="Default select example" name="gender" id="gender">
                                                <option value="">اختر الجنس</option>

                                                <option {{old('gender',$item->gender)=='M'? 'selected': ''}} value="M">ذكر</option>
                                                <option  {{old('gender',$item->gender)=='F'? 'selected': ''}} value="F"> أنثى </option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address"><h5>العنوان</h5></label>
                                            <input type="text" class="form-control" name="address" id="address"  title="العنوان"
                                                   value="{{old('address',$item->address)}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">

                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> تعديل </button>
                                            {{--                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> إلغاء </button>--}}

                                        </div>
                                    </div>
                                </div>


                            </div><!--/col-9-->
                            <div class="col-sm-4"><!--left col-->

                                <div class="text-center">
                                    @if($item->image)
                                        <img src="{{asset('storage/'.$item->image)}}"  name="img" class="avatar  img-thumbnail rounded-circle" alt="avatar">
                                    @else
                                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"  name="img" class="avatar  img-thumbnail rounded-circle" alt="avatar">

                                    @endif
                                    <h4>{{auth()->user()->name}}</h4>
                                    <h6>حمل صورة أخرى ...</h6>
                                    <input type="file" class="text-center center-block file-upload" name="imgFile">
                                </div>


                            </div><!--/col-3-->

                        </div><!--/row-->
                    @endforeach
                </form>
            @else
                <form class="form" action="{{route('profile.store')}}" method="post" id="registrationForm" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">

                        <div class="col-sm-8">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name"><h5>الاسم</h5></label>
                                        <input  type="text" class="form-control" name="name" id="name"  title="enter your  name if any."
                                                value="{{old('name',auth()->user()->name)}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email"><h5>الإيميل </h5></label>
                                        <input  type="email" class="form-control" name="email" id="email"  title="enter your email."
                                                value="{{old('email',auth()->user()->email)}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile"><h5>الجوال</h5></label>
                                        <input type="number" class="form-control" name="mobile" id="mobile"
                                               value="{{old('mobile')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="city_id"><h5>المدينة</h5></label>

                                        <select class="form-select form-control" aria-label="Default select example"
                                                name="city_id" id="city_id">
                                            <option value="">اختر المدينة</option>
                                            @foreach($cities as $city)
                                                <option  {{old('city_id')==$city->id?"selected":""}} value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gender"><h5>الجنس</h5></label>
                                        <select class="form-select form-control" aria-label="Default select example" name="gender" id="gender">
                                            <option value="">اختر الجنس</option>

                                            <option {{old('gender')=='M'? 'selected': ''}} value="M">ذكر</option>
                                            <option  {{old('gender')=='F'? 'selected': ''}} value="F"> أنثى </option>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address"><h5>العنوان</h5></label>
                                        <input type="text" class="form-control" name="address" id="address"  title="العنوان"
                                               value="{{old('address')}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
                                        {{--                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> إلغاء </button>--}}

                                    </div>
                                </div>
                            </div>


                        </div><!--/col-9-->
                        <div class="col-sm-4"><!--left col-->

                            <div class="text-center">
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"  name="img" class="avatar  img-thumbnail rounded-circle" alt="avatar">
                                <h4>{{auth()->user()->name}}</h4>
                                <h6>حمل صورة أخرى ...</h6>
                                <input type="file" class="text-center center-block file-upload" name="imgFile">
                            </div>


                        </div><!--/col-3-->
                    </div><!--/row-->
                </form>
            @endif
        </div>
    </section>

@endsection


