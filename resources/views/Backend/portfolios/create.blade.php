@extends('Backend.layout')

@section('title', "$name_page Management")

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Add {{ @$name_page }} </h5>
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route("$folder.store") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12 mb-2" >
                                    <label for="">Group</label>
                                    <select name="group_id" class="form-control">
                                      @foreach($groups as $groups)
                                          <option value="{{ $groups->id }}">{{ $groups->name }}</option>
                                      @endforeach
                                  </select>
                                 </div>

                              </div>
                            <div class="form-group mb-2">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Title">
                            </div>

                            <div class="form-group col-4 mb-2">
                                <img id="example_image01" src="{{ asset('assets/noimage.jpg') }}" class="img-fluid"
                                    alt="" style="width:200px">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">File</label>
                                <input type="file" name="image" accept="image/png, image/gif, image/jpeg"
                                    onchange="readURL01(this);" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group mb-2">
                                       <label for="">Link out</label>
                                       <input type="text" class="form-control" name="link" placeholder="">
                                       </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group mb-2">
                                       <label for="">Status</label>
                                       <select name="status" class="form-control">
                                         <option value="draft">Draft</option>
                                         <option value="published">Published</option>
                                     </select>
                                     </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Create</button>
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
