@extends("layouts.admin")

@section("title"," صلاحيات المستخدم ")

@section("content")


<form class="form" action="{{route('user.post-links',$item->id)}}" method="post" id="registrationForm"
    enctype="multipart/form-data">
    @csrf
    <ul class='list-unstyled'>
        @foreach($links->where('parent_id',0) as $topLink)
        <?php 
            $userHasLink = $item->links()->where('links.id',$topLink->id)->count();
        ?>
        <li>
            <label><input {{$userHasLink?"checked":""}} type='checkbox' name='links[]' value='{{$topLink->id}}'> <b>{{$topLink->title}}</b></label>
            <ul style='margin-right:10px' class='list-unstyled'>
            @foreach($links->where('parent_id',$topLink->id) as $subLink)
                <?php 
                    $userHasLink = $item->links()->where('links.id',$subLink->id)->count();
                ?>
                <li><label><input {{$userHasLink?"checked":""}}  type='checkbox' name='links[]' value='{{$subLink->id}}'> {{$subLink->title}}</label></li>
            @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
    
    <div class="form-group">

        <br>
        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
            حفظ</button>
        <a href='{{route("user.index")}}' class="btn btn-default" type="reset"><i class="glyphicon glyphicon-repeat"></i> إلغاء </a>

    </div>
    <!--/row-->
</form>

@endsection