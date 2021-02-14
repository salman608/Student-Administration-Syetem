@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid mb-5">
        <div class="row content ">
            <div class="col-md-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Notice Board</h4>
                    </div>
                </div>

                <div class="table-responsive p-1 col-md-8" style="margin:auto;">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">

                        <tr>
                            <th style="width:80%;"></th>
                            <th></th>
                        </tr>

                        <tbody>
                        @foreach($notice as $notice)
                            <tr>
                                <td><marquee  direction = "right" style="color:green;font-size:18px;">{{$notice->notice_title}}</marquee></td>
                                <td> <a class="btn btn-primary btn-sm text-center" style="text-align:center;" href="/file/download/{{$notice->file}}">Download Notice</a> </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </section>
    <!--Content End-->

@endsection
