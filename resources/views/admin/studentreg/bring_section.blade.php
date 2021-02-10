@if(count($section)>0)
@foreach ($section as $section)
  <option value="{{$section->id}}">{{$section->section_name}}</option>
@endforeach
@else
<option><span style="color:red;">No Section Found!!</span></option>
@endif
