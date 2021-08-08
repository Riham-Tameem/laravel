@extends("layouts.base")

@section("aside")
    @include("layouts.components.doctor-menu")
@endsection


@section("title","الصفحة الشخصية")

@section('content')
    @include('layouts.msg')
 
    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline"
                        id="m_table_1" role="grid" aria-describedby="m_table_1_info">
                        <thead>
                            <tr role="row">
                               
                                <th>اسم المريض</th>
                                <th  >تاريخ الزيارة </th>
                                <th  >موعد الزيارة </th>
                                <th>الاجراءات</th>

                            </tr>
                        </thead>

                        <tbody>
                        @foreach($items as $item)
                            <tr role="row" class="odd">
                             

                                <td>{{$item->patient->name}}</td>

                                <td>{{(new \DateTime($item->day))->format('Y.m.d')}}</td>
                                <td>{{$item->from}} - {{$item->to}}</td>
                                <td> 
                                    <select data-aid='{{$item->id}}' name='status' class='ddlStatus form-control'>
                                        @foreach($status as $s)
                                            <option {{$item->status_id==$s->id?"selected":""}} value='{{$s->id}}'>{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                    </table>


@endsection