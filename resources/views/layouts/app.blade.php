<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistem Pembayaran SPP - Miftahul Khoir</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sky: {
                            light: '#4F9CF9',
                            DEFAULT: '#4F9CF9',
                            dark: '#3A7BC8'
                        },
                        lemon: {
                            DEFAULT: '#FCE96A',
                            hover: '#FADF40'
                        },
                        gray: {
                            dark: '#2E2E2E',
                            medium: '#6B7280',
                            light: '#F1F5F9'
                        },
                        ice: '#F9FBFF',
                        success: '#38B000',
                        danger: '#FF6B6B'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-out forwards',
                        'slide-up': 'slideUp 0.3s ease-out forwards',
                        'pulse-slow': 'pulse 3s infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(-10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        slideUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        }
                    }
                }
            }
        }
    </script>

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Alpine JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>

    <style>
        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #F1F5F9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94A3B8;
        }

        /* Active menu item indicator */
        .active-menu-item {
            position: relative;
            background-color: #E1EFFE;
            color: #4F9CF9;
        }

        .active-menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: #4F9CF9;
            border-radius: 0 4px 4px 0;
        }

        .sidebar-item:hover {
            background-color: #E1EFFE;
            color: #4F9CF9;
        }

        .sidebar-item:hover i {
            color: #4F9CF9;
        }

        /* Elegant card hover effect */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Button hover effect */
        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(79, 156, 249, 0.3);
        }
    </style>
</head>

@php
    $user = Auth::user();
    $siswa = session('siswa');
@endphp

<body class="flex h-screen bg-ice font-sans" x-data="{ sidebarOpen: window.innerWidth >= 1024, mobileSidebarOpen: false }"
    @resize.window="sidebarOpen = window.innerWidth >= 1024">

    <!-- Sidebar Backdrop (mobile) -->
    <div x-show="mobileSidebarOpen" @click="mobileSidebarOpen = false"
        class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden transition-opacity duration-300"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    </div>

    <!-- Modern Sidebar -->
    <aside x-show="sidebarOpen"
        class="fixed lg:static inset-y-0 left-0 z-30 w-64 bg-gray-light shadow-xl transition-transform duration-300 ease-in-out border-r border-gray-200"
        :class="{ 'translate-x-0': mobileSidebarOpen, '-translate-x-full lg:translate-x-0': !mobileSidebarOpen }">

        <!-- Logo with glass effect -->
        <div class="p-6 flex items-center space-x-4 border-b border-gray-200">
            <div
                class="w-12 h-12 rounded-xl bg-white flex items-center justify-center shadow-md border border-gray-200">
                <img src="{{ asset('images/WhatsApp_Image_2025-05-10_at_15.04.35-removebg-preview.png') }}"
                    alt="Logo" class="w-10 h-10 object-contain">
            </div>
            <div>
                <h1 class="text-lg font-bold text-gray-dark">SPP MTS</h1>
                <h1 class="text-lg font-bold text-gray-dark">Mifthaul khair</h1>
            </div>
        </div>

        <nav class="mt-6 px-4 space-y-1 h-[calc(100%-180px)] overflow-y-auto">
            <div class="mb-4 text-xs font-semibold text-gray-medium uppercase tracking-wider px-2">Menu Utama</div>

            <a href="/dashboard"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 sidebar-item active-menu-item">
                <i class="bx bxs-dashboard rtext-xl text-sky-light"></i>
                <span class="text-gray-dark">Dashboard</span>
                <span class="ml-auto bg-sky-light text-white text-xs px-2 py-1 rounded-full">3</span>
            </a>

            @if ($user)
                <a href="/users"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 sidebar-item">
                    <i class="bx bxs-user text-xl text-gray-medium"></i>
                    <span class="text-gray-dark">User</span>
                </a>

                <div class="relative" x-data="{ open: true }">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 sidebar-item"
                        :class="{ 'active-menu-item': open }">
                        <div class="flex items-center space-x-3">
                            <i class="bx bxs-data text-xl"
                                :class="{ 'text-sky-light': open, 'text-gray-medium': !open }"></i>
                            <span class="text-gray-dark">Master Data</span>
                        </div>
                        <i class="bx bxs-chevron-down text-xs transition-transform duration-200"
                            :class="{ 'transform rotate-180 text-sky-light': open, 'text-gray-medium': !open }"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        class="flex flex-col mt-1 ml-8 pl-3 space-y-2 border-l-2 border-gray-300">
                        <a href="/siswa"
                            class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-gray-100 transition-colors duration-200">
                            <i class="bx bxs-graduation text-gray-medium"></i>
                            <span class="text-gray-dark">Data Siswa</span>
                        </a>
                        <a href="/kelas"
                            class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-gray-100 transition-colors duration-200">
                            <i class="bx bxs-school text-gray-medium"></i>
                            <span class="text-gray-dark">Data Kelas</span>
                        </a>
                        <a href="/spp"
                            class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-gray-100 transition-colors duration-200">
                            <i class="bx bxs-credit-card text-gray-medium"></i>
                            <span class="text-gray-dark">Biaya SPP</span>
                        </a>
                        <a href="/akademik"
                            class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-gray-100 transition-colors duration-200">
                            <i class="bx bxs-calendar text-gray-medium"></i>
                            <span class="text-gray-dark">Tahun Akademik</span>
                        </a>
                        <a href="/pembagian-spp"
                            class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-gray-100 transition-colors duration-200">
                            <i class="bx bxs-group text-gray-medium"></i>
                            <span class="text-gray-dark">Pembagian SPP</span>
                        </a>
                    </div>
                </div>

                <div class="mb-4 mt-6 text-xs font-semibold text-gray-medium uppercase tracking-wider px-2">Transaksi
                </div>

                <a href="{{ route('transaksi') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 sidebar-item bg-sky-light/10 border border-sky-light/30 animate-pulse-slow">
                    <i class="bx bxs-credit-card-alt text-xl text-sky-light"></i>
                    <span class="text-gray-dark font-medium">Pembayaran</span>
                    <span class="ml-auto bg-sky-light text-white text-xs px-2 py-1 rounded-full">New</span>
                </a>

                <a href="{{ route('transaksi.history') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 sidebar-item">
                    <i class="bx bxs-receipt text-xl text-gray-medium"></i>
                    <span class="text-gray-dark">Riwayat Pembayaran</span>
                </a>

                <a href="/laporan"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 sidebar-item">
                    <i class="bx bxs-report text-xl text-gray-medium"></i>
                    <span class="text-gray-dark">Laporan Keuangan</span>
                </a>
            @endif

            @if ($siswa)
                <a href="{{ route('transaksi') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 sidebar-item bg-sky-light/10 border border-sky-light/30 animate-pulse-slow">
                <i class="bx bxs-credit-card-alt text-xl text-sky-light"></i>
                <span class="text-gray-dark font-medium">Pembayaran</span>
                <span class="ml-auto bg-sky-light text-white text-xs px-2 py-1 rounded-full">New</span>
            </a>
            @endif
        </nav>

        <!-- User Profile (fixed at bottom) -->
        <div class="absolute bottom-0 w-full p-4 border-t border-gray-200 bg-gray-light">
            <div class="flex items-center space-x-3 group cursor-pointer" x-data="{ dropdownOpen: false }">
                <div class="w-8 h-8 rounded-full bg-sky-light flex items-center justify-center text-white">
                    <i class="bx bxs-user text-sm"></i>
                </div>
                <div @click="dropdownOpen = !dropdownOpen" class="flex-1">
                    <p class="text-sm font-medium text-gray-dark">Admin</p>
                    <p class="text-xs text-gray-medium">Super Admin</p>
                </div>
                <i class="bx bxs-chevron-down text-xs text-gray-medium transition-transform duration-200"
                    :class="{ 'transform rotate-180': dropdownOpen }"></i>

                <!-- Dropdown Menu -->
                <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute left-0 bottom-full mb-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 border border-gray-200"
                    @click.stop>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-dark hover:bg-sky-light/10 hover:text-sky-light transition-colors duration-150">
                        <i class="bx bxs-user-circle mr-2"></i> Profil
                    </a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-dark hover:bg-sky-light/10 hover:text-sky-light transition-colors duration-150">
                        <i class="bx bxs-cog mr-2"></i> Pengaturan
                    </a>
                    <div class="border-t border-gray-200"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block px-4 py-2 text-sm text-gray-dark hover:bg-sky-light/10 hover:text-sky-light transition-colors duration-150">
                            <i class="bx bxs-log-out mr-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm z-10 border-b border-gray-200">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <button @click="mobileSidebarOpen = !mobileSidebarOpen"
                        class="text-gray-medium hover:text-sky-light focus:outline-none lg:hidden transition-colors duration-200">
                        <i class="bx bx-menu text-2xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-dark">@yield('title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Notification Button -->
                    <button
                        class="text-gray-medium hover:text-sky-light focus:outline-none relative transition-colors duration-200"
                        x-data="{ showTooltip: false }" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                        <i class="bx bxs-bell text-2xl"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-danger rounded-full animate-pulse"></span>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-danger rounded-full"></span>

                        <!-- Notification Tooltip -->
                        <div x-show="showTooltip" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            class="absolute right-0 mt-2 w-72 bg-white rounded-md shadow-lg z-20 border border-gray-200">
                            <div class="p-3 border-b border-gray-200">
                                <h3 class="font-medium text-gray-dark">Notifikasi (3)</h3>
                            </div>
                            <div class="divide-y divide-gray-200 max-h-60 overflow-y-auto">
                                <a href="#"
                                    class="flex items-center px-4 py-3 hover:bg-sky-light/10 transition-colors duration-150">
                                    <div class="flex-shrink-0 bg-green-100 text-success rounded-full p-2">
                                        <i class="bx bxs-check-circle text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-dark">Pembayaran baru</p>
                                        <p class="text-xs text-gray-medium">5 menit yang lalu</p>
                                    </div>
                                </a>
                                <a href="#"
                                    class="flex items-center px-4 py-3 hover:bg-sky-light/10 transition-colors duration-150">
                                    <div class="flex-shrink-0 bg-green-100 text-success rounded-full p-2">
                                        <i class="bx bxs-check-circle text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-dark">Pembayaran dikonfirmasi</p>
                                        <p class="text-xs text-gray-medium">1 jam yang lalu</p>
                                    </div>
                                </a>
                                <a href="#"
                                    class="flex items-center px-4 py-3 hover:bg-sky-light/10 transition-colors duration-150">
                                    <div class="flex-shrink-0 bg-yellow-100 text-yellow-500 rounded-full p-2">
                                        <i class="bx bxs-error-circle text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-dark">Pembayaran tertunda</p>
                                        <p class="text-xs text-gray-medium">Kemarin</p>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-t border-gray-200 text-center">
                                <a href="#"
                                    class="text-xs font-medium text-sky-light hover:text-sky-dark transition-colors duration-150">Lihat
                                    semua notifikasi</a>
                            </div>
                        </div>
                    </button>

                    <div class="w-px h-6 bg-gray-300"></div>

                    <!-- Profile Dropdown -->
                    <div class="flex items-center space-x-2" x-data="{ profileOpen: false }"
                        @click.away="profileOpen = false">
                        <span class="hidden md:inline text-sm text-gray-dark">Hi, Admin</span>
                        <button @click="profileOpen = !profileOpen"
                            class="w-8 h-8 rounded-full bg-sky-light flex items-center justify-center text-white hover:bg-sky-dark transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-sky-light/50">
                            <i class="bx bxs-user text-sm"></i>
                        </button>
                        <i class="bx bxs-chevron-down text-xs text-gray-medium hidden md:inline-block transition-transform duration-200"
                            :class="{ 'transform rotate-180': profileOpen }"></i>

                        <!-- Profile Dropdown Menu -->
                        <div x-show="profileOpen" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-6 mt-32 w-48 bg-white rounded-md shadow-lg py-1 z-10 border border-gray-200">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-dark hover:bg-sky-light/10 hover:text-sky-light transition-colors duration-150">
                                <i class="bx bxs-user-circle mr-2"></i> Profil
                            </a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-dark hover:bg-sky-light/10 hover:text-sky-light transition-colors duration-150">
                                <i class="bx bxs-cog mr-2"></i> Pengaturan
                            </a>
                            <div class="border-t border-gray-200"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-dark hover:bg-sky-light/10 hover:text-sky-light transition-colors duration-150">
                                    <i class="bx bxs-log-out mr-2"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="flex-1 overflow-y-auto p-6 bg-ice">
            <!-- Breadcrumb -->
            <div class="flex items-center text-sm text-gray-medium mb-6 animate-fade-in">
                <a href="/dashboard" class="hover:text-sky-light transition-colors duration-150">
                    <i class="bx bxs-home mr-1"></i> Home
                </a>
                <span class="mx-2">/</span>
                <span class="text-sky-light font-medium">
                    <i class="bx bxs-credit-card-alt mr-1"></i> @yield('title', 'Dashboard')
                </span>
            </div>

            <!-- Page Content -->
            <div class="bg-white rounded-xl shadow-sm p-6 card-hover border border-gray-200 animate-slide-up">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Additional JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to elements when they come into view
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.animate-on-scroll');
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;

                    if (elementPosition < windowHeight - 100) {
                        element.classList.add('animate__animated', 'animate__fadeInUp');
                    }
                });
            };

            // Run once on load and then on scroll
            animateOnScroll();
            window.addEventListener('scroll', animateOnScroll);

            // Keep dropdown open when clicking inside
            document.querySelectorAll('[x-data]').forEach(dropdown => {
                dropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });

            // Highlight active menu item
            const currentPath = window.location.pathname;
            document.querySelectorAll('nav a').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active-menu-item');
                    link.querySelector('i').classList.add('text-sky-light');
                    link.querySelector('span').classList.add('text-gray-dark');

                    // Open parent dropdown if exists
                    const parentDropdown = link.closest('[x-data]');
                    if (parentDropdown) {
                        parentDropdown._x_dataStack[0].open = true;
                    }
                }
            });
        });
    </script>
</body>

</html>
