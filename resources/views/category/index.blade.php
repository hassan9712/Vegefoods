@extends('layouts.admin')

@section('content')
<div id="example_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group">          <button class="btn btn-outline-primary buttons-copy buttons-html5" tabindex="0" aria-controls="example" type="button"><span>Copy</span></button> <button class="btn btn-outline-primary buttons-excel buttons-html5" tabindex="0" aria-controls="example" type="button"><span>Excel</span></button> <button class="btn btn-outline-primary buttons-pdf buttons-html5" tabindex="0" aria-controls="example" type="button"><span>PDF</span></button> <button class="btn btn-outline-primary buttons-print" tabindex="0" aria-controls="example" type="button"><span>Print</span></button> <button class="btn btn-outline-primary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example" type="button" aria-haspopup="true"><span>Column visibility</span></button> </div></div><div class="col-sm-12 col-md-6"><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example" class="table table-bordered dataTable" role="grid" aria-describedby="example_info">
        <thead>
            <tr role="row">
                <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" aria-sort="descending" style="width: 170px;">Name</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 125px;">Image</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 37px; text-align:center">Control</th>
        </thead>
        <tbody> 

            @if(session()->has('message'))
                <div class="alert alert-success p-3" role="alert">
                    <strong>Success</strong> {{ session()->get('message') }}
                </div>
            @endif

            @foreach($categories as $category)
                <tr role="row" class="odd">
                <td class="sorting_1">{{ $category->name }}</td>
                    <td><img src="{{ asset('images/' . $category->image) }}" style="width:250px; height:150px"></td>
                    <td style="text-align:center">
                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}" style="display:inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger waves-effect waves-light"> <i class="fa fa fa-trash-o"></i> </button>
                        </form>
                        <a href="dashboard/categories/{{ $category->id }}/edit">
                            <button type="button" class="btn btn-success waves-effect waves-light"> <i class="fa fa-edit"></i> </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
            <tfoot>
                <tr role="row">
                    <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" aria-sort="descending" style="width: 170px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 125px;">Image</th>
                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 37px; text-align:center">Control</th>
                </tfoot>
            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
@endsection