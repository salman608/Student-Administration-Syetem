@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Batch List</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Batch Name</th>
                            <th>Date</th>

                            <th style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($batchs as $key=>$batch)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$batch->batch_name}}</td>
                                <td>{{$batch->created_at}}</td>
                                <td>
                                    <a href="{{route('batch-edit',$batch->id)}}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                                    <a href="{{route('batch-delete',$batch->id)}}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>

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
