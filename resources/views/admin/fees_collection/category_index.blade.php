@extends('admin.admin_master')

@section('title')
    Fees Category
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Fees Category List.
                            <a href="{{ route('admin.add.fee.category') }}" class="btn btn-success btn-sm" style="float: right;" title="Add New Class"><i class="las la-plus-square"></i>Add New Fee Category</a>
                        </h4>
                    </div>

                    @if (count($fees_categories)>0)
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Fee Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees_categories as $key=>$row )
                                        <tr class="text-center">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $row->fees_category_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit.fee.category',$row->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="las la-pen"></i></a>
                                                <a href="{{ route('admin.delete.fee.category',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="Delete"><i class="las la-trash"></i></a>
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
