@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Notice For Student</h4>
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
                        @foreach($tnotice as $key=>$tnotice)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$tnotice->notice_name}}</td>
                                <td> <a class="btn btn-primary btn-sm" href="/file/download/{{$tnotice->file}}">Download Notice</a> </td>
                                <td>{{$tnotice->created_at}}</td>

                                <td>
                                 <a href="{{route('delete-notice',$tnotice->id)}}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>

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
