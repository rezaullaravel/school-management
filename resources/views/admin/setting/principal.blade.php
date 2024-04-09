@extends('admin.admin_master')

@section('title')
    Principal
@endsection

@section('content')
    <section class="content">
        .<div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Principal.
                                <a href="{{ route('admin.add.principal') }}" class="btn btn-success btn-sm"
                                    style="float: right;"><i class="las la-plus-square"></i>Add New Principal</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <table class="table-bordered table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($principal as $value)
                                        <tr class="text-center">
                                            <td>{{ $value->name }}</td>
                                            <td>
                                                {{-- <a href="{{ route('admin.edit.session', $principal->id) }}"
                                                class="btn btn-info btn-sm" title="Edit"><i class="las la-pen"></i></a> --}}
                                                <a href="{{ route('admin.delete.principal', $value->id) }}"
                                                    class="btn btn-danger btn-sm" onclick="confirmation(event)"
                                                    title="Delete"><i class="las la-trash"></i></a>
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
