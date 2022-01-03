@extends('dashboard.layouts.main')

{{-- Untuk Heading --}}
@section('heading')
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Products</h2>
    </div>
@endsection

{{-- Content --}}
@section('content')
    
    {{-- Form Product --}}
    <div class="row my-2">
        <div class="card p-0">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <h3>Product</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route($url, $product->id ?? '') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if (isset($product))
                                @method('put')
                            @endif
                            <div class="mb-2">
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    <select class="form-select" name="category_id" id="category">

                                        @foreach ($categories as $category)
                                            @if (old('category_id', $product->category_id ?? '') == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>   
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="name">Product Name</label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $product->name ?? '' }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description') ?? $product->description ?? '' }}">
                                <trix-editor input="description"></trix-editor>
                            </div>
                            <div class="form-group mb-2">
                                <label for="stok">Stok</label>
                                <input name="stok" type="number" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') ?? $product->stok ?? '' }}">
                                @error('stok')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?? $product->price ?? '' }}">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label mb-w">Product Image</label>
                                <input type="hidden" name="oldImage" value="{{ $product->image ?? '' }}">
                                
                                @if(isset($product->image))

                                    <img src="{{ asset('storage/'. $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                
                                @else
                
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                
                                @endif
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="mb-2">
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="1" @if ((old('status') ?? $product->status ?? '') == 1)
                                            selected
                                        @endif>on</option>
                                        <option value="0" @if ((old('status') ?? $product->status ?? '') == 0)
                                            selected
                                        @endif>off</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <a href="{{ route('dashboard.category') }}"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
                                <button type="submit" class="btn btn-success btn-sm">{{ $button }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview Image
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            // Mengambil gambar
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvenet){
                imgPreview.src = oFREvenet.target.result;
            }
        };
        // Handle button Trix editor
        // Non active fitur upload image di trix editor
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
        // End Handle button Trix Editor
    </script>

@endsection