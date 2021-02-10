<thead>
<tr>
    <th>Sl.</th>
    <th>Section Name</th>
    <th>Date</th>
    <th style="width: 100px;">Action</th>
</tr>
</thead>
<tbody>
@foreach($sections as $key=>$section)
    <tr>
        <td>{{$key +1}}</td>
        <td>{{$section->section_name}}</td>
        <td>{{$section->created_at}}</td>
        <td>
            <a href="" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
            <button onclick='delt("{{$section->id}}","{{$section->batch_id}}")' class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>

        </td>
    </tr>
@endforeach
</tbody>

<!-- <script>

function delt(batchId,sectionId){
  var check=confirm('If you want to delete this Item!!');
  if(check){
    $.get("{{route('section-delete')}}", {section_id:sectionId,batch_id:batch_id},function(data){
      console.log(data);
      $('#sectionId').empty().html(data);
    })
  }else{
    return false;
  }
}

</script> -->
