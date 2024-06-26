@extends('Backend.layout')

@section('title', 'New Management')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Add News </h5>

                        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="">Provider</label>
                                        <select name="provider_id" class="form-control">
                                            @foreach ($providers as $provider)
                                                <option value="{{ $provider->id }}"
                                                    @if ($provider->id == $news->provider_id) selected @endif>{{ $provider->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Category</label>
                                    <select name="news_category" class="form-control">
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $news->news_category) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title"
                                    value="{{ @$news->title }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Title EN</label>
                                <input type="text" class="form-control" name="title_en" placeholder="Title"
                                    value="{{ @$news->title_en }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short Detail</label>
                                <textarea class="form-control" name="short_detail" id="" cols="30" rows="3">{{ @$news->short_detail }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short Detail - EN</label>
                                <textarea class="form-control" name="short_detail_en" id="" cols="30" rows="3">{{ @$news->short_detail_en }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Detail</label>
                                <textarea name="detail" class="form-control" placeholder="Detail" id="editor">{{ @$news->detail }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Detail EN</label>
                                <textarea name="detail_en" class="form-control" placeholder="Detail" id="editor2">{{ @$news->detail_en }}</textarea>
                            </div>
                            <div class="form-group col-4 mb-2">
                                <img id="example_image01"
                                    src="@if ($news->image) {{ asset("backend/$news->image") }}@else {{ asset('assets/noimage.jpg') }} @endif"
                                    class="img-fluid" alt="" <img id="example_image01"
                                    src="{{ asset('assets/noimage.jpg') }}" class="img-fluid" alt=""
                                    style="width:200px">
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
                                        <input type="text" class="form-control" name="signature" placeholder=""
                                            value="{{ @$news->signature }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="draft" @if ($news->status == 'draft') selected @endif>Draft
                                        </option>
                                        <option value="published" @if ($news->status == 'published') selected @endif>
                                            Published</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-check form-switch my-4">
                                <input class="form-check-input" type="checkbox" {{ $news->top == 1 ? 'checked' : '' }}
                                    role="switch" name="top" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Top Recent</label>
                            </div>
                            <div class="form-check form-switch my-4">
                                <input class="form-check-input" type="checkbox" {{ $news->pin == 1 ? 'checked' : '' }}
                                    role="switch" name="pin" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Pin</label>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('news.index') }}" class="btn btn-warning">Back</a>
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
            // extraPlugins: 'youtube',

        });

        CKEDITOR.replace('editor2', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            // extraPlugins: 'youtube',
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
