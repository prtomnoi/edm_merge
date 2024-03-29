@extends('../layout')

@section('title', 'VTuber Gallery')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="fw-semibold mb-4">Setting</h5>
                <a href="{{ route('table-settings.edit', $tableSetting->id) }}" class="btn btn-primary my-2">Edit Settings</a>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                 @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Facebook</td>
                            <td>{{ $tableSetting->facebook }}</td>
                        </tr>
                        <tr>
                            <td>YouTube</td>
                            <td>{{ $tableSetting->youtube }}</td>
                        </tr>
                        <tr>
                            <td>URL</td>
                            <td>{{ $tableSetting->url }}</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>{{ $tableSetting->contact }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
