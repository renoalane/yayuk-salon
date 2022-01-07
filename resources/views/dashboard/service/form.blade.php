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
                        <h3>Service</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route($url, $service->id ?? '') }}" method="post">
                            @csrf
                            @if (isset($service))
                                @method('put')
                            @endif
                            <div class="form-group mb-2">
                                <label for="name" class="mb-2">Service Name</label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $service->name ?? '' }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description') ?? $service->description ?? '' }}">
                                <trix-editor input="description" placeholder="Maxsimal 50 huruf"></trix-editor>
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="price" class="mb-2">Price</label>
                                <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?? $service->price ?? '' }}" placeholder="(ex:20000)" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="duration" class="mb-2">Duration</label>
                                <input name="duration" type="number" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration') ?? $service->duration ?? '' }}" placeholder="(in Minute, ex:60)" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9">
                                @error('duration')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-2">
                                <div class="form-group mb-3">
                                    <label for="status" class="mb-2">Status</label>
                                
                                    <select name="status" id="status" class="form-select">
                                        <option value="1" @if ((old('status') ?? $service->status ?? '') == 1)
                                            selected
                                        @endif>Active</option>
                                        <option value="0" @if ((old('status') ?? $service->status ?? '') == 0)
                                            selected
                                        @endif>Non Active</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{ route('dashboard.service') }}"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
                                <button type="submit" class="btn btn-success btn-sm">{{ $button }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection