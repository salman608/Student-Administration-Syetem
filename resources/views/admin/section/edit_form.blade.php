@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid mb-5">
        <div class="row content login-form">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Edit Bactwise Section</h4>
                    </div>
                </div>
                <form method="POST" action=""autocomplete="off" class="form-inline">
                    @csrf

                    <div class="form-group col-12 mb-3">
                      <label for="batch" class="col-sm-3 col-form-label text-right">Add Section</label>
                      <input type="text" name="batch_name" value="" class="form-control col-sm-9
                       " id="batch" minlength="8" required>
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="role" class="col-sm-3 col-form-label text-right">Batch Name</label>

                        <select name="role" class="form-control col-sm-9" id="role">
                            <option value="">Select Batch</option>
                            <option value="Admin">b1</option>
                            <option value="User">b2</option>
                        </select>
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
