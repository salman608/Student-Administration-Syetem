@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid mb-5">
        <div class="row content login-form">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Notice For Student</h4>
                    </div>
                </div>
                <form method="POST" action="{{route('sore-notice')}}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
                    @csrf

                    <div class="form-group col-12 mb-3">
                        <label for="notice" class="col-sm-3 col-form-label text-right">Notice</label>
                        <textarea id="name" cols="20" rows="8" type="text" class="col-sm-9 form-control @error('notice') is-invalid
                    @enderror" name="notice" value="{{ old('notice') }}" placeholder="Enter Your Text..." required autofocus></textarea>

                        @error('notice')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label class="col-sm-3"></label>
                        <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->

@endsection
