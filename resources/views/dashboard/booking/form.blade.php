@extends('dashboard.layouts.main')

{{-- Heading --}}
@section('heading')
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Service</h2>
    </div>
@endsection

{{-- Content --}}
@section('content')
    

    <div class="row my-2">
        <div class="card p-0">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <h3>Booking</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('dashboard.booking.update', $booking->code_booking) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group mb-2">
                                <label for="name" class="mb-2">Code Booking</label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $booking->code_booking ?? '' }}" disabled>
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="name" class="mb-2"></label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $booking->code_booking ?? '' }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-2">
                                <div class="form-group mb-3">
                                    <label for="status" class="mb-2">Status</label>
                                
                                    <select name="status" id="status" class="form-select">

                                        <option value="0" @if ((old('status') ?? $booking->status ?? '') == 0)
                                            selected
                                        @endif>New</option>
                                        <option value="1" @if ((old('status') ?? $booking->status ?? '') == 1)
                                            selected
                                        @endif>Confirmed</option>
                                        <option value="2" @if ((old('status') ?? $booking->status ?? '') == 2)
                                            selected
                                        @endif>Done</option>
                                        <option value="3" @if ((old('status') ?? $booking->status ?? '') == 3)
                                            selected
                                        @endif>Rejected</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{ route('dashboard.booking') }}"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection