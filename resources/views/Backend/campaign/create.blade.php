@extends('Backend.layout')

@section('title', "$name_page Management")

@section('content')
<style>
    .border-red {
    border: 1px solid red;
}
</style>
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
                        <form action="{{ route("$folder.store") }}" method="post" id="my-form-id" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for=""><span class="text-danger">*</span> Provider</label>
                                    <select name="provider_id" class="form-control" >
                                      @foreach($providers as $provider)
                                          <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                      @endforeach
                                  </select>
                                 </div>
                                <div class="col-md-6 mb-2" >
                                    <label for=""><span class="text-danger">*</span> Group</label>
                                    <select name="group_id" class="form-control">
                                      @foreach($groups as $groups)
                                          <option value="{{ $groups->id }}">{{ $groups->name }}</option>
                                      @endforeach
                                  </select>
                                 </div>

                              </div>
                            <div class="form-group mb-2">
                                <label for=""><span class="text-danger">*</span> Title</label>
                                <input type="text" class="form-control required" name="title" placeholder="Title" >
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Title EN</label>
                                <input type="text" class="form-control" name="title_en" placeholder="Title" >
                                @error('title_en')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for=""><span class="text-danger">*</span> Short Detail</label>
                                <textarea name="short_detail" class="form-control required" placeholder="Short detail" ></textarea>
                                @error('short_detail')
                                 <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short Detail EN</label>
                                <textarea name="short_detail_en" class="form-control" placeholder="Short detail"></textarea>
                                @error('short_detail_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Detail</label>
                                <textarea name="detail" class="form-control" placeholder="Detail" id="editor"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Detail EN</label>
                                <textarea name="detail_en" class="form-control" placeholder="Detail" id="editor2"></textarea>
                            </div>

                            <div class="form-group col-4 mb-2">
                                <img id="example_image01" src="{{ asset('assets/noimage.jpg') }}" class="img-fluid"
                                    alt="" style="width:200px">
                            </div>
                            <div class="form-group mb-2">
                                <label for=""><span class="text-danger">*</span> File</label>
                                <input type="file" name="image" accept="image/png, image/gif, image/jpeg"
                                    onchange="readURL01(this);" class="form-control required">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group mb-2">
                                       <label for="">Post name</label>
                                       <input type="text" class="form-control" name="signature" placeholder="">
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
                            <div class="form-check form-switch my-4">
                                <input class="form-check-input" type="checkbox" role="switch" name="top" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Top Recent</label>
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
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            extraPlugins: 'youtube',
        });

        CKEDITOR.replace('editor2', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            extraPlugins: 'youtube',
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

        document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('#my-form-id'); // Replace with your form ID
        const requiredInputs = form.querySelectorAll('.required');

        form.addEventListener('submit', function (event) {
        let isValid = true;
            requiredInputs.forEach(function (input) {
                if (input.value.trim() === '') {
                    isValid = false;
                    input.classList.add('border-red'); // Add a red border to empty required fields
                } else {
                    input.classList.remove('border-red'); // Remove red border from non-empty required fields
                }
            });

            if (!isValid) {
                event.preventDefault(); // Prevent form submission if any required field is empty
            }
        });
     });
    </script>
@endsection
