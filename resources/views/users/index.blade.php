@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Manajemen Pengguna</h2>

    <!-- Tombol Tambah -->
    <button onclick="openModal('tambahModal')" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 hover:bg-blue-700">+ Tambah Pengguna</button>

    <!-- Tabel -->
    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-2 px-4">#</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Role</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $index + 1 }}</td>
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4 capitalize">{{ $user->role }}</td>
                    <td class="py-2 px-4 flex gap-2">
                        <button onclick="openEditModal({{ $user }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus pengguna ini?')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="tambahModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
    <div class="bg-white p-6 rounded shadow w-full max-w-md">
        <h3 class="text-lg font-bold mb-4">Tambah Pengguna</h3>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <input name="name" placeholder="Nama" required class="w-full p-2 border rounded mb-3">
            <input name="email" type="email" placeholder="Email" required class="w-full p-2 border rounded mb-3">
            <select name="role" class="w-full p-2 border rounded mb-3">
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
            <input name="password" type="password" placeholder="Password" required class="w-full p-2 border rounded mb-3">
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('tambahModal')" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
    <div class="bg-white p-6 rounded shadow w-full max-w-md">
        <h3 class="text-lg font-bold mb-4">Edit Pengguna</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input id="editName" name="name" placeholder="Nama" required class="w-full p-2 border rounded mb-3">
            <input id="editEmail" name="email" type="email" placeholder="Email" required class="w-full p-2 border rounded mb-3">
            <select id="editRole" name="role" class="w-full p-2 border rounded mb-3">
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
            <input name="password" type="password" placeholder="Password (kosongkan jika tidak ganti)" class="w-full p-2 border rounded mb-3">
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('editModal')" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}
function openEditModal(user) {
    document.getElementById('editForm').action = `/users/${user.id}`;
    document.getElementById('editName').value = user.name;
    document.getElementById('editEmail').value = user.email;
    document.getElementById('editRole').value = user.role;
    openModal('editModal');
}
</script>
@endsection
