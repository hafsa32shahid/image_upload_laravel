@extends('layout.client-layout')
@section('content')
    <div class="flex-column d-flex align-items-center justify-content-center " style="height: 100vh; background-color: burlywood;">
       <div class="w-50 p-4 border rounded">
        <h1 class="text-center fw-bold fs-1">Register User</h1>
         <form method="POST" action="{{ route('auth.create') }}">
            @method("POST")
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">FullName</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name">
                <div class="text-danger">
                @error('name')
                {{ $message }}
                @enderror</div>
            </div>
            <div class="mb-3">
                <label for="Email1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="Email1">
                <div id="emailHelp"  class="form-text">We'll never share your email with anyone else.</div>
                 <div class="text-danger">
                @error('email')
                {{ $message }}
                @enderror</div>
            </div>
            <div class="mb-3">
                <label for="Password1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}" id="Password1">
               <div class="text-danger"> @error('password')
                {{ $message }}
                @enderror</div>
            </div>
            <div class="mb-3">
                <label for="Password2" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="Password2">
                @error('password_confirmation')
                {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
            <a class="mx-auto text-center" href="{{ route('login') }}">-> Login</a>
        </form>
       </div>
        
    </div>
@endsection