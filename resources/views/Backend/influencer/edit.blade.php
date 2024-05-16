@extends('Backend.layout')

@section('title', "$name_page Management")

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Update {{ @$name_page }} </h5>
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

                        <form action="{{ route("$folder.update",$row->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group mb-2">
                                <label for="">Group Type</label>
                                <select name="type_name" class="form-control" id="">
                                    <option value="influencer" {{ $row->type_name === 'influencer' ? 'selected' : '' }}>influencer</option>
                                    <option value="vTuber" {{ $row->type_name === 'vTuber' ? 'selected' : '' }}>vTuber</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group mb-2">
                                <label for=""><span class="text-danger">*</span> Influencer Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Influencer Name"  value="{{@$row->name}}">
                            </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for=""><span class="text-danger">*</span> Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{@$row->title}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for=""><span class="text-danger">*</span> Video Link</label>
                                <input type="text" class="form-control" name="video_link" placeholder="link.." value="{{@$row->video_link}}">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-2">
                                    <label for="">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="{{@$row->facebook}}" placeholder="Facebook">
                                </div>
                                <div class="form-group col-md-4 mb-2">
                                  <label for="">Follower</label>
                                  <input type="text" class="form-control" name="facebook_subscribe" onkeypress="return chkNumber(event)"value="{{@$row->facebook_subscribe}}" placeholder="Subscribe">
                               </div>
                               <div class="form-group col-md-4 mb-2">
                                  <label for="">Link</label>
                                  <input type="text" class="form-control" name="facebook_url" value="{{@$row->facebook_url}}"  placeholder="URL">
                              </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-4 mb-2">
                                      <label for="">Twitter</label>
                                      <input type="text" class="form-control" name="twitter" value="{{@$row->twitter}}" placeholder="Twitter">
                                  </div>
                                  <div class="form-group col-md-4 mb-2">
                                    <label for="">Follower</label>
                                    <input type="text" class="form-control" name="twitter_subscribe" onkeypress="return chkNumber(event)" value="{{@$row->twitter_subscribe}}" placeholder="Subscribe">
                                 </div>
                                 <div class="form-group col-md-4 mb-2">
                                    <label for="">Link</label>
                                    <input type="text" class="form-control" name="twitter_url" value="{{@$row->twitter_url}}"  placeholder="URL">
                                </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 mb-2">
                                        <label for="youtube">Youtube</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="youtube" name="youtube" value="{{@$row->youtube}}"  placeholder="Youtube">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" id="loadButton" type="button"><i class="ti ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group col-md-4 mb-2">
                                        <label for="">Follower</label>
                                        <input type="text" class="form-control" id="youtube_subscribe" name="youtube_subscribe" value="{{ isset($row->youtube_subscribe) ? number_format($row->youtube_subscribe) : '' }}"  onkeypress="return chkNumber(event)" value="0" placeholder="Subscribe">
                                    </div>
                                  <div class="form-group col-md-4 mb-2">
                                      <label for="">Link</label>
                                      <input type="text" class="form-control" name="youtube_url" value="{{@$row->youtube_url}}"  placeholder="URL">
                                  </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-4 mb-2">
                                          <label for="">Instagram</label>
                                          <input type="text" class="form-control" name="instagram" value="{{@$row->instagram}}" placeholder="Instagram">
                                     </div>
                                         <div class="form-group col-md-4 mb-2">
                                         <label for="">Follower</label>
                                         <input type="text" class="form-control" name="instagram_subscribe" onkeypress="return chkNumber(event)" value="{{@$row->instagram_subscribe}}" placeholder="Subscribe">
                                     </div>
                                     <div class="form-group col-md-4 mb-2">
                                         <label for="">Link</label>
                                         <input type="text" class="form-control" name="instagram_url" value="{{@$row->instagram_url}}"  placeholder="URL">
                                     </div>
                                     </div>

                            <div class="form-group col-4 mb-2">
                                 <img id="example_image01" src="@if($row->image){{asset("backend/$row->image")}}@else {{asset("backend/assets/noimage.jpg")}}@endif"  alt="" style="width:200px">
                             </div>
                             <div class="form-group mb-2">
                                <label for="">Creator Photo </label>
                               <input type="file" name="image" accept="image/png, image/gif, image/jpeg" onchange="readURL01(this);" class="form-control">
                            </div>
                            <div class="form-group col-2 mb-2">
                                <img id="example_image02" src="@if($row->icon){{asset("backend/$row->icon")}}@else {{asset("backend/assets/noimage.jpg")}}@endif"   alt="" style="width:100px">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Channel Logo</label>
                                <input type="file" name="icon" accept="image/png, image/gif, image/jpeg" onchange="readURL02(this);" class="form-control">
                            </div>


                            <div class="form-group mb-2">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="draft" @if($row->status == "draft") selected @endif>Draft</option>
                                    <option value="published" @if($row->status == "published") selected @endif>Published</option>
                                </select>
                            </div>
                            <div class="form-check form-switch my-4">
                                <input class="form-check-input" type="checkbox" {{ $row->pin == 1 ? 'checked' : '' }} role="switch" name="pin" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Pin</label>
                              </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{route("$folder.index")}}" class="btn btn-warning">Back</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Influencer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
  CKEDITOR.replace( 'editor' );

  function readURL01(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#example_image01').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL02(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#example_image02').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
    $('#loadButton').click(function() {
        var searchText = $('#youtube').val();
        loadApiData(searchText);
    });
});

function loadApiData(searchText) {
    $.ajax({
        url: '/load-api-data',
        type: 'GET',
        dataType: 'json',
        data: {
            name: searchText,

        },
        success: function(data) {
           var modalBody = $('#modalBody');
            modalBody.empty(); // Clear existing content if any
            var itemsToDisplay = 5; // Set the limit here
            data.data.items.slice(0, itemsToDisplay).forEach(function(entry) {
            var entryHtml = `
                <div class="media mb-3">
                    <img src="${entry.social_image}" class="img-fluid" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">${entry.social_name}</h5>
                        <p>Subscribers: ${entry.subscribers}</p>
                        <button class="btn btn-primary update-subscribers" data-subscribers="${entry.subscribers}" data-youtube="${entry.social_name}">
                            Update Subscribers
                        </button>
                    </div>
                </div>
            `;
            modalBody.append(entryHtml);
        });

            $('#myModal').modal('show');
            $('.update-subscribers').click(function() {
                var subscribers = $(this).data('subscribers');
                var youtube = $(this).data('youtube');
                $('#youtube_subscribe').val(subscribers.toLocaleString());
                $('#youtube').val(youtube);
                $('#myModal').modal('hide');
            });
        },
        error: function(xhr, status, error) {

        }
    });
}
</script>
@endsection
