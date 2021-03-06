@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">User List</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Notice Title</th>
                            <th>Notice Download</th>
                            <th>Date</th>

                            <th style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notice as $key=>$notice)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$notice->notice_title}}</td>
                                <td> <a class="btn btn-primary btn-sm" href="/file/download/{{$notice->file}}">Download</a> </td>
                                <td>{{$notice->created_at}}</td>

                                <td>
                                    <a href="#" class="btn btn-sm btn-dark"><span class="fa fa-eye"></span></a>
                                
                                    <a href="{{route('delete-notice',$notice->id)}}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>

                                </td>
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
