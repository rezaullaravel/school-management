@extends('admin.admin_master')

@section('title')
    All Notice
@endsection

@section('content')
    <section class="content">
        .<div class="container-fluid">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Notice List.
                                <a href="{{ route('admin.add.notice') }}" class="btn btn-success btn-sm"
                                    style="float: right;"><i class="las la-plus-square"></i>Add New Notice</a>
                            </h4>
                        </div>

                        @if (count($notice) > 0)
                            <div class="card-body">
                                <table class="table-bordered table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Sl</th>
                                            <th>Notice Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notice as $key => $row)
                                            <tr class="text-center">
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    {{ $row->title }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.edit.notice', $row->id) }}"
                                                        class="btn btn-info btn-sm" title="Edit"><i
                                                            class="las la-pen"></i></a>
                                                    <a href="{{ route('admin.delete.notice', $row->id) }}"
                                                        class="btn btn-danger btn-sm" onclick="confirmation(event)"
                                                        title="Delete"><i class="las la-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="card-body">
                                <h4 class="text-danger text-center">The table is empty....</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
