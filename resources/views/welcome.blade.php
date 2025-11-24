<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SikampuhOnline</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center; /* posisi vertikal tengah */
            align-items: center;    /* posisi horizontal tengah */
            height: 100vh;          /* tinggi penuh layar */
            margin: 0;
            background-color: blueviolet; 
            text-align: center;     /* teks di tengah */
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di SikampuhOnline</h1>
    anjay
    anjay banget
    <marquee behavior="" direction=""><h2>Biarkan kelompok ini memasak</h2></marquee>
</body>
</html>
=======
<x-app-layout>

    {{-- Ini harus dipanggil jika Anda ingin Sambutan muncul di Home Page, 
         walaupun LeadershipStructure sudah mencakup Sambutan --}}
    @livewire('sections.village-chief-address')
    
    @livewire('sections.village-overview')

    @livewire('sections.village-news')

    @livewire('sections.leadership-structure')

</x-app-layout>
>>>>>>> cfe6549 (Add all core Laravel files, Livewire components, and initial migration files)
