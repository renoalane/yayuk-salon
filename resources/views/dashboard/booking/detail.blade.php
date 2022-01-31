@extends('dashboard.layouts.main')

{{-- Heading --}}
@section('heading')
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Bookings</h2>
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
                        <h3>{{ $booking->code_booking }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-9">
            
                        <div class="row">
                            <div class="col-4">
                                <ol class="list-group list-group-flush">
                                    <li class="list-group-item border-bottom-0">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Nama User</div>
                                            {{$booking->user_name}}
                                        </div>
                                    </li>
                                    <li class="list-group-item border-bottom-0">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Phone</div>
                                            +62 {{$booking->user->phone}}
                                        </div>
                                    </li>
                                    <li class="list-group-item border-bottom-0">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Email</div>
                                            {{$booking->user->email}}
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-4">
                                <ol class="list-group list-group-flush">
                                    <li class="list-group-item border-bottom-0">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Created at</div>
                                            {{$booking->created_at->format('l, j F Y')}}
                                        </div>
                                    </li>
                                    <li class="list-group-item border-bottom-0">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Booking at</div>
                                            {{date('l, d F Y', strtotime($booking->date))}}
                                        </div>
                                    </li>
                                    <li class="list-group-item border-bottom-0">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">When</div>
                                            {{date('H:i',strtotime($booking->start_time))}}  WIB-  {{date('H:i',strtotime($booking->end_time))}} WIB
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-4">
                                <ol class="list-group list-group-flush">
                                    <li class="list-group-item border-bottom-0">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Status</div>
                                            @if ($booking->status === 0)
                                            <h1 class="display-6 text-secondary fw-bold">New</h1>
                                            @elseif($booking->status === 1)
                                            <h2 class="display-7 text-primary fw-bold">Confirmed</h1>
                                            @elseif($booking->status === 2)
                                            <h1 class="display-6 text-success fw-bold">Done</h1>
                                            @else
                                            <h2 class="display-6 text-danger fw-bold">Rejected</h2>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="list-group-item border-bottom-0">

                                    </li>
                                </ol>
                                {{-- Confirmed --}}
                                <a href="https://api.whatsapp.com/send?phone=62{{$booking->user->phone}}&text=Yayuk%20Salon%0A*Booking%20Confirmation*%0A%0ACode%20Booking%20%3A%0A*{{ $booking->code_booking }}*%0A%0ANama%20Customer%20%3A%0A*{{ $booking->user->name }}*%0A%0AWaktu%20Booking%20%3A%0A*{{date('d F Y', strtotime($booking->date))}}%2C%20{{ date('H:i',strtotime($booking->start_time)) }}%20wib%20-%20{{date('H:i',strtotime($booking->end_time))}}%20wib*%0A%0ATotal%20%3A%0A*Rp.%20{{ number_format($booking->total_price) }}*%0A%0AKeterangan%20%3A%0A*Telah%20dikonfirmasi*%20oleh%20admin%2C%20Harap%20datang%2010%20menit%20sebelum%20waktu%20booking.%0ATagihan%20booking%20bisa%20di%20akses%20di%20link%20%3A%0Ayayuksalon.com%2Fbooking%2F{{ $booking->code_booking }}%0A%0A*NB*%20%3A%20Jika%20adanya%20pembatalan%2C%20mohon%20chat%20terhadap%20admin%206%20jam%20sebelum%20waktu%20booking.%0A%0A*Yayuk%20Salon*%0AJl%20Raya%20Puhpelem%2C%20Randukuning%2C%20Puhpelem%2C%20Kabupaten%20Wonogiri%2C%20Jawa%20Tengah%2057698%0A%0ATerima%20Kasih" class="btn btn-primary" target="_blank">Whatsapp Confirmation</a>
                                
                                {{-- Rejected --}}
                                <a href="https://api.whatsapp.com/send?phone=62{{$booking->user->phone}}&text=Yayuk%20Salon%0A*Booking%20Rejected*%0A%0ACode%20Booking%20%3A%0A*{{ $booking->code_booking }}*%0A%0ANama%20Customer%20%3A%0A*{{ $booking->user->name }}*%0A%0AWaktu%20Booking%20%3A%0A*{{date('d F Y', strtotime($booking->date))}}%2C%20{{ date('H:i',strtotime($booking->start_time)) }}%20wib%20-%20{{date('H:i',strtotime($booking->end_time))}}%20wib*%0A%0AKeterangan%20%3A%0A*Telah%20dibatalkan*%20oleh%20admin%2C%0A%0AAlasan%3A%0A(Diisi%0AAdmin)%0A%0AMohon%20Maaf" class="btn mt-2 btn-danger" target="_blank">Whatsapp Rejected</a>
                            </div>
                        </div>

                        {{-- Table --}}
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Service Name</th>
                                    <th>Duration</th>
                                    <th class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking->detail_booking as $detail)
                                    <tr>
                                        <td>{{ $detail->service_name }}</td>
                                        <td>{{ $detail->service_duration }} minute</td>
                                        <td class="text-end">Rp. {{ number_format($detail->service_price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th colspan="3" class="text-end">Rp. {{ number_format($booking->total_price) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- End Table --}}

                        {{-- Form Status --}}
                        <form action="{{ route('dashboard.booking.update', $booking->code_booking) }}" method="post">
                            @csrf
                            @method('put')
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
                        {{-- End Form Status --}}
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
    </script>

@endsection