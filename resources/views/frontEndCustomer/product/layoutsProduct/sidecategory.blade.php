<link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
<!-- Category -->
<p class="text-center mt-1 mb-0 p-1 category-text border-bottom">Category</p>
<div class="scrollmenu mb-3">
  <a class="d-inline-block text-center p-1 fs-6
  @if(($request['category'] ?? '') == '')
  active
  @endif
  " href="{{ route('user.product') }}">All</a>
  @foreach ($categories as $category)
    <a class="d-inline-block text-center p-1 fs-6 
    @if($category->id == ($request['category'] ?? ''))
        active
    @endif
    " href="/products?category={{ $category->id }}">{{ $category->name }}</a>
  @endforeach
</div>
<!-- End Category -->
