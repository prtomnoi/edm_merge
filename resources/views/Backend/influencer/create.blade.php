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
                                <label for=""><span class="text-danger">*</span> Group Type</label>
                                <select name="type_name" class="form-control" id="">
                                    <option >Influencer</option>
                                    <option >vTuber</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for=""><span class="text-danger">*</span> Influencer Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Influencer Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for=""><span class="text-danger">*</span> Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" required>
                                    </div>
                                </div>
                            </div>
  
                            <div class="form-group mb-2">
                                <label for=""><span class="text-danger">*</span> Video Link</label>
                                <input type="text" class="form-control" name="video_link" placeholder="link.." required> 
                            </div>
                          
                            <div class="row">
                              <div class="form-group col-md-4 mb-2">
                                  <label for="">Facebook</label>
                                  <input type="text" class="form-control" name="facebook" value="" placeholder="Facebook">
                              </div>
                              <div class="form-group col-md-4 mb-2">
                                <label for="">Follower</label>
                                <input type="text" class="form-control" name="facebook_subscribe" onkeypress="return chkNumber(event)" value="0" placeholder="Subscribe">
                             </div>
                             <div class="form-group col-md-4 mb-2">
                                <label for="">Link</label>
                                <input type="text" class="form-control" name="facebook_url"  placeholder="URL">
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-2">
                                    <label for="">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="" placeholder="Twitter">
                                </div>
                                <div class="form-group col-md-4 mb-2">
                                  <label for="">Follower</label>
                                  <input type="text" class="form-control" name="twitter_subscribe" onkeypress="return chkNumber(event)" value="0" placeholder="Subscribe">
                               </div>
                               <div class="form-group col-md-4 mb-2">
                                  <label for="">Link</label>
                                  <input type="text" class="form-control" name="twitter_url"  placeholder="URL">
                              </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-4 mb-2">
                                    <label for="youtube">Youtube</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="loadButton" type="button"><i class="ti ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group col-md-4 mb-2">
                                    <label for="">Follower</label>
                                    <input type="text" class="form-control" id="youtube_subscribe" name="youtube_subscribe" onkeypress="return chkNumber(event)" value="0" placeholder="Subscribe">
                                </div>
                                <div class="form-group col-md-4 mb-2">
                                    <label for="">Link</label>
                                    <input type="text" class="form-control" name="youtube_url"  placeholder="URL">
                                </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 mb-2">
                                        <label for="">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" value="" placeholder="Instagram">
                                   </div>
                                       <div class="form-group col-md-4 mb-2">
                                       <label for="">Follower</label>
                                       <input type="text" class="form-control" name="instagram_subscribe" onkeypress="return chkNumber(event)" value="0" placeholder="Subscribe">
                                   </div>
                                   <div class="form-group col-md-4 mb-2">
                                       <label for="">Link</label>
                                       <input type="text" class="form-control" name="instagram_url"  placeholder="URL">
                                   </div>
                                   </div>
                               
                              
                          

                          

                            <div class="form-group col-4 mb-2">
                                <img id="example_image01" src="{{ asset('assets/noimage.jpg') }}" class="img-fluid" alt="" style="width:200px">
                            </div>
                            <div class="form-group mb-2">
                                <label for=""><span class="text-danger">*</span> Creator Photo </label>
                                <input type="file" name="image" accept="image/png, image/gif, image/jpeg"
                                    onchange="readURL01(this);" class="form-control" required>
                            </div>
                            <div class="form-group col-4 mb-2">
                                <img id="example_image02" src="{{ asset('assets/noimage.jpg') }}" class="img-fluid" alt="" style="width:100px">
                            </div>
                            <div class="form-group mb-2">
                                <label for=""><span class="text-danger">*</span> Channel Logo</label>
                                <input type="file" name="icon" accept="image/png, image/gif, image/jpeg" onchange="readURL02(this);" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                            <div class="form-check form-switch my-4">
                                <input class="form-check-input" type="checkbox" role="switch" name="pin" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Pin</label>
                              </div>      
                            <button type="submit" class="btn btn-success">Create</button>
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
    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
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
           console.log(data.data);
           var modalBody = $('#modalBody');
            modalBody.empty(); // Clear existing content if any
            var itemsToDisplay = 5; // Set the limit here
            data.data.items.slice(0, itemsToDisplay).forEach(function(entry) {
            var entryHtml = `
                <div class="media mb-3">
                    <img src="${entry.social_image}" class="img-fluid" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">${entry.social_name}</h5>
                        <p>Subscribers: ${entry.subscribers.toLocaleString()}</p>
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
