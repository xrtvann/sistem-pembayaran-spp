@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto p-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Data Kelas</h1>
        
        <!-- Success Alert Container (Will be shown when there's a success message) -->
        <div id="successAlert" class="hidden fixed top-4 right-4 z-50">
            <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center animate-slide-in">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span id="successMessage"></span>
            </div>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="flex justify-between items-center mb-6">
        <button onclick="openModal('createModal')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-all duration-200 flex items-center gap-2 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            <i class="fas fa-plus"></i>
            <span>Tambah Kelas</span>
        </button>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kelas</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($kelas as $k)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $k->nama_kelas }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <button onclick="openModal('editModal{{ $k->id_kelas }}')" 
                                        class="text-yellow-600 hover:text-yellow-900 bg-yellow-50 hover:bg-yellow-100 px-3 py-1 rounded-md text-xs font-medium transition-colors duration-200 flex items-center gap-1 transform hover:scale-105">
                                    <i class="fas fa-edit text-xs"></i>
                                    <span>Edit</span>
                                </button>
                                <button type="button" onclick="confirmDelete({{ $k->id_kelas }})" 
                                        class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded-md text-xs font-medium transition-colors duration-200 flex items-center gap-1 transform hover:scale-105">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <dialog id="editModal{{ $k->id_kelas }}" class="bg-white rounded-xl shadow-xl p-0 w-full max-w-md animate-modal-in">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-semibold text-gray-800">Edit Kelas</h2>
                                <button onclick="closeModal('editModal{{ $k->id_kelas }}')" class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <form id="editForm{{ $k->id_kelas }}" action="{{ route('kelas.update', $k->id_kelas) }}" method="POST">
                                @csrf @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" value="{{ $k->nama_kelas }}" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                                </div>
                                <div class="flex justify-end space-x-3 mt-6">
                                    <button type="button" onclick="closeModal('editModal{{ $k->id_kelas }}')" 
                                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 transform hover:-translate-y-0.5">
                                        Batal
                                    </button>
                                    <button type="submit" 
                                            class="px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 transform hover:-translate-y-0.5">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Modal -->
<dialog id="createModal" class="bg-white rounded-xl shadow-xl p-0 w-full max-w-md animate-modal-in">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Kelas Baru</h2>
            <button onclick="closeModal('createModal')" class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="createForm" action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
                <input type="text" name="nama_kelas" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
            </div>
            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" onclick="closeModal('createModal')" 
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 transform hover:-translate-y-0.5">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 transform hover:-translate-y-0.5">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</dialog>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl p-6 max-w-md w-full animate-modal-in">
        <div class="flex flex-col items-center">
            <div class="bg-red-100 p-3 rounded-full mb-4">
                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Konfirmasi Penghapusan</h3>
            <p class="text-gray-500 text-center mb-6">Apakah Anda yakin ingin menghapus kelas ini? Data yang dihapus tidak dapat dikembalikan.</p>
            <div class="flex space-x-3">
                <button onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                    Batal
                </button>
                <form id="deleteForm" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 transition-all duration-200">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    dialog {
        border: none !important;
    }
    
    dialog::backdrop {
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        animation: fadeIn 0.3s ease-out forwards;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .animate-modal-in {
        animation: modalIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    
    @keyframes modalIn {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    .animate-slide-in {
        animation: slideIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .animate-bounce-in {
        animation: bounceIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.5);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }
</style>

<!-- JavaScript -->
<script>
    // Check for success message and show alert
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            showSuccessAlert("{{ session('success') }}");
        @endif
    });

    // Show success alert with animation
    function showSuccessAlert(message) {
        const alert = document.getElementById('successAlert');
        const messageEl = document.getElementById('successMessage');
        
        messageEl.textContent = message;
        alert.classList.remove('hidden');
        
        // Hide after 3 seconds
        setTimeout(() => {
            alert.classList.add('animate-slide-out');
            setTimeout(() => {
                alert.classList.add('hidden');
                alert.classList.remove('animate-slide-out');
            }, 500);
        }, 3000);
    }

    // Modal functions
    function openModal(id) {
        const modal = document.getElementById(id);
        modal.showModal();
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.close();
        document.body.style.overflow = 'auto';
    }

    // Delete confirmation
    let currentDeleteId = null;
    
    function confirmDelete(id) {
        currentDeleteId = id;
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        
        form.action = `/kelas/${id}`;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.addEventListener('click', (e) => {
        const modals = document.querySelectorAll('dialog[open]');
        modals.forEach(modal => {
            const dialogDimensions = modal.getBoundingClientRect();
            if (
                e.clientX < dialogDimensions.left ||
                e.clientX > dialogDimensions.right ||
                e.clientY < dialogDimensions.top ||
                e.clientY > dialogDimensions.bottom
            ) {
                modal.close();
                document.body.style.overflow = 'auto';
            }
        });
    });

    // Form submission handling
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...';
        });
    });
</script>
@endsection