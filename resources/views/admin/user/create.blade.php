@extends("layouts.admin")

@section("title"," اضافة مستخدم كمدير ")

@section("content")


<form class="form" action="{{route('user.store')}}" method="post" id="registrationForm"
    enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">
                    <h5>الاسم</h5>
                </label>
                <input type="text" class="form-control" name="name" id="name" title="enter your  name if any."
                    value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="email">
                    <h5>الإيميل </h5>
                </label>
                <input type="email" class="form-control" name="email" id="email" title="enter your email."
                    value="{{old('email')}}">
            </div>

            <div class="form-group">
                <label for="password">
                    <h5>كلمة المرور  </h5>
                </label>
                <input type="password" class="form-control" name="password" id="password" title="enter your password."
                    value="{{old('password')}}">
            </div>
            <div class="form-group">

                <br>
                <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                    حفظ</button>
                <a href='{{route("doctor.index")}}' class="btn btn-default" type="reset"><i class="glyphicon glyphicon-repeat"></i> إلغاء </a>

            </div>


        </div>
        <!--/col-9-->


        </div>
        <!--/col-3-->
    </div>
    <!--/row-->
</form>

@endsection