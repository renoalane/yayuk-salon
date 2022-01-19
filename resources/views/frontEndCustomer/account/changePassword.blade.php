@extends('frontEndCustomer.layouts.main')

{{-- Container --}}
@section('container')
    <section class="p-5 account">
        <div class="container my-5">
            <div class="row my-2">
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
                    <h3 class="mb-4">Change Password</h3>
                    <form action="{{ route('user.password.update', $user->username) }}" method="post">
                        @csrf
                        @method('put')
                        
                        <div class="form-group mb-2">
                            <label for="current_password" class="mb-2">Current Password</label>
                            <input name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="current password" required>
                            @error('current_password')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password" class="mb-2">New password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="new password" required>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password" class="mb-2">New Password Confirmation</label>
                            <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="New password confirmation" required>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
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