@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid mb-5">
        <div class="row content ">
            <div class="col-md-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Student Application Form</h4>
                    </div>
                </div>
                <form method="POST" action="{{route('store-apply')}}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
                    @csrf

                    <div class="form-group col-12 mb-3">
                        <label for="batch" class="col-sm-2 col-form-label text-left">Name</label>
                        <input type="text" name="apply_name" placeholder="Enter Name..." class="form-control col-sm-10
                         " id="batch"  required>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="batch" class="col-sm-2 col-form-label text-left">Email</label>
                        <input type="text" name="apply_email" placeholder="Enter Email..." class="form-control col-sm-10
                         " id="batch"  required>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="batch" class="col-sm-2 col-form-label text-left">Subject</label>
                        <input type="text" name="apply_subject" placeholder="Enter Subject..." class="form-control col-sm-10
                         " id="batch"  required>
                    </div>

                    <div class="form-group col-12 mb-3">
                        <textarea class="description form-control col-sm-8" name="apply_details" placeholder="Write description..........."></textarea>
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
