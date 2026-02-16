@extends('layout.client-layout')
@section('content')

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <div class="container">
        <form action="{{ route('image.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" accept=".jpeg,.png">
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection