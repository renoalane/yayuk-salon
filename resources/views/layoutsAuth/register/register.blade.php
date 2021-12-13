@extends('layoutsAuth.main')

@section('container')
<div class="row justify-content-center m-0">
    <div class="col-lg-4">
        <main class="form-registration">
            <h1 class="h3 mb-4 fw-normal text-center">Register</h1>
            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                {{-- error handling --}}
                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{-- message error --}}
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{-- message error --}}
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{-- message error --}}
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="name@example.com" required value="{{ old('phone') }}">
                    <label for="phone">Phone</label>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{-- message error --}}
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{-- message error --}}
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password_confirmation" class="form-control rounded-bottom @error('password') is-invalid @enderror" placeholder="Password" required>
                    <label for="password_confirmation">Password Confirmation</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{-- message error --}}
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="w-100 btn btn-lg mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already Registered ? <a href="/login">Login!</a></small>
        </main>    
    </div>
</div>
@endsection