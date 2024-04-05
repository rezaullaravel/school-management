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
                          <form action="{{ route('admin.fees.assign') }}" method="GET">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Fees Category</label>
                                        <select name="fees_category_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($fees_categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == Request::get('fees_category_id') ? 'selected':'' }}>{{ $category->fees_category_name }}</option>
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
                                        <a href="{{ url('admin/fees/assign') }}" class="btn btn-primary btn btn-block" style="margin-top:7px;">Reset</a>
                                    </div>
                                </div>
                            </div>{{-- row --}}
                          </form>
                        </div>
                </div>
            </div>
        </div>{{-- row --}}



          @if (!empty(Request::get('fees_category_id')))
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-success" style="display: none;">

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.fees.assign.insert') }}" method="POST">
                                @csrf

                                <input type="hidden" name="fees_category_id" value="{{ Request::get('fees_category_id') }}">
                                <table class="table table-bordered">
                                    <thead>
                                       <tr class="text-center">
                                        <th>Class Name</th>
                                        <th>Fee Amount</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                       @foreach ($classes as $class)
                                         @php
                                             $fee_amount = DB::table('fees')->where('class_id',$class->id)->where('fees_category_id',Request::get('fees_category_id'))->first();
                                         @endphp
                                           <tr class="text-center">
                                              <td>
                                                {{ $class->class_name }}
                                                <input type="hidden" name="fees[{{ $i }}][class_id]" value="{{$class->id}}">
                                             </td>
                                              <td>
                                                <input type="text" name="fees[{{ $i }}][fees_amount]"
                                                value="{{ (!empty($fee_amount)) ?$fee_amount->fees_amount : '' }}" class="form-control text-center">
                                              </td>
                                           </tr>
                                           @php
                                               $i++;
                                           @endphp
                                       @endforeach
                                    </tbody>
                                </table>
                                <div class="text-right">
                                   <input type="submit" value="Submit" class="btn btn-info">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>{{-- row --}}
          @endif

    </div>
 </section>




@endsection
