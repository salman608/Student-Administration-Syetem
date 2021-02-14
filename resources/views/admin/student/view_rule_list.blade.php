@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid mb-5">
        <div class="row content ">
            <div class="col-md-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Rules For Student</h4>
                    </div>
                </div>
                <div class="">
                  @foreach($rules as $key=>$rule)
                  <p>{!! $rule->student_rules !!}</p>
                  <hr>
                  @endforeach
                </div>
                {{ $rules->links() }}
            </div>
        </div>
    </section>
    <!--Content End-->

@endsection
