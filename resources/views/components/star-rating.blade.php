{{-- resources/views/components/star-rating.blade.php --}}

@props([
    'rating' => 0,
    'maxStars' => 5,
])

@php
    // Bulatkan rating ke 0.5 terdekat untuk menangani half-star
    $ratingRounded = round($rating * 2) / 2;
@endphp

<div {{ $attributes->merge(['class' => 'inline-flex items-center text-yellow-400']) }}>
    @for ($i = 1; $i <= $maxStars; $i++)
        @if ($i <= $ratingRounded)
            {{-- Bintang Penuh --}}
            <i class="fas fa-star"></i>
        @elseif ($i - 0.5 === $ratingRounded)
            {{-- Setengah Bintang --}}
            <i class="fas fa-star-half-alt"></i>
        @else
            {{-- Bintang Kosong --}}
            <i class="far fa-star"></i>
        @endif
    @endfor
</div>