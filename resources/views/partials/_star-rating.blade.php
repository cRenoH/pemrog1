{{-- resources/views/partials/_stars.blade.php --}}
@php
    $rating = $rating ?? 0; // default value
    $maxStars = $maxStars ?? 5;
    $ratingRounded = round($rating * 2) / 2;
@endphp

<div class="inline-flex items-center text-yellow-400">
    @for ($i = 1; $i <= $maxStars; $i++)
       {{-- Logika bintang sama seperti di atas --}}
    @endfor
</div>