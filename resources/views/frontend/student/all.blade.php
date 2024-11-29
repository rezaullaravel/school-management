@extends('frontend.frontend_master')

@section('title')
Student List
@endsection

<style>
    .formStyle{
        background: #f8cde0 !important;
    }
</style>

@section('content')

<div class="banner-agile">

    @include('frontend.body.menu')
    <div class="form-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Our
				<span class="font-weight-bold">Students</span>
			</h3>
            <div class="row">
                <div class="col-sm-12">
                   <div class="card formStyle">
                       <div class="card-body">
                           <form action="{{ route('frontend.students') }}" method="GET">
                               @csrf
                               <div class="row">
                                   <div class="col-sm-4">
                                       <div class="form-group">
                                           <label>Class<span class="text-danger">*</span> </label>
                                           <select name="clas_id"  class="form-control" required>
                                               <option value="" selected disabled>Select Class</option>
                                               @foreach ($classes as $class)
                                                   <option value="{{ $class->id }}" {{ Request::get('clas_id')==$class->id ? 'selected':'' }}>{{ $class->class_name }}</option>
                                               @endforeach
                                           </select>
                                           @error('clas_id')
                                               <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                       </div>
                                   </div>
                                   <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Session<span class="text-danger">*</span> </label>
                                        <select name="session_id"  class="form-control" required>
                                            <option value="" selected disabled>Select Session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}" {{ Request::get('session_id')==$session->id ? 'selected':'' }}>{{ $session->session_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                   <div class="col-sm-4">
                                       <div class="form-group mt-4">
                                           <input type="submit" value="Filter" class="btn btn-primary btn-block">
                                       </div>
                                   </div>
                               </div>{{-- row --}}
                           </form>
                       </div>{{-- card body --}}

                       @if (!empty(Request::get('clas_id')) && !empty(Request::get('session_id')))
                       <div class="card-body">
                        <table class="table table-bordered" id="example">
                           <thead>
                               <tr>
                                   <th class="text-center">Sl</th>
                                   <th class="text-center">Name</th>
                                   <th class="text-center">Photo</th>
                               </tr>
                           </thead>

                           <tbody>
                            @foreach ($students as $key => $value)
                               <tr class="text-center">
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ $value->name }}</td>
                                 <td>
                                    <img src="{{ asset($value->image) }}" alt="" width="100" height="100">
                                 </td>
                               </tr>
                            @endforeach
                           </tbody>
                        </table>
                      </div>

                       @endif
                   </div>

                </div>
              </div>
		</div>
	</div>

</div>{{-- banner agile --}}
@endsection
