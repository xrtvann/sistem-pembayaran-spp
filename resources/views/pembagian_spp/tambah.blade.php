@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Tambah Siswa ke Kelas</h1>

    <form action="{{ route('pembagian_spp.store_siswa', $pembagian->id_pembagian) }}" method="POST">
        @csrf

        @if($siswa->isEmpty())
            <p class="text-gray-600">Semua siswa sudah memiliki kelas pada tahun akademik ini.</p>
        @else
            <div class="mb-4 flex justify-between items-center">
                <div>
                    <label for="rowCount" class="mr-2">Tampilkan:</label>
                    <select id="rowCount" class="border rounded px-2 py-1" onchange="updateRowsPerPage(this.value)">
                        <option value="25" {{ request('perPage', 25) == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                        <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>Semua</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input type="text" id="searchInput" placeholder="Cari siswa..." class="border rounded px-2 py-1" onkeyup="searchTable()">
                </div>
            </div>

            <table class="w-full table-auto border text-sm mb-4" id="siswaTable">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-2 py-1"><input type="checkbox" onclick="toggleCheckbox(this)"></th>
                        <th class="border px-2 py-1">NIS</th>
                        <th class="border px-2 py-1">NISN</th>
                        <th class="border px-2 py-1">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswa as $item)
                    <tr class="siswa-row">
                        <td class="border text-center">
                            <input type="checkbox" name="siswa_id[]" value="{{ $item->id }}">
                        </td>
                        <td class="border px-2 py-1 text-center">{{ $item->nis }}</td>
                        <td class="border px-2 py-1 text-center">{{ $item->nisn }}</td>
                        <td class="border px-2 py-1">{{ $item->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($siswa instanceof \Illuminate\Pagination\LengthAwarePaginator && request('perPage') != 'all')
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-600">
                            Menampilkan {{ $siswa->firstItem() }} - {{ $siswa->lastItem() }} dari {{ $siswa->total() }} siswa
                        </p>
                    </div>
                    <div class="flex space-x-2">
                        @if($siswa->onFirstPage())
                            <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded cursor-not-allowed">Sebelumnya</span>
                        @else
                            <a href="{{ $siswa->previousPageUrl() }}&perPage={{ request('perPage', 25) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Sebelumnya</a>
                        @endif

                        @foreach(range(1, min(5, $siswa->lastPage())) as $page)
                            <a href="{{ $siswa->url($page) }}&perPage={{ request('perPage', 25) }}" class="px-3 py-1 {{ $siswa->currentPage() == $page ? 'bg-blue-600 text-white' : 'bg-blue-500 text-white' }} rounded hover:bg-blue-600">
                                {{ $page }}
                            </a>
                        @endforeach

                        @if($siswa->hasMorePages())
                            <a href="{{ $siswa->nextPageUrl() }}&perPage={{ request('perPage', 25) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Selanjutnya</a>
                        @else
                            <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded cursor-not-allowed">Selanjutnya</span>
                        @endif
                    </div>
                </div>
            @endif

            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('pembagian_spp.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
                @if(!$siswa->isEmpty())
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                @endif
            </div>
        @endif
    </form>
</div>

<script>
    function toggleCheckbox(source) {
        const checkboxes = document.querySelectorAll('input[name="siswa_id[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
        });
    }

    function updateRowsPerPage(value) {
        const url = new URL(window.location.href);
        url.searchParams.set('perPage', value);
        window.location.href = url.toString();
    }

    function searchTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('siswaTable');
        const rows = table.getElementsByClassName('siswa-row');

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let found = false;
            
            for (let j = 1; j < cells.length; j++) { // Skip checkbox column
                if (cells[j]) {
                    const txtValue = cells[j].textContent || cells[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            
            rows[i].style.display = found ? '' : 'none';
        }
    }
</script>
@endsection