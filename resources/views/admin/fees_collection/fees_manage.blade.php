@extends('admin.admin_master')

@section('title')
    Fees Manage
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">

           <form action="{{ route('admin.fees.manage') }}" method="GET">
            <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                      <label for="">Class</label>
                      <select name="clas_id"   class="form-control" required>
                          <option value="" selected disabled>Select</option>
                          @foreach ($classes as $class)
                              <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                      <label for="">Section</label>
                      <select name="section_id"   class="form-control">
                          <option value="" selected disabled>Select</option>

                      </select>
                  </div>
              </div>

              <div class="col-sm-3">
                  <div class="form-group">
                      <label for="">Session</label>
                      <select name="session_id"   class="form-control" required>
                          <option value="" selected disabled>Select</option>
                          @foreach ($sessions as $session)
                              <option value="{{ $session->id }}">{{ $session->session_year }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>

              <div class="col-sm-3">
                  <div class="form-group">
                      <input type="submit" value="Filter" class="btn btn-info" style="margin-top: 30px;">
                      <a href="{{ route('admin.fees.manage') }}" class="btn btn-primary" style="margin-top: 30px;">All</a>
                  </div>
              </div>
             </div>
           </form>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                                @if (count($fees)>0)
                                <h4>Fees Manage</h4>
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                       <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Session</th>
                                        <th>Fee Category</th>
                                        <th>January</th>
                                        <th>February</th>
                                        <th>March</th>
                                        <th>April</th>
                                        <th>May</th>
                                        <th>June</th>
                                        <th>July</th>
                                        <th>August</th>
                                        <th>September</th>
                                        <th>October</th>
                                        <th>November</th>
                                        <th>December</th>
                                        <th>Action</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                       @foreach ($fees as $key => $fee)
                                           <tr class="text-center">
                                             <td>{{ $key+1 }}</td>
                                             <td>{{ $fee->clas->class_name }}</td>
                                             <td>{{ $fee->section->section_name }}</td>
                                             <td>{{ $fee->session->session_year }}</td>
                                             <td>
                                                {{
                                                  $fee->fees_category->fees_category_name
                                                }}
                                             </td>
                                             <td>{{ $fee->january }}</td>
                                            <td>{{ $fee->february }}</td>
                                            <td>{{ $fee->march }}</td>
                                            <td>{{ $fee->april }}</td>
                                            <td>{{ $fee->may }}</td>
                                            <td>{{ $fee->june }}</td>
                                            <td>{{ $fee->july }}</td>
                                            <td>{{ $fee->august }}</td>
                                            <td>{{ $fee->september }}</td>
                                            <td>{{ $fee->october }}</td>
                                            <td>{{ $fee->november }}</td>
                                            <td>{{ $fee->december }}</td>


                                             <td>
                                                <a href="{{ route('admin.fees.edit',$fee->id) }}" class="btn btn-primary btn-sm"  title="Edit"><i class="fas fa-pen"></i></a>
                                                <a href="{{ route('admin.fees.delete',$fee->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="Delete"><i class="las la-trash"></i></a>
                                             </td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                @else
                                  <h4 class="text-danger text-center">No data found....</h4>
                                @endif
                        </div>
                    </div>
                </div>
            </div>{{-- row --}}


    </div>
 </section>

 {{-- javascript for section auto select --}}
 <script type="text/javascript">
    $(document).ready(function(){
        $('select[name="clas_id"]').on('change',function(){
            var class_id=$(this).val();
            if(class_id){
                $.ajax({
                    url:"{{ url('/admin/class/section/ajax') }}/"+class_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d=$('select[name="section_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="section_id"]').append(
                                '<option value="'+value.id+'">'+
                                value.section_name+'</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
    });
</script>
{{-- javascript for section auto select end --}}

@endsection
