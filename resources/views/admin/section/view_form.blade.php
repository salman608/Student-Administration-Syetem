@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Batch Wise Section List</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table  table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                      <tr>
                        <td>
                          <div class="form-group row mb-0">
                              <label for="role" class="col-sm-3 col-form-label text-right">Batch Name</label>
                              <div class="col-sm-6">
                                <select name="batch_id" class="form-control " id="batchId" required autofocus>
                                    <option value="">----Select Batch----</option>
                                    @foreach($batchs as $batch)
                                    <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                                    @endforeach
                                </select>
                              </div>

                          </div>
                        </td>
                      </tr>
                    </table>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover text-center" id="sectionList">

                  </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->

    <script>
      $('#batchId').change(function(){
        var id=$(this).val();
        if(id){
          $.get("{{route('section-list-by-ajax')}}",{id:id}, function(data){
             $("#sectionList").html(data);
          })
        }
      })
    </script>

@endsection
