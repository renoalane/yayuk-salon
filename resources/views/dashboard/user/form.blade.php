@extends('dashboard.layouts.main')

{{-- Heading --}}
@section('heading')
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">User</h2>
    </div>
@endsection

{{-- Content --}}
@section('content')
    

    <div class="row my-2">
        <div class="card p-0">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <h3>User</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('dashboard.user.update',$user->id) }}" method="post">
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
                                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') ?? $user->username}}">
                                @error('username')
                                    {{ $message }}
                                @enderror
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
                                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $user->phone}}">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-2">
                                <div class="form-group mb-3">
                                    <label for="is_admin" class="mb-2">Level</label>
                                
                                    <select name="is_admin" id="is_admin" class="form-select">
                                        <option value="1" @if ((old('is_admin') ?? $user->is_admin) == 1)
                                            selected
                                        @endif>Admin</option>
                                        <option value="0" @if ((old('is_admin') ?? $user->is_admin) == 0)
                                            selected
                                        @endif>Customer</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-group mb-3">
                                    <label for="status" class="mb-2">Status</label>
                                
                                    <select name="status" id="status" class="form-select">
                                        <option value="1" @if ((old('status') ?? $user->status) == 1)
                                            selected
                                        @endif>On</option>
                                        <option value="0" @if ((old('status') ?? $user->status) == 0)
                                            selected
                                        @endif>Off</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{ route('dashboard.user') }}"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
                                <button type="submit" class="btn btn-success btn-sm">{{ $button }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection