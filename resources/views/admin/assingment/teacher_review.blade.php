@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Book List</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Assingment Title</th>
                            <th>Student Roll</th>
                            <th>Assingment File</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assingment as $key=>$assingment)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$assingment->assingment_title}}</td>
                                <td>{{$assingment->roll}}</td>
                                <td> <a class="btn btn-primary btn-sm" href="/file/download/{{$assingment->file}}">Download Book</a> </td>
                                <td>{{$assingment->created_at}}</td>
                                <td>
                                  @if($assingment->assingment_status == 1)
                                      <span class="badge badge-success">Under Review</span>
                                  @elseif($assingment->assingment_status == 2)
                                      <span class="badge badge-info">Assingment All Ok</span>
                                  @elseif($assingment->assingment_status == 3)
                                    <span class="badge badge-danger">Assingment Not Ok</span>
                                  @endif
                                </td>

                                <td>
                                  <a href="{{route('accept',$assingment->id)}}" class="btn btn-warning btn-sm">Accept</a>
                                  <a href="{{route('reject',$assingment->id)}}" class="btn btn-danger btn-sm">Reject</a>
                                </td>
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
