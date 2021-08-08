@extends("layouts.admin")

@section("title","User List   # $item->id")


@section("content")


    <form>

        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">
                        <h5>الاسم</h5>
                    </label>
                    <input disabled type="text" class="form-control" name="name" id="name" title="enter your  name if any."
                        value="{{$item->name}}">
                </div>
    
                <div class="form-group">
                    <label for="email">
                        <h5>الإيميل </h5>
                    </label>
                    <input disabled type="email" class="form-control" name="email" id="email" title="enter your email."
                        value="{{$item->email}}">
                </div>
    
                <div class="form-group">
                    <label for="password">
                        <h5>كلمة المرور  </h5>
                    </label>
                    <input disabled type="password" class="form-control" name="password" id="password" title="enter your password."
                        value="{{$item->password}}">
                </div>
              
    
                <a href="{{route('user.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
            <!--/col-9-->
    
    
            </div>
            <!--/col-3-->
        </div>
        
      
    </form>

@endsection
