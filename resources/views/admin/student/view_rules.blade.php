@extends('admin.master')
@section('content')

<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Student Rules</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Student Rule</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rules as $key=>$rule)
                        <tr>
                            <td>{{$key +1}}</td>
                            <!-- <td>{!! $rule->student_rules !!}</td> -->
                            <td>{{substr(strip_tags($rule->student_rules),0,20) }}{{strlen(strip_tags($rule->student_rules)) > 20 ? "..." : ""}}</td>



                            <td>
                                <a href="#" class="btn btn-sm btn-dark"><span class="fa fa-eye"></span></a>
                                <a href="{{route('edit-Srule',$rule->id)}}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                                <a href="{{route('delete-Srule',$rule->id)}}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                      {{ $rules->links() }}
                </table>

            </div>
        </div>
    </div>
</section>
<!--Content End-->


@endsection
