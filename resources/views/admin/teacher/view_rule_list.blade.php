@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid mb-5">
        <div class="row content ">
            <div class="col-md-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Rules For Teacher</h4>
                    </div>
                </div>
                @if(count($rules)>0)
                <div class="">
                  @foreach($rules as $key=>$rule)
                  <p>{!! $rule->teacher_rules !!}</p>
                  <hr>
                  @endforeach
                </div>
                @else
                <div class="">
                    <h5 class="text-center text-danger font-weight-bold font-italic mt-3"> NO Rules Found!!</h5>
                </div>
                @endif
                {{ $rules->links() }}
            </div>
        </div>
    </section>
    <!--Content End-->

@endsection
