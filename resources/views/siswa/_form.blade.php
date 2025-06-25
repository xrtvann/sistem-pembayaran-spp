<div class="space-y-6 max-w-2xl mx-auto">
    <!-- Form Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- NIS Field -->
        <div>
            <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
            <input type="text" name="nis" id="nis"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   value="{{ old('nis', $siswa->nis ?? '') }}">
            @error('nis') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- NISN Field -->
        <div>
            <label for="nisn" class="block text-sm font-medium text-gray-700 mb-1">NISN</label>
            <input type="text" name="nisn" id="nisn"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   value="{{ old('nisn', $siswa->nisn ?? '') }}">
            @error('nisn') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Nama Field -->
        <div class="md:col-span-2">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" id="nama"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   value="{{ old('nama', $siswa->nama ?? '') }}">
            @error('nama') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Jenis Kelamin Field -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
            <select name="jenis_kelamin"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
                <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Tempat/Tanggal Lahir Fields -->
        <div>
            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   value="{{ old('tempat_lahir', $siswa->tempat_lahir ?? '') }}">
            @error('tempat_lahir') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   value="{{ old('tanggal_lahir', $siswa->tanggal_lahir ?? '') }}">
            @error('tanggal_lahir') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Alamat Field -->
        <div class="md:col-span-2">
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
            @error('alamat') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Orang Tua Contact -->
        <div>
            <label for="nama_orang_tua" class="block text-sm font-medium text-gray-700 mb-1">Nama Orang Tua</label>
            <input type="text" name="nama_orang_tua" id="nama_orang_tua"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   value="{{ old('nama_orang_tua', $siswa->nama_orang_tua ?? '') }}">
            @error('nama_orang_tua') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all"
                   value="{{ old('no_hp', $siswa->no_hp ?? '') }}">
            @error('no_hp') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-200">
        <a href="{{ route('siswa.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all text-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
        <button type="submit" class="px-5 py-2.5 border border-transparent rounded-lg font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">
            <i class="fas fa-save mr-2"></i> {{ $submit }}
        </button>
    </div>
</div>