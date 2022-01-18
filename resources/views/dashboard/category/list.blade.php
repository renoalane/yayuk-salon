@extends('dashboard.layouts.main')

{{-- Heading --}}
@section('heading')
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Categories</h2>
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
    {{-- End Information CRUD --}}

    <!-- Button Create -->
    <div class="row g-3 my-2">
        <div class="col">
            <a href="{{ route('dashboard.category.create') }}"><button class="btn btn-success">+ Category</button></a>
        </div>
    </div>
    {{-- End Button Create --}}

    {{-- Content Table --}}
    <div class="row my-2">
        <h3 class="fs-4 my-3">List Category</h3>
        <div class="col">

            {{-- Table Categories --}}

            <table class="table bg-white rounded shadow-sm table-hover table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($categories as $category)
                    
                        <tr>
                            <th scope="row">{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->iteration }}</th>
                            <td>{{ $category->name }}</td>
                            @if ($category->status == 1)
                                <td>Active</td>
                            @else
                                <td>Non Active</td>
                            @endif
                            <td class="text-center">
                                {{-- button edit --}}
                                <a href="{{ route('dashboard.category.edit', $category->id) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"> Edit</i></a>
                        
                                {{-- button delete --}}
                                <button class="btn btn-sm btn-danger btnDelete" data-bs-toggle='modal' data-id= "{{ $category->id }}"data-bs-target='#deleteModal'><i class="far fa-trash-alt"> Delete</i></button>
                            </td>
                        </tr>
                    @empty
                        <th colspan="4" class="text-center">Empty Category</th>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
        
            {{ $categories->appends($request)->links() }}

        </div>
    </div>
    {{-- End Content Table --}}


     {{-- POp Up Delete noted --}}
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
                    <form action="" class="formDelete" method="POST">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    

@endsection