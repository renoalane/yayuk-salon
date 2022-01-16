@extends('frontEndCustomer.layouts.main')

{{-- Container --}}
@section('container')
    <section class="p-5 account">
        <div class="container my-5">
            <div class="row my-2">

                {{-- Success --}}
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        {{ session('success') }}
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                {{-- Failed --}}
                @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>
                        {{ session('failed') }}
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('user.account.update', $user->username) }}" method="post">
                        @csrf
                        @method('put')
                        
                        <div class="form-group mb-2">
                            <label for="name" class="mb-2">Name</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name}}">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="username" class="mb-2">Username</label>
                            <input type="text" class="form-control" value="{{ $user->username}}" disabled>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email" class="mb-2">Email</label>
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email}}">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="phone" class="mb-2">Phone</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="inputGroup-sizing-lg">+62</span>
                                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $user->phone}}">
                            </div>
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </div>
                        {{-- <div class="form-group mb-2">
                            <label for="password" class="mb-2">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') ?? $user->password}}">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div> --}}
                        <div class="form-group mb-0">
                            <a href="{{ route('home') }}"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection