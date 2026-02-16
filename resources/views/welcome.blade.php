@extends('layout.client-layout')
@section('content')

<div class="container">
        @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif
     <div>
        <a href="{{ route('image.create') }}" class="btn btn-primary btn-lg my-3">Create</a>
     </div>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($data) && count($data) > 0)
                @foreach ($data as $index => $img)
                    <tr>
                        <td>{{ $img['id'] }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $img['url']) }}" alt="Uploaded Image" width="100">
                        </td>
                        <td>
                           

                            <!-- Delete button -->
                            <form action="{{ route('image.delete', $img['id']) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this image?')">
                                    Delete
                                </button>
                            </form>
                           <a class="btn btn-info" href="{{ route('image.edit',$img['id']) }}">Update</a>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No images found.</td>
                </tr>
            @endif
         <div class="d-flex align-items-center justify-content-end">
    </tbody>
    </table>

</div>

</body>

</html>
@endsection