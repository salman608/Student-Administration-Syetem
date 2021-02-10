@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content login-form">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Add New Student</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('user-save') }}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
                    @csrf

                    <div class="form-group col-12 mb-3">
                        <label for="role" class="col-sm-3 col-form-label text-right">Role</label>

                        <select name="role" class="form-control col-sm-9" id="role">
                            <option value="">Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">Student</option>
                        </select>
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="name" class="col-sm-3 col-form-label text-right">Name</label>
                        <input id="name" type="text" class="col-sm-9 form-control @error('name') is-invalid
                    @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                        <input id="mobile" type="text" class="col-sm-9 form-control @error('mobile') is-invalid
                    @enderror" name="mobile" value="" placeholder="8801xxxxxxxxx" required autofocus>

                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="email" class="col-sm-3 col-form-label text-right">E-Mail Address</label>
                        <input id="email" type="email" class="col-sm-9 form-control @error('email') is-invalid
                    @enderror" name="email" value="" placeholder="Email Address" required autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                      <label for="classId" class="col-sm-3 col-form-label text-right">Batch Name</label>
                      <select name="batch_id" class="form-control col-sm-9" id="batchId" required>
                        <option value="">Select Batch</option>
                        @foreach($batches as $batch)
                          <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                        @endforeach
                      </select>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                      <label for="sectionId" class="col-sm-3 col-form-label text-right">Section</label>
                      <select name="section_id" class="form-control col-sm-9" id="sectionId" required>
                          <option value="" id="section">Select Section</option>
                      </select>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="password" class="col-sm-3 col-form-label text-right">Password</label>
                        <input id="password" type="password" class="col-sm-9 form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autofocus>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="form-group col-12 mb-3">
                        <label for="password-confirm" class="col-sm-3 col-form-label text-right">Confirm Password</label>
                        <input id="password-confirm" type="password" class="col-sm-9 form-control" name="password_confirmation" placeholder="Confirm Password" required>
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

    <script>
      $('#batchId').change(function(){
        var id=$(this).val();
        if(id){
          $.get("{{route('bring-section')}}",{
            id:id
          },function(data){
           $('#sectionId').html(data);
          })
        }
      })
    </script>

@endsection
