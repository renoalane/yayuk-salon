@extends('dashboard.layouts.main')

{{-- Heading --}}
@section('heading')
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Products</h2>
    </div>
@endsection

{{-- Content --}}
@section('content')
    
    <!-- Searching -->
    <div class="row g-3 my-2">
        <form class="d-flex">
            <input class="form-control me-2" type="search" name="q" value="{{ $request['q'] ?? '' }}" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="sub
            mit">Search</button>
            </form>
    </div>
    {{-- End Searching --}}

    {{-- Information CRUD --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
                {{ session('success') }}
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- End Information CRUD --}}

    <!-- Button Create -->
    <div class="row g-3 my-2">
        <div class="col">
            <a href="{{ route('dashboard.product.create') }}"><button class="btn btn-success">+ Product</button></a>
        </div>
    </div>
    {{-- End Button Create --}}

    {{-- Content Table --}}
    <div class="row my-2">
        <h3 class="fs-4 my-3">List Product</h3>
        <div class="col">

            {{-- Table Product --}}
            <table class="table bg-white rounded shadow-sm table-hover table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Check product --}}
                    @forelse ($products as $product)
                    
                        <tr>
                            <th scope="row">{{ ($products->currentPage()-1) * $products->perPage() + $loop->iteration }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            @if ($product->status == 1)
                                <td>on</td>
                            @else
                                <td>off</td>
                            @endif
                            <td class="text-center">
                                {{-- button edit --}}
                                <a href="{{ route('dashboard.product.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"> Edit</i></a>
                        
                                {{-- button delete --}}
                                <button class="btn btn-sm btn-danger" data-bs-toggle='modal' data-bs-target='#deleteModal'><i class="far fa-trash-alt"> Hapus</i></button>
                            </td>
                        </tr>
                    @empty
                        <th colspan="7" class="text-center">Empty Products</th>    
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
        
            {{ $products->appends($request)->links() }}
        </div>
    </div>
    {{-- End Content Table --}}

     {{-- POp Up Delete noted --}}
     @if ($products->total())
         
        <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure..?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('dashboard.product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
     
    @endif

@endsection