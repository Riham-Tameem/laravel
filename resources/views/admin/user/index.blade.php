@extends("layouts.admin")

@section("title","ادارة المستخدمين ")

@section("content")
<div class="mb-3">
<a class='btn btn-success' href='{{route("user.create")}}'>اضافة مستخدم</a>
</div>
<form>
    <div class="row ">
        <div class="col-md-2 pr-3">
            <input type="text" class="form-control" name="q" value="{{request()->q}}" placeholder="الإسم">
        </div>
    
        <div class="col-md-2 pr-3 pl-0">
            <input type="email" class="form-control" name="email" 
             value="{{request()->email}}" placeholder="الإيميل">
        </div>
    
       
      
        <div class="col-md-1 pl-0"> 
            <input type="submit" value='بحث' class='btn btn-primary pt-2 p-b-2'  >
        </div>
       
        
    </div>
</form>


@if($items->count())
    <table class='table table-hover'>
        <thead>
        <tr>
            <th width='1%'>#</th>
            <th>الاسم</th>
            <th>الإيميل</th>
            <th width='30%'>خيارات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                
                <td>
                    <form method='post' action="{{route('user.destroy',$item->id)}}">
                        @csrf
                        @method('delete')
                        <a href='{{route("user.show",$item->id)}}' class='btn btn-info'>عرض</a>
                        <a href='{{route("user.edit",$item->id)}}' class='btn btn-primary'>تعديل</a>
                        <a href='{{route("user.links",$item->id)}}' class='btn btn-warning'>صلاحيات</a>

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

