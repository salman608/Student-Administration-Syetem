@extends('admin.master')
@section('content')
<!--Slider Start-->
<section class="container-fluid">

    <div class="row">
        <div class="col-12 pl-0 pr-0">
            <div class="owl-carousel">
                <div class="item"><img src="{{asset('admin/assets/images/1.jpg')}}" alt="" style="width: 100%;height:550px"></div>
                <div class="item"><img src="{{asset('admin/assets/images/2.jpg')}}" alt="" style="width: 100%;height:550px"></div>
                <div class="item"><img src="{{asset('admin/assets/images/3.jpg')}}" alt="" style="width: 100%;height:550px"></div>
                <div class="item"><img src="{{asset('admin/assets/images/img-4.jpg')}}" alt=""></div>

            </div>
        </div>
    </div>
</section>
<!--Slider End-->
@endsection
