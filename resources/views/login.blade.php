@extends('layout.client-layout')
@section('content')

 <div class="flex-column d-flex align-items-center justify-content-center " style="height: 100vh; background-color: burlywood;">
       <div class="w-50 p-4 border rounded">
        <h1 class="text-center fw-bold fs-1">Login User</h1>
         <form method="POST" action="{{ route("auth.login") }}">
             @method('POST')
           @csrf

            <div class="mb-3">
                <label for="Email1" class="form-label">Email address</label>
                <input type="email"  name="email" class="form-control" value="{{ old('email') }}" id="Email1">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                 <div class="text-danger">
                @error('email')
                {{ $message }}
                @enderror</div>
            </div>
            <div class="mb-3">
                <label for="Password1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}" id="Password1">
              <div class="text-danger">
                @error('password')
                {{ $message }}
                @enderror</div>
            </div>
         
            <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
            <a class="mx-auto text-center" href="{{ route('auth.register') }}">-> Register</a>
        </form>
       </div>
        
    </div>
 
@endsection