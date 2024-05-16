@extends('Backend.layout')

@section('title', 'VTuber Gallery')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Add Group </h5>

                    <form action="{{ route('groups.store') }}" method="post" >
                      @csrf

                      <div class="form-group mb-2">
                        <label for="">Title</label>
                        <input type="text" name="name"  class="form-control" required>
                      </div>


                      <button type="submit" class="btn btn-success mt-2">Create</button>
                    </form>

                    </div>
                </div>
            </div>
          </div>
      </div>

  @endsection

  @section('scripts')
  {{-- <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script> --}}
  <script src="{{ URL::asset('backend/assets/libs/ckeditor/ckeditor.js') }}"></script>
  <script>
      CKEDITOR.config.allowedContent = true;
      CKEDITOR.config.iframe_attributes = {
            sandbox: 'allow-scripts allow-same-origin'
      }
      CKEDITOR.replace('editor', {
          filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
          filebrowserUploadMethod: 'form',
      });
      CKEDITOR.config.allowedContent = true;
      CKEDITOR.replace('editor2', {
          filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
          filebrowserUploadMethod: 'form',
      });

    function readURL01(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#example_image01').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
  @endsection
