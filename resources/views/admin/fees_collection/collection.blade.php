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
                          <form action="{{ route('admin.fees.collection') }}" method="GET">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select name="class_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == Request::get('class_id') ? 'selected':'' }}>{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" value="Search" class="btn btn-success btn-block" style="margin-top:7px;">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <a href="{{ route('admin.fees.collection') }}" class="btn btn-primary btn btn-block" style="margin-top:7px;">Reset</a>
                                    </div>
                                </div>
                            </div>{{-- row --}}
                          </form>
                        </div>
                </div>
            </div>
        </div>{{-- row --}}



          @if (!empty(Request::get('class_id')))
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">


                        </div>
                        <div class="card-body">
                                @if (count($students)>0)
                                <table class="table table-bordered">
                                    <thead>
                                       <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Student Name</th>
                                        <th>Roll</th>
                                        <th>Reg.</th>
                                        <th>Action</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                       @foreach ($students as $key => $row)
                                          <tr class="text-center">
                                             <td>{{ $key+1 }}</td>
                                             <td>{{ $row->name }}</td>
                                             <td>{{ $row->roll }}</td>
                                             <td>{{ $row->registration }}</td>
                                             <td>
                                                <a href="{{ route('admin.add.collection',['id'=>$row->id,'class_id'=>Request::get('class_id')]) }}" class="btn btn-info btn-sm"><i class="las la-plus"></i>Add Collection</a>

                                                <a href="{{ route('admin.total.fee',['id'=>$row->id,'class_id'=>Request::get('class_id')]) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Total Fee</a>
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
          @endif

    </div>
 </section>

@endsection
