<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function switchForm(type) {
            document.getElementById('adminForm').style.display = type === 'admin' ? 'block' : 'none';
            document.getElementById('siswaForm').style.display = type === 'siswa' ? 'block' : 'none';
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="flex justify-center space-x-4 mb-6">
            <button onclick="switchForm('admin')" class="text-sm text-blue-600 font-semibold">Admin/Petugas</button>
            <button onclick="switchForm('siswa')" class="text-sm text-green-600 font-semibold">Siswa</button>
        </div>

        {{-- Admin/Petugas Form --}}
        <form id="adminForm" method="POST" action="" style="display: block;">
            @csrf
            <input type="hidden" name="tipe_login" value="admin">
            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Login Admin</button>
        </form>

        {{-- Siswa Form --}}
        <form id="siswaForm" method="POST" action="" style="display: none;">
            @csrf
            <input type="hidden" name="tipe_login" value="siswa">
            <div class="mb-4">
                <label>NISN</label>
                <input type="text" name="nisn" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded">Login Siswa</button>
        </form>

        <p class="mt-4 text-center text-sm">Belum punya akun? <a href="/register" class="text-blue-600">Daftar</a></p>
    </div>
</body>
</html>
