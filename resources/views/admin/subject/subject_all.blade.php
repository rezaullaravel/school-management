@extends('admin.admin_master')

@section('title')
    All Subject
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <form action="{{ route('admin.all.subject') }}" method="GET">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                       <select name="clas_id" id="" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                         @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                         @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Section</label>
                                       <select name="section_id" id="" class="form-control">
                                        <option value=""  disabled>Select</option>

                                       </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 mt-2">
                                   <div class="form-group">
                                      <label for=""></label>
                                      <input type="submit" value="Filter" class="btn btn-info form-control">
                                   </div>
                                </div>

                                <div class="col-sm-2" style="margin-top: 2rem;">
                                    <a href="{{ route('admin.all.subject') }}" class="btn btn-primary btn-block">Reset</a>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Subject
                            <a href="{{ route('admin.add.subject') }}" class="btn btn-success btn-sm" style="float: right;"><i class="las la-plus-square"></i>Add New Subject</a>
                        </h4>
                    </div>

                    @if (count($subjects)>0)
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Subject Name</th>
                                        <th>Subject Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $key=>$row )
                                        <tr class="text-center">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $row->clas->class_name }}</td>
                                            <td>{{ $row->section->section_name }}</td>
                                            <td>{{ $row->subject }}</td>
                                            <td>{{ $row->type }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit.subject',$row->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="las la-pen"></i></a>
                                                <a href="{{ route('admin.delete.subject',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="Delete"><i class="las la-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="card-body">
                            <h4 class="text-danger text-center">The table is empty....</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
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
