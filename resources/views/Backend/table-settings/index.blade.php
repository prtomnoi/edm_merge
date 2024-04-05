@extends('Backend.layout')

@section('title', 'VTuber Gallery')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="fw-semibold mb-4">Setting</h5>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @foreach ($tableSetting as $key => $item)
                    <h4>{{$item->provider?->name}}</h4>
                    <a href="{{ route('table-settings.edit', $item->id) }}" class="btn btn-primary my-2">Edit Settings</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20%">Field</th>
                                <th style="width: 80%%">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Facebook</td>
                                <td>{{ $item->facebook }}</td>
                            </tr>
                            <tr>
                                <td>YouTube</td>
                                <td>{{ $item->youtube }}</td>
                            </tr>
                            <tr>
                                <td>URL</td>
                                <td>{{ $item->url }}</td>
                            </tr>
                            <tr>
                                <td>Contact</td>
                                <td>{{ $item->contact }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
