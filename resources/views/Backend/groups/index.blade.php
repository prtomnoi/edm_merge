@extends('../layout')

@section('title', 'VTuber Gallery')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 d-flex align-items-stretch">
              
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Group</h5>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                         @endif
                        <a href="{{ route('groups.create') }}" class="btn btn-primary mb-3"> <i class="ti ti-plus"></i> Add
                            data</a>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="myTable">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">#</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Title</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Created</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(@$groups)
                                    @foreach(@$groups as $key=>$item)
                                      <tr>
                                        
                                          <td style="width:5%;">{{$key+1}}</td>
                                          <td style="width:10%;">{{$item->name}}</td></td>
                                          <td style="width:15%;">{{ $item->created_at }}</td>
                                       
                                          <td class="text-center" style="width:10%;">
                                              <a href="{{route("groups.edit",$item->id)}}" class="btn btn-warning"><i class="ti ti-pencil"></i> Edit</a>
                                              <a href="javascript:void(0)" onclick="destroy('{{$item->id}}')" class="btn btn-danger"><i class="ti ti-trash"></i> Delete</a>
                                          </td>
                                      </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
      var fullUrl = window.location.origin + window.location.pathname;
      function destroy(id) {
        Swal.fire({
            title: "Delete",
            text: "Do you want to delete your item ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: `Cancel`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: `/groups/${id}`,
                    data: {
                      _token: '{{ csrf_token() }}',
                    },
                    dataType: 'json',
                    success: function(data) {
                      Swal.fire({
                          icon: 'success',
                          title: data.message,
                          text: data.desc,
                          showCancelButton: false,
                          confirmButtonText: 'Close',
                      }).then((result) => {
                          location.reload();
                      });
                    },
                    error: function(data) {
                      Swal.fire({
                          icon: 'error',
                          title: data.responseJSON.message,
                          text: data.responseJSON.desc,
                          showCancelButton: false,
                          confirmButtonText: 'Close',
                      });
                    }
                });
            }
        });
      }

      function status(ids) {
        const $this = $(this),
            id = ids;
        $.ajax({
            type: 'get',
            url: fullUrl + '/status/' + id,
            success: function(res) {
                if (res == false) {
                    $(this).prop('checked', false)
                }
            }
        });
    }
    </script>
@endsection