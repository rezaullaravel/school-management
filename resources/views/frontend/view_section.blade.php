@extends('frontend.frontend_master')

@section('title')
{{ $title }}
@endsection

<style>
    .formStyle{
        background: #ffe0f3  !important;
    }
    figure{
        text-align: center;
    }
</style>

@section('content')

<div class="banner-agile">

    @include('frontend.body.menu')
    <div class="form-w3l py-5">
		<div class="py-xl-5 py-lg-3">

			<div class="register-form pt-md-4">
				<div class="container" style="min-height: 405px !important">
                    <div class="row">
                      <div class="col-sm-12">
                         <div class="card">
                            <div class="card-body">
                                <p>{!! $data->description !!}</p>
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
