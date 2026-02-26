<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Agunfon - Enterprise LMS' }}</title>
    <meta name="description" content="Empower your teams with an adaptive LMS built for clarity, growth, and measurable impact.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@1,500;1,600&display=swap" rel="stylesheet">

    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        brand: {
                            50: '#F3F7FC',
                            100: '#E8F1FF',
                            200: '#D1E3FF',
                            500: '#4B8BE8',
                            600: '#3B7BD8',
                            700: '#0F3D7A',
                            900: '#0A2E5C',
                            950: '#061833',
                        },
                        base: {
                            900: '#1F2A37',
                            500: '#6B7280',
                        }
                    },
                    boxShadow: {
                        'soft': '0 10px 40px -10px rgba(15, 61, 122, 0.08)',
                        'float': '0 20px 40px -10px rgba(15, 61, 122, 0.15)',
                    }
                }
            }
        }
    </script>

    <style>
        .bg-page-gradient {
            background: linear-gradient(180deg, #FFFFFF 0%, #F3F7FC 10%, #F3F7FC 90%, #FFFFFF 100%);
        }
        .accordion-content {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .accordion-item.active .accordion-content {
            max-height: 200px;
            opacity: 1;
            padding-top: 0.75rem;
        }
        .accordion-item {
            background-color: #F3F7FC;
            color: #0A2E5C;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .accordion-item:hover {
            background-color: #E8F1FF;
        }
        .accordion-item.active {
            background-color: #0A2E5C;
            color: #FFFFFF;
        }
        .accordion-item.active:hover {
            background-color: #0F3D7A;
        }
        .accordion-item .accordion-icon-bg {
            background-color: rgba(209, 227, 255, 0.5);
            transition: background-color 0.3s ease;
        }
        .accordion-item:hover .accordion-icon-bg {
            background-color: rgba(209, 227, 255, 0.8);
        }
        .accordion-item.active .accordion-icon-bg {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .accordion-item.active:hover .accordion-icon-bg {
            background-color: rgba(255, 255, 255, 0.25);
        }
        .accordion-item.active .accordion-icon {
            transform: rotate(180deg);
        }
        .hero-dashboard {
            box-shadow: 0 25px 50px -12px rgba(15, 61, 122, 0.25);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="min-h-screen bg-page-gradient text-base-900 font-sans relative overflow-x-hidden">
        @include('components.header')
        
        <main class="relative z-10 pt-24">
            {{ $slot ?? '' }}
            @yield('content')
        </main>
        
        @include('components.footer')
    </div>

    <!-- Scripts -->
    <script>
        // Accordion Logic
        document.addEventListener('DOMContentLoaded', () => {
            const accordionItems = document.querySelectorAll('.accordion-item');
            accordionItems.forEach(item => {
                item.addEventListener('click', () => {
                    accordionItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                    item.classList.add('active');
                });
            });

            // Mega Menu Dropdown Logic
            const overlay = document.getElementById('dropdown-overlay');
            
            const menuConfig = [
                {
                    id: 'products',
                    trigger: document.getElementById('products-trigger'),
                    dropdown: document.getElementById('products-dropdown'),
                    chevron: document.getElementById('products-chevron')
                },
                {
                    id: 'solutions',
                    trigger: document.getElementById('solutions-trigger'),
                    dropdown: document.getElementById('solutions-dropdown'),
                    chevron: document.getElementById('solutions-chevron')
                },
                {
                    id: 'resources',
                    trigger: document.getElementById('resources-trigger'),
                    dropdown: document.getElementById('resources-dropdown'),
                    chevron: document.getElementById('resources-chevron')
                }
            ];

            let activeMenuId = null;

            function openMenu(menu) {
                if (activeMenuId && activeMenuId !== menu.id) {
                    const prevMenu = menuConfig.find(m => m.id === activeMenuId);
                    closeMenu(prevMenu);
                }

                activeMenuId = menu.id;
                
                // Show Backdrop
                if (overlay) {
                    overlay.classList.remove('invisible', 'opacity-0', 'pointer-events-none');
                    overlay.classList.add('opacity-100', 'pointer-events-auto');
                }
                
                // Show Dropdown
                menu.dropdown.classList.remove('invisible', 'opacity-0', 'pointer-events-none', 'translate-y-2', 'scale-95');
                menu.dropdown.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0', 'scale-100');
                
                // Rotate Chevron
                menu.chevron.classList.add('rotate-180');
                menu.trigger.classList.add('text-brand-700');
            }

            function closeMenu(menu) {
                if (!menu) return;
                
                // Hide Dropdown
                menu.dropdown.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0', 'scale-100');
                menu.dropdown.classList.add('opacity-0', 'pointer-events-none', 'translate-y-2', 'scale-95');

                // Rotate Chevron Back
                menu.chevron.classList.remove('rotate-180');
                
                setTimeout(() => {
                    if (activeMenuId !== menu.id) {
                        menu.dropdown.classList.add('invisible');
                    }
                }, 300);
            }

            function closeAll() {
                if (!activeMenuId) return;
                
                const currentMenu = menuConfig.find(m => m.id === activeMenuId);
                closeMenu(currentMenu);

                // Hide Overlay
                if (overlay) {
                    overlay.classList.remove('opacity-100', 'pointer-events-auto');
                    overlay.classList.add('opacity-0', 'pointer-events-none');
                }
                
                activeMenuId = null;
                
                setTimeout(() => {
                    if (!activeMenuId && overlay) {
                        overlay.classList.add('invisible');
                    }
                }, 300);
            }

            menuConfig.forEach(menu => {
                if (!menu.trigger) return;
                menu.trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (activeMenuId === menu.id) {
                        closeAll();
                    } else {
                        openMenu(menu);
                    }
                });

                // Prevent menu closure when clicking inside the dropdown
                if (menu.dropdown) {
                    menu.dropdown.addEventListener('click', (e) => {
                        e.stopPropagation();
                    });
                }
            });

            if (overlay) {
                overlay.addEventListener('click', closeAll);
            }

            // Close on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeAll();
            });

            // Close when clicking outside
            document.addEventListener('click', (e) => {
                if (activeMenuId) {
                    const currentMenu = menuConfig.find(m => m.id === activeMenuId);
                    if (currentMenu && !currentMenu.trigger.contains(e.target) && !currentMenu.dropdown.contains(e.target)) {
                        closeAll();
                    }
                }
            });

            // ============================================
            // MOBILE MENU LOGIC
            // ============================================
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenuPanel = document.getElementById('mobile-menu-panel');
            const mobileMenuIcon = document.getElementById('mobile-menu-icon');
            let mobileMenuOpen = false;

            if (mobileMenuBtn && mobileMenuPanel) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenuOpen = !mobileMenuOpen;
                    if (mobileMenuOpen) {
                        mobileMenuPanel.classList.remove('translate-x-full');
                        mobileMenuPanel.classList.add('translate-x-0');
                        if (mobileMenuIcon) mobileMenuIcon.setAttribute('icon', 'lucide:x');
                    } else {
                        mobileMenuPanel.classList.remove('translate-x-0');
                        mobileMenuPanel.classList.add('translate-x-full');
                        if (mobileMenuIcon) mobileMenuIcon.setAttribute('icon', 'lucide:menu');
                    }
                });
            }

            // Mobile accordion sub-menus
            document.querySelectorAll('.mobile-accordion-trigger').forEach(trigger => {
                trigger.addEventListener('click', () => {
                    const content = trigger.nextElementSibling;
                    const chevron = trigger.querySelector('iconify-icon');
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        if (chevron) chevron.style.transform = 'rotate(180deg)';
                    } else {
                        content.classList.add('hidden');
                        if (chevron) chevron.style.transform = 'rotate(0deg)';
                    }
                });
            });

            // Tab Switching Logic for Solutions
            const tabBtns = document.querySelectorAll('.sol-tab-btn');
            const gridUsecase = document.getElementById('grid-usecase');
            const gridIndustry = document.getElementById('grid-industry');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const target = btn.getAttribute('data-tab');
                    
                    // Update Tab Styles
                    tabBtns.forEach(b => {
                        b.classList.remove('text-brand-500');
                        b.classList.add('text-gray-400', 'pl-4');
                        const activeBar = b.querySelector('.active-bar');
                        const tabText = b.querySelector('.tab-text');
                        if (activeBar) activeBar.classList.add('hidden');
                        if (tabText) {
                            tabText.classList.remove('border-brand-500');
                            tabText.classList.add('border-transparent');
                        }
                    });
                    
                    btn.classList.add('text-brand-500');
                    btn.classList.remove('text-gray-400', 'pl-4');
                    const activeBar = btn.querySelector('.active-bar');
                    const tabText = btn.querySelector('.tab-text');
                    if (activeBar) activeBar.classList.remove('hidden');
                    if (tabText) {
                        tabText.classList.remove('border-transparent');
                        tabText.classList.add('border-brand-500');
                    }

                    // Toggle Content
                    if (target === 'usecase') {
                        if (gridUsecase) {
                            gridUsecase.classList.remove('hidden');
                        }
                        if (gridIndustry) {
                            gridIndustry.classList.add('hidden');
                        }
                    } else {
                        if (gridIndustry) {
                            gridIndustry.classList.remove('hidden');
                        }
                        if (gridUsecase) {
                            gridUsecase.classList.add('hidden');
                        }
                    }
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
