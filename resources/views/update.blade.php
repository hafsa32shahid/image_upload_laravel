@extends('layout.client-layout')

@section('content')
   <div class="container">
     <h1>Update Image</h1>

     <form action="{{ route('image.update',$image->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <label for="img" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="img" accept=".jpeg,.png">
            <img src="{{ asset('storage/'.$image->url) }}" id="preview" class=" img-fluid " alt="image">
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
     </form>
   </div>

   <script>
      var image_input = document.getElementById('img');
      var preview = document.getElementById('preview');
      image_input.addEventListener('change',function(event){
         var file = event.target.files[0];
         console.log(file.name)
         preview.src = URL.createObjectURL(file);

      })
      
   </script>
@endsection