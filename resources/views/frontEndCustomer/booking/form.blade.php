<form action="{{ route('user.booking.store') }}" method="post">
    @csrf
    <label for="services">Services
        @foreach ($services as $service)
            <input type="checkbox" name="service[]" id="" value="{{ $service->id }}">{{ $service->name }}
            {!! $service->description !!}
        @endforeach
    </label>
    <br>
    <label for="date"/>Tanggal
    <input type="date" name="date">
    <br>
    <label for="time"/>Time
    <input type="time" name="start_time">
    @error('start_time')
        {{ $message }}
    @enderror
    <br>
    <button type="submit">Submit</button>
</form>