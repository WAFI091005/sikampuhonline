@php
    // Definisi kelas untuk berbagai status
    $badgeClasses = [
        'pending' => 'bg-yellow-100 text-yellow-800',
        'processing' => 'bg-blue-100 text-blue-800',
        'approved' => 'bg-green-100 text-green-800',
        'rejected' => 'bg-red-100 text-red-800',
    ];
    
    // Ambil kelas yang sesuai, default ke abu-abu jika status tidak dikenal
    $class = $badgeClasses[strtolower($status)] ?? 'bg-gray-100 text-gray-800';
@endphp

<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $class }}">
    {{ ucfirst($status) }}
</span>