<!-- resources/views/search-results.blade.php -->

@extends('layouts.app') <!-- This will link to the app layout -->

@section('title', 'Search Results') <!-- Sets the title in the layout -->

@section('content') <!-- This section will be injected into the @yield('content') in the app layout -->
    <div class="container mt-5">
        <h2 class="text-center">Search Results from {{ $from }} to {{ $to }}</h2>

        @if($routes->isEmpty())
            <p class="text-center">No routes found for the selected locations.</p>
        @else
            <ul class="list-group mt-4">
                @foreach($routes as $route)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $route->from }}</span>
                            <span> to </span>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $route->to }}</span>
                            <span> on {{ $date }}</span>
                            <span> at {{ $route->departure_time }}</span> 
                        </div>
                        <div>
                            @php
                                $basePrice = 100; // Base price in Rands
                                $price = ($tripType === 'roundtrip') ? $basePrice * 2 : $basePrice;
                            @endphp
                            <span class="badge badge-primary">R{{ $price }}</span>

                            @if(auth()->check())
                                <a href="{{ route('bookings') }}" class="btn btn-success btn-sm ml-2">Buy Ticket</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-warning btn-sm ml-2">Login to Buy</a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
