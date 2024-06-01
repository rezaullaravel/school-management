@extends('admin.admin_master')

@section('title')
    Fees Manage
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- @if (session('sms'))
                    <div class="alert alert-danger">
                        <p class="text-center">{{ Session::get('sms') }}</p>
                    </div>
                @endif --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Fees Manage.</h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.fees.manage') }}" method="GET">

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
                                        <a href="{{ route('admin.fees.manage') }}" class="btn btn-primary btn btn-block" style="margin-top:7px;">Reset</a>
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
                                @if (count($fees)>0)
                                <table class="table table-bordered">
                                    <thead>
                                       <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Fee Category</th>
                                        <th>Fee Amount</th>
                                        <th>Action</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                       @foreach ($fees as $key => $fee)
                                           <tr class="text-center">
                                             <td>{{ $key+1 }}</td>
                                             <td>
                                                {{
                                                  $fee->fees_category->fees_category_name
                                                }}
                                             </td>
                                             <td>{{ number_format($fee->fees_amount,2) }} TK.</td>

                                             <td>
                                                <a href="{{ route('admin.fees.delete',$fee->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="Delete"><i class="las la-trash"></i>Delete</a>
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
