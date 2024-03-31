@extends('admin.admin_master')

@section('title')
    Student Id Card
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid">
        <div class="row" id="top">
            <div class="col-sm-10 offset-sm-1">
               @if (session('sms'))
               <div class="alert alert-danger">
                  <p class="text-center">{{ Session::get('sms') }}</p>
               </div>
               @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Student Id Card Generate.</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.student-idcard.download') }}" method="POST">
                            @csrf

                            <div class="row">
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Select  Class<span class="text-danger">*</span></label>
                                        <select name="clas_id" class="form-control">
                                            <option selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('clas_id')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                               </div>

                                <div class="col-sm-4">
                                     <div class="form-group">
                                         <label>Session<span class="text-danger">*</span></label>
                                         <select name="session_id" class="form-control">
                                             <option selected disabled>Select</option>
                                             @foreach ($sessions as $session)
                                                 <option value="{{ $session->id }}">{{ $session->session_year }}</option>
                                             @endforeach
                                         </select>

                                     </div>
                                </div>

                                <div class="col-sm-4" style="text-align: right; margin-top:2rem;">
                                    <div class="form-group">
                                        <input type="submit" value="Generate" class="btn btn-info btn-block">
                                    </div>
                                </div>
                            </div>{{-- row --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>{{-- row --}}
    </div>
 </section>
@endsection


