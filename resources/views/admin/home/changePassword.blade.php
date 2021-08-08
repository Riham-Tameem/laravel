@extends("layouts.admin")

@section("title","تغيير كلمة المرور   ")

@section("content")

    <form class="form" action="{{route('admin.changepass')}}" method="post" id="registrationForm"
          enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-sm-8">

                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="name">
                                <h5>ادخل كلمة المرور القديمة </h5>
                            </label>
                            <input type="password" class="form-control" name="old_password" id="password"
                                  >
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="email">
                                <h5>ادخل كلمة المرور الجديدة  </h5>
                            </label>
                            <input type="password" class="form-control" name="new_password" id="new_password"
                           >
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="email">
                                <h5>  Confirm Password   </h5>
                            </label>
                            <input type="password" class="form-control" name="new_password_confirmation" id="confirm_password"
                           >
                        </div>
                    </div>
                    <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">update Password</button>

                  
                    </div>
                </div>
            </div>

        </div>
    </form>


@endsection


