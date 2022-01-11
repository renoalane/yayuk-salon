<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
    <link rel="shortcut icon" href="{{asset('assets/img/logoYayukSalon.png')}}" type="image/x-icon" />
    <title>Invoice Booking</title>
    <style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    </style>
</head>
<body>
    
    <div class="container">
        <section class="px-lg-5 py-3">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2>Yayuk Salon</h2>
                        <p class="mb-0">Jl. Raya Puhpelem, Randukuning, Puhpelem,<br> Kabupaten Wonogiri, Jawa Tengah 57698</p>
                    </div>
                    <div class="invoice-title border-bottom">
                        <h2>Invoice Booking</h2>
                        <h4 class="float-end">{{ $booking->code_booking }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <address>
                            <strong>Nama :</strong><br>
                                {{ $booking->name }}
                            </address>
                        </div>
                        <div class="col-6 text-end">
                            <address>
                                <strong>Booking at:</strong><br>
                                {{date('l, d F Y', strtotime($booking->date))}}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <address>
                                <strong>Created at:</strong><br>
                                {{date('l, d F Y', strtotime($booking->created_at))}}
                            </address>
                        </div>
                        <div class="col-6 text-end">
                            <address>
                                <strong>Time:</strong><br>
                                {{date('H:i',strtotime($booking->start_time))}}  -  {{date('H:i',strtotime($booking->end_time))}}
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-heading">
                            <h3 class="card-title"><strong>List Service</strong></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="row">#</th>
                                            <th class="text-center">Service Name</th>
                                            <th class="text-center">Duration</th>
                                            <th class="text-end">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($booking->detail_booking as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $detail->service_name }}</td>
                                            <td class="text-center">{{ $detail->service_duration }} minute</td>
                                            <td class="text-end">Rp. {{ number_format($detail->service_price) }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" class="thick-line"></td>
                                            <td class="thick-line text-center"><strong>Total</strong></td>
                                            <td class="thick-line text-end">Rp. {{ number_format($booking->total_price) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <a href="{{ route('user.booking') }}"><button type="button" class="btn btn-sm btn-danger">Back</button></a>
                <button class="btn btn-sm btn-secondary" onclick="window.print()">Print this page</button>
            </div>
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>