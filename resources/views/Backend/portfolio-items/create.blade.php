@extends('../layout')

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
                          
                            <div class="form-group mb-2">
                                <label for="">Title - th</label>
                                <input type="text" class="form-control" name="title" placeholder="">
                             </div>
                             <div class="form-group mb-2">
                               <label for="">Title - en</label>
                               <input type="text" class="form-control" name="title_en" placeholder="">
                            </div>
                            <div class="form-group mb-2">
                               <label for="">Short Detail (255 characters)</label>
                               <textarea class="form-control" name="short_detail"  id="short-detail" data-max-length="255" cols="30" rows="3"></textarea>
                               <span id="char-count">0 / 255</span>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short Detail - EN (255 characters)</label>
                                <textarea class="form-control" name="short_detail_en" id="short-detail-en" cols="30" rows="3" data-max-length="255"></textarea>
                                <span id="char-count-en">0 / 255</span>
                            </div>                            
                             <div class="form-group mb-2">
                               <label for="">Detail - th</label>
                               <textarea name="detail" class="form-control"  placeholder="Detail" id="editor"></textarea>
                            </div>
                            <div class="form-group mb-2">
                               <label for="">Detail - en</label>
                               <textarea name="detail_en" class="form-control"  placeholder="Detail" id="editor2"></textarea>
                            </div>
                            <div class="form-group col-4 mb-2">
                               <img id="example_image01" src="{{asset("assets/noimage.jpg")}}" class="img-fluid" alt="" style="width:200px">
                           </div>
                           <div class="form-group mb-2">
                             <label for="">File</label>
                             <input type="file" name="image" accept="image/png, image/gif, image/jpeg" onchange="readURL01(this);" class="form-control">
                           </div>
                         
                            <div class="row">
                                <div class="col-md-4">
                                   <div class="form-group mb-2">
                                       <label for="">Post name</label>
                                       <input type="text" class="form-control" name="signature" placeholder="">
                                       </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="">Event date</label>
                                        <input type="date" class="form-control" name="event_date" placeholder="">
                                        </div>
                                 </div>
                                <div class="col-md-4">
                                   <div class="form-group mb-2">
                                       <label for="">Status</label>
                                       <select name="status" class="form-control">
                                         <option value="draft">Draft</option>
                                         <option value="published">Published</option>
                                     </select>
                                     </div>
                                </div>
                            </div>
                          

                            <label for="exampleInputEmail3">More pictures (You can upload more than 1 photo at a time)</label>
                            <div class="input-field">
            
                              <div class="input-images-1" style="padding-top: .5rem;"></div>
                            </div>

                
                            <button type="submit" class="btn btn-success mt-4">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
$('.input-images-1').imageUploader();
CKEDITOR.config.allowedContent = true;
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
        document.addEventListener("DOMContentLoaded", function () {
        const textarea = document.getElementById("short-detail");
        const charCount = document.getElementById("char-count");
        const maxLength = textarea.getAttribute("data-max-length");
        const textareaEn = document.getElementById("short-detail-en");
        const charCountEn = document.getElementById("char-count-en");
        const maxLengthEn = textareaEn.getAttribute("data-max-length");

        textarea.addEventListener("input", function () {
            const currentLength = textarea.value.length;
            charCount.textContent = currentLength + " / " + maxLength;

        
            if (currentLength > maxLength) {
                textarea.value = textarea.value.substring(0, maxLength);
                charCount.textContent = maxLength + " / " + maxLength;
            }
        });
        textareaEn.addEventListener("input", function () {
            const currentLengthEn = textareaEn.value.length;
            charCountEn.textContent = currentLengthEn + " / " + maxLengthEn;

            // Limit the input to the specified maximum length
            if (currentLengthEn > maxLengthEn) {
                textareaEn.value = textareaEn.value.substring(0, maxLengthEn);
                charCountEn.textContent = maxLengthEn + " / " + maxLengthEn;
            }
        });
    });
 
    </script>
@endsection
