@extends("layouts.admin")

@section("title"," قائمة التخصصات  ")

@section("content")

<a class='btn btn-success' href='{{route("speciality.create")}}'>اضافة تخصص جديد   </a>


@if($items->count())
    <table class='table table-hover'>
        <thead>
        <tr>
            <th width='1%'>#</th>
            <th>الاسم </th>
            <th width='10%'>فعال</th>
            <th width='30%'>الخيارات </th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->active?'Active':'In Active'}}</td>
                <td>
                    <form method='post' action="{{route('speciality.destroy',$item->id)}}">
                        @csrf
                        @method('delete')
                        <a href='{{route("speciality.show",$item->id)}}' class='btn btn-info'>عرض</a>
                        <a href='{{route("speciality.edit",$item->id)}}' class='btn btn-primary'>تعديل</a>

                        <input onclick='return confirm("Are you sure?")' type='submit' class='btn btn-danger' value='حذف'>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$items->links()}}
@else
    <div class='alert alert-info mt-4'>There is no items to show</div>
@endif
@endsection

