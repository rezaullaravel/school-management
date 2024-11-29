@extends('admin.admin_master')

@section('title')
    Fees Assign
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                @if (session('sms'))
                    <div class="alert alert-danger">
                        <p class="text-center">{{ Session::get('sms') }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Fees Assign.</h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.fees.assign.insert') }}" method="POST">
                            @csrf

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
                                        <label for="">Fees Category</label>
                                        <select name="fees_category_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($fees_categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->fees_category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">January Fee</label>
                                        <input type="text" name="january"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">February Fee</label>
                                        <input type="text" name="february"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">March Fee</label>
                                        <input type="text" name="march"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">April Fee</label>
                                        <input type="text" name="april"   class="form-control" >
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">May Fee</label>
                                        <input type="text" name="may"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">June Fee</label>
                                        <input type="text" name="june"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">July Fee</label>
                                        <input type="text" name="july"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">August Fee</label>
                                        <input type="text" name="august"   class="form-control" >
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">September Fee</label>
                                        <input type="text" name="september"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">October Fee</label>
                                        <input type="text" name="october"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">November Fee</label>
                                        <input type="text" name="november"   class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">December Fee</label>
                                        <input type="text" name="december"   class="form-control" >
                                    </div>
                                </div>
                            </div>{{-- end row --}}

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-right">
                                        <label for=""></label>
                                        <input type="submit" value="Submit"   class="btn btn-info">
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
