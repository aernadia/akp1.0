@extends('employees-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of employees</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('employee-management.create') }}">Add new employee</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('employee-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['First Name', 'No Kad Pengenalan'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['firstname'] : '', isset($searchingVals) ? $searchingVals['nokadpengenalan'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="8%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">Picture</th>
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Employee Name</th>
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">No. Kad Pengenalan</th>
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Jawatan</th>
                <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tempat Bertugas: activate to sort column ascending">Tempat Bertugas</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="LantikanPertama: activate to sort column ascending">Tarikh Lantikan Pertama</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="PengesahanSemasa: activate to sort column ascending">Tarikh Pengesahan Lantikan Pertama</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="LantikanSemasa: activate to sort column ascending">Tarikh Lantikan Semasa</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Department</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Division</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr role="row" class="odd">
                  <td><img src="../{{$employee->picture }}" width="50px" height="50px"/></td>
                  <td class="sorting_1">{{ $employee->firstname }}</td>
                  <td class="hidden-xs">{{$employee->nokadpengenalan}}</td>
                  <td class="sorting_1">{{ $employee->jawatan }}</td>
                  <td class="hidden-xs">{{ $employee->address }}</td>
                  <td class="hidden-xs">{{ $employee->lantikanpertama }}</td>
                  <td class="hidden-xs">{{ $employee->pengesahanpertama }}</td>
                  <td class="hidden-xs">{{ $employee->lantikansemasa }}</td>
                  <td class="hidden-xs">{{ $employee->department_name }}</td>
                  <td class="hidden-xs">{{ $employee->division_name }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('employee-management.destroy', ['id' => $employee->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('employee-management.edit', ['id' => $employee->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                         <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <tr role="row">
                <th width="8%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">Picture</th>
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Employee Name</th>
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">No. Kad Pengenalan</th>
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Jawatan</th>
                <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tempat Bertugas: activate to sort column ascending">Tempat Bertugas</th>
                {{-- <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Age</th> --}}
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="LantikanPertama: activate to sort column ascending">Tarikh Lantikan Pertama</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="PengesahanSemasa: activate to sort column ascending">Tarikh Pengesahan Lantikan Pertama</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="LantikanSemasa: activate to sort column ascending">Tarikh Lantikan Semasa</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Department</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Division</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($employees)}} of {{count($employees)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $employees->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection