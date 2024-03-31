@extends('admin.admin_master')

@section('title')
    Admin Profile
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h4>Your Profile.

                        </h4>
                    </div>

                    @php
                        $admin = App\Models\Admin::where('id',Session::get('adminId'))->first();
                    @endphp

                   {{-- card body --}}
                   <form action="{{ route('admin.profile.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ $admin->image ? asset($admin->image)  : asset('backend/dist/img/avatar5.png') }}" alt="Admin profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                <input type="text" name="name" value="{{ $admin->name }}" class="form-control text-center">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </h3>

                            <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Phone</b> <a class="float-right">
                                    <input type="text" name="phone" value=" {{$admin->phone }} " class="form-control">
                                </a> <br>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">
                                    <input type="text" name="email" value=" {{$admin->email }} " class="form-control">
                                </a> <br>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </li>

                            <li class="list-group-item">
                                <b>Profile Picture</b> <a class="float-right">
                                    <input type="file" name="image" class="form-control">
                                </a>
                            </li>

                            <li class="list-group-item">

                                    <input type="submit" value="Update Profile" class="form-control btn btn-primary">

                            </li>
                            </ul>


                        </div>
                </form>
                   {{-- card body --}}
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
