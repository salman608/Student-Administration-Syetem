@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Student Application list</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Body</th>
                            <th>Status</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applys as $apply)
                            <tr>
                                <td>{{$apply->apply_name}}</td>
                                <td>{{$apply->apply_email}}</td>
                                <td>{{$apply->apply_subject}}</td>
                                <td>{{substr(strip_tags($apply->apply_details),0,20) }}{{strlen(strip_tags($apply->apply_details)) > 30 ? "..." : ""}}</td>
                                <td>

                                  @if($apply->status == 2)
                                      <span class="badge badge-primary">AcceptBYTeacher</span>
                                  @elseif($apply->status == 4)
                                    <span class="badge badge-drak">AcceptBYAdmin</span>

                                    @elseif($apply->status == 5)
                                      <span class="badge badge-drak">RejectBYAdmin</span>
                                  @endif
                                </td>
                                <td>
                                   <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="{{$apply->id}}"  onclick="fetchData(<?php echo $apply->id; ?>)" href="{{route('view_apply_teacher',$apply->id)}}" class="btn btn-sm btn-dark"><span class="fa fa-eye"></span></a>
                                   <a href="{{route('accept-by-admin',$apply->id)}}" class="btn btn-warning btn-sm">Accept</a>
                                   <a href="{{route('reject-by-admin',$apply->id)}}" class="btn btn-danger btn-sm">Reject</a>
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
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

@endsection

<script>
console.log('hello');

function fetchData(event) {
  // let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  // var csrf = $('meta[name="csrf-token"]').attr('content');
  console.log(event);
  fetch(`/api/fetchData/${event}`, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                // "X-Requested-With": "XMLHttpRequest",
                // "X-CSRF-TOKEN": token
                },
            method: 'get',
            credentials: "same-origin"
        })
        .then(res => res.json())
        .then(result => showData(result))

}

function showData(data) {
  console.log(data);
  document.getElementById('modal-body').innerHTML = `  <p>Name:${data.data.apply_name}</p>
                                                       <p>Email:${data.data.apply_email}</p>
                                                      <p>Subject:${data.data.apply_subject}</p>
                                                      <p>${data.data.apply_details}</p>`
}
</script>
