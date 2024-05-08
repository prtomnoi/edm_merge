@extends('.Backend.layout')

@section('title', "$name_page Management")

@section('content')
<style>
.show-img {
    display: inline-block;
    width: 200px;
    padding-bottom: 200px;
    height: 0;
    position: relative;
    margin: 0.5rem;
    cursor: default;
}
.remove-image {
    display: none;
    position: absolute;
    top: -10px;
    right: -10px;
    border-radius: 10em;
    padding: 2px 6px 3px;
    text-decoration: none;
    font: 700 21px/20px sans-serif;
    background: #555;
    border: 3px solid #fff;
    color: #FFF;
    box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 2px 4px rgba(0,0,0,0.3);
    text-shadow: 0 1px 2px rgba(0,0,0,0.5);
    -webkit-transition: background 0.5s;
    transition: background 0.5s;
}
.show-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
}
</style>
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Add {{ @$name_page }} </h5>

                        <form action="{{ route("$folder.update",$row->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group mb-2">
                                <label for="">Title - th</label>
                                <input type="text" class="form-control" name="title" value="{{ $row->title }}" placeholder="">
                             </div>
                             <div class="form-group mb-2">
                               <label for="">Title - en</label>
                               <input type="text" class="form-control" name="title_en" value="{{ $row->title_en }}" placeholder="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short Detail (255 characters)</label>
                                <textarea class="form-control" name="short_detail"  id="short-detail" data-max-length="255" cols="30" rows="3">{{ $row->short_detail }}</textarea>
                                <span id="char-count">0 / 255</span>
                             </div>
                             <div class="form-group mb-2">
                                 <label for="">Short Detail - EN (255 characters)</label>
                                 <textarea class="form-control" name="short_detail_en" id="short-detail-en" cols="30" rows="3" data-max-length="255">{{ $row->short_detail_en }}</textarea>
                                 <span id="char-count-en">0 / 255</span>
                             </div>

                             <div class="form-group mb-2">
                               <label for="">Detail - th</label>
                               <textarea name="detail" class="form-control"  placeholder="Detail" id="editor">{{ $row->detail }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                               <label for="">Detail - en</label>
                               <textarea name="detail_en" class="form-control"  placeholder="Detail" id="editor2">{{ $row->detail_en }}</textarea>
                            </div>

                            <div class="form-group col-4 mb-2">
                                <img id="example_image01" src="@if($row->image){{asset("backend/$row->image")}}@else {{asset("backend/assets/noimage.jpg")}}@endif" class="img-fluid" alt="" style="width:200px">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">File</label>
                                <input type="file" name="image" accept="image/png, image/gif, image/jpeg" onchange="readURL01(this);" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                   <div class="form-group mb-2">
                                       <label for="">Post name</label>
                                       <input type="text" class="form-control" name="signature" value="{{ $row->signature }}" placeholder="">
                                       </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="">Event date</label>
                                        <input type="date" class="form-control" name="event_date" value="{{ $row->event_date }}" placeholder="">
                                        </div>
                                 </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="draft" @if($row->status == "draft") selected @endif>Draft</option>
                                            <option value="published" @if($row->status == "published") selected @endif>Published</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <h6 for="exampleInputEmail3">รูปภาพเพิ่มเติม</h6>
                                @foreach($row->images as $image)
                                 <div class="show-img">
                                      <img src="{{ asset("backend/$image->image") }}" alt="">
                                      <a class="remove-image" onclick="delete_images({{$image->id}})" style="display: inline; cursor: pointer;">&#215;</a>
                                 </div>
                                 @endforeach
                            </div>

                            <label for="exampleInputEmail3">More pictures (You can upload more than 1 photo at a time)</label>
                            <div class="input-field mb-4">

                              <div class="input-images-1" style="padding-top: .5rem;"></div>
                            </div>



                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{route("$folder.index")}}" class="btn btn-warning">Back</a>
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


    function delete_images(id) {
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
                    type: 'GET',
                    url: `/admin/{{$folder}}-image/${id}`,
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
