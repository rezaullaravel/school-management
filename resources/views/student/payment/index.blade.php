@extends('admin.admin_master')

@section('title')
    Payment
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h4>Payment.

                        </h4>
                    </div>{{-- card header --}}


                    <div class="card-body">
                        <div class="row mt-5">
                           <div class="col-sm-12">
                              <p>Send money to <strong>01719475187</strong> (bkash) number and fillup the following form. <span class="text-danger">If you don't fillup the form, your payment will not be completed.</span> </p>
                           </div>
                        </div>{{-- row --}}
                        <form action="{{ route('student.payment.store') }}" method="POST">
                            @csrf
                        <div class="row mt-5">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="transaction_id" class="form-control" placeholder="Enter bkash transaction id">
                                        @error('transaction_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="form-control btn btn-info">
                                    </div>
                                </div>
                        </div>
                       </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
