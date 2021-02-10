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
                <form method="POST" action="{{route('update-Srule',$rules->id)}}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
                    @csrf

                    <div class="form-group col-12 mb-3">

                        <textarea class="description" name="student_rules">{{$rules->student_rules}}</textarea>
                        @error('notice')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">

                        <button type="submit" class="col-sm-12 btn btn-block my-btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->

@endsection
