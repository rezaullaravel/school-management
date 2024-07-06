@extends('admin.admin_master')

@section('title')
    Fees Collection
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Fees Collection.</h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.collection.store') }}" method="Post">
                            @csrf

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select name="clas_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == Request::get('class_id') ? 'selected':'' }}>{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Section</label>
                                        <select name="section_id"   class="form-control">
                                            <option value="" selected disabled>Select</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
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
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Student Reg.</label>
                                        <input type="text" name="registration" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for=""> Given Amount</label>
                                        <input type="text" name="given_amount" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for=""> Month </label>
                                        <select name="month" class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            <option value="january">January</option>
                                            <option value="february">February</option>
                                            <option value="march">March</option>
                                            <option value="april">April</option>
                                            <option value="may">May</option>
                                            <option value="june">June</option>
                                            <option value="july">July</option>
                                            <option value="august">August</option>
                                            <option value="september">September</option>
                                            <option value="october">October</option>
                                            <option value="november">November</option>
                                            <option value="december">December</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" value="Submit" class="btn btn-success btn-block" style="margin-top:7px;">
                                    </div>
                                </div>
                            </div>
                          </form>
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
