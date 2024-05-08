@extends('Backend.layout')

@section('title', 'New Management')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Add News </h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    @if ($errors->has('custom'))
                                        <li>{{ $errors->first('custom') }}</li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Provider</label>
                                    <select name="provider_id" class="form-control">
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Category</label>
                                    <select name="news_category" class="form-control">
                                        <option value="1">News</option>
                                        <option value="2">Activity</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Title - th</label>
                                <input type="text" class="form-control" name="title" placeholder="" id="title">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Title - en</label>
                                <input type="text" class="form-control" name="title_en" placeholder="" id="title_en">
                            </div>
                            <div>
                                <input type="text" name="slug" id="slug" hidden>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short Detail</label>
                                <textarea class="form-control" name="short_detail" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short Detail - EN</label>
                                <textarea class="form-control" name="short_detail_en" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Detail - th</label>
                                <textarea name="detail" class="form-control" placeholder="Detail" id="editor"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Detail - en</label>
                                <textarea name="detail_en" class="form-control" placeholder="Detail" id="editor2"></textarea>
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
                                <input class="form-check-input" type="checkbox" role="switch" name="top"
                                    id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Top Recent</label>
                            </div>
                            <div class="form-check form-switch my-4">
                                <input class="form-check-input" type="checkbox" role="switch" name="pin"
                                    id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Pin</label>
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
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            extraPlugins: 'youtube',
        });
        CKEDITOR.config.allowedContent = true;
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

        /**
         * Translates a string to a Thai slug format.
         * @param {string} inputString - The string to translate.
         * @returns {string} The translated string.
         * ref : https://gist.github.com/silkyland/004e9c74ed9ed8b76d613bc2e4e48f52?fbclid=IwAR2Urbt_R87o-fnVv8J_ke2cwhHoDoSkpgxWqKsvXxk30SfsWXvi1OVChE4
         */

        $('#title').on('change', function(event){
            if(!$('#slug').val())
            {
                $('#slug').val(toThaiSlug($( this ).val()));
            }

        });
        $('#title_en').on('change', function(event){
            if (!$('#slug').val())
            {
                $('#slug').val(toThaiSlug($( this ).val()));
            }
        });
        function toThaiSlug(inputString) {
            // Replace spaces with hyphens
            let slug = inputString.replace(/\s+/g, '-');

            // Translate some characters to Thai
            slug = slug.replace('%', 'เปอร์เซนต์');

            // Remove all non-word characters
            slug = slug.replace(/[^\p{L}\p{N}\s-]/gu, '');

            // Replace multiple hyphens with a single one
            slug = slug.replace(/--+/, '-');

            // Remove any remaining leading or trailing hyphens
            slug = slug.replace(/^-+|-+$/g, '');

            return slug;
        }
    </script>
@endsection
