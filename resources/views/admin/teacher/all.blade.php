@extends('admin.admin_master')

@section('title')
    All Teacher
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Teacher.
                            <a href="{{ route('admin.add.teacher') }}" class="btn btn-success btn-sm" style="float: right;"><i class="las la-plus-square"></i>Add New Teacher</a>
                        </h4>
                    </div>


                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered  table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Teacher Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>Salary</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($teachers as $key=>$row)
                                     <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->name }}</td>

                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->designation->designation }}</td>
                                        <td>{{ $row->salary }}</td>
                                        <td>
                                            <img src="{{ asset($row->image) }}" alt="" width="80">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit.teacher',$row->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="las la-pen"></i></a>
                                            <a href="{{ route('admin.delete.teacher',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="Delete"><i class="las la-trash"></i></a>
                                        </td>
                                     </tr>
                                 @endforeach

                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
