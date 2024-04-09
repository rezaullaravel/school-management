@extends('frontend.frontend_master')

@section('title')
Teachers
@endsection

<style>
    .formStyle{
        background: #ffe0f3  !important;
    }
</style>

@section('content')

<div class="banner-agile">

    @include('frontend.body.menu')
    <div class="form-w3l py-5">
		<div class="py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Our
				<span class="font-weight-bold">Teachers</span>
			</h3>
			<div class="register-form pt-md-4">
				<div class="container">
                    <div class="row">
                      <div class="col-sm-12">
                         <div class="card">

                             <div class="card-header formStyle">

                             </div>{{-- card header --}}

                                 <div class="card-body formStyle">
                                     <table class="table table-bordered table-striped  nowrap" id="example">
                                       <thead>
                                          <tr>
                                              <th class="text-center">Sl</th>
                                              <th class="text-center">Name</th>
                                              <th class="text-center">Designation</th>
                                              <th class="text-center">Photo</th>
                                          </tr>
                                       </thead>

                                       <tbody>
                                         @foreach ($getRecords as $key => $row)
                                            <tr class="text-center">
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->designation->designation }}</td>
                                                <td>
                                                    <img src="{{ asset($row->image) }}" alt="" width="100">
                                                </td>
                                            </tr>
                                         @endforeach
                                       </tbody>
                                     </table>
                                 </div>
                            </div>
                      </div>
                    </div>{{-- main row --}}
                 </div>{{-- container --}}
			</div>
		</div>
	</div>

</div>{{-- banner agile --}}

@endsection
