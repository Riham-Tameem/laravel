@extends("layouts.base")

@section("aside")
    @include("layouts.components.doctor-menu")
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
    @include('layouts.msg')


@endsection


