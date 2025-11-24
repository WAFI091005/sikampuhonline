<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sebagai Rakyat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center"
      style="background-image: url('{{ asset('images/bg-desa.jpg') }}');">

    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl w-full max-w-md px-8 py-10 border-t-4 border-green-600">
        
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Desa" class="w-20 h-20">
        </div>

        <h2 class="text-center text-xl font-bold text-gray-800 mb-6">
            LOGIN SEBAGAI RAKYAT
        </h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-600 text-sm p-3 rounded mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <!-- Input NIK -->
            <div class="mb-5">
                <div class="flex items-center bg-gray-100 rounded-full px-4 py-2">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 2a5 5 0 015 5v1a5 5 0 01-10 0V7a5 5 0 015-5zM3 17a7 7 0 0114 0v1H3v-1z"
                              clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="nik" id="nik" required autofocus
                           placeholder="Masukkan NIK Sesuai KTP"
                           class="w-full bg-transparent focus:outline-none text-gray-700 placeholder-gray-400">
                </div>
                @error('nik')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Tanggal Lahir -->
            <div class="mb-5">
                <div class="flex items-center bg-gray-100 rounded-full px-4 py-2">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 00-1-1H6zm10 7H4v9a2 2 0 002 2h8a2 2 0 002-2V9z"
                              clip-rule="evenodd" />
                    </svg>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                           class="w-full bg-transparent focus:outline-none text-gray-700 placeholder-gray-400">
                </div>
                @error('tanggal_lahir')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Login -->
            <div class="mt-6">
                <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-full transition">
                    LOGIN
                </button>
            </div>

            <!-- Link ke Admin -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Login sebagai Admin?
                    <a href="{{ url('/admin/login') }}" class="text-green-600 font-semibold hover:underline">
                        Klik di sini
                    </a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>
