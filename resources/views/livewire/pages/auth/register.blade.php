<x-guest-layout>
    <h2 class="text-2xl font-bold mb-4">Registrasi Penduduk</h2>

    <form method="POST" action="{{ route('penduduk.register') }}">
        @csrf

        <div>
            <label for="nik">NIK</label>
            <input id="nik" name="nik" type="text" required class="block w-full mt-1">
        </div>

        <div class="mt-3">
            <label for="nama">Nama Lengkap</label>
            <input id="nama" name="nama" type="text" required class="block w-full mt-1">
        </div>

        <div class="mt-3">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input id="tempat_lahir" name="tempat_lahir" type="text" required class="block w-full mt-1">
        </div>

        <div class="mt-3">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input id="tanggal_lahir" name="tanggal_lahir" type="date" required class="block w-full mt-1">
        </div>

        <div class="mt-3">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required class="block w-full mt-1">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mt-3">
            <label for="alamat">Alamat</label>
            <input id="alamat" name="alamat" type="text" required class="block w-full mt-1">
        </div>

        <div class="mt-3">
            <label for="pekerjaan">Pekerjaan</label>
            <input id="pekerjaan" name="pekerjaan" type="text" class="block w-full mt-1">
        </div>

        <div class="mt-3">
            <label for="status">Status</label>
            <select id="status" name="status" required class="block w-full mt-1">
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah">Menikah</option>
                <option value="Cerai">Cerai</option>
            </select>
        </div>

        <div class="mt-4 flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-indigo-600">
                Sudah punya akun? Login
            </a>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">
                Daftar
            </button>
        </div>
    </form>
</x-guest-layout>
