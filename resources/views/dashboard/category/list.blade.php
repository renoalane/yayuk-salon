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
            <a href="{{ route('dashboard.category.create') }}"><button class="btn btn-success">+ Category</button></a>
        </div>
    </div>
    {{-- End Button Create --}}

    {{-- Content Table --}}
    <div class="row my-2">
        <h3 class="fs-4 mb-3">List Category</h3>
        <div class="col">

            {{-- Cek Ada category --}}
            @if ($categories->total())

                <table class="table bg-white rounded shadow-sm table-hover table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        
                            <tr>
                                <th scope="row">{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                @if ($category->status == 1)
                                    <td>Active</td>
                                @else
                                    <td>Non Active</td>
                                @endif
                                <td>
                                    {{-- button edit --}}
                                    <a href="{{ route('dashboard.category.edit', $category->id) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"> Edit</i></a>
                            
                                    {{-- button delete --}}
                                    <button class="btn btn-sm btn-danger" data-bs-toggle='modal' data-bs-target='#deleteModal'><i class="far fa-trash-alt"> Hapus</i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
            
                {{ $categories->appends($request)->links() }}

            @else
                <h4 class="text-center p-3">Category Is Not Found</h4>
            @endif

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
                        <form action="{{ route('dashboard.category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>        

@endsection