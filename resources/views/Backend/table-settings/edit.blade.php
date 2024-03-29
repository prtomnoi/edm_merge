@extends('../layout')

@section('title', 'VTuber Gallery')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="fw-semibold mb-4">Setting</h5>
          
                <form method="POST" action="{{ route('table-settings.update', $tableSetting->id) }}">
                    @csrf
                    @method('PUT')
            
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="{{ $tableSetting->facebook }}">
                    </div>
            
                    <div class="form-group">
                        <label for="youtube">YouTube</label>
                        <input type="text" class="form-control" name="youtube" value="{{ $tableSetting->youtube }}">
                    </div>
            
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" name="url" value="{{ $tableSetting->url }}">
                    </div>
            
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" value="{{ $tableSetting->contact }}">
                    </div>
            
                    <button type="submit" class="btn btn-primary my-2">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
