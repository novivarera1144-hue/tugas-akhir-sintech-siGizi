@props([
    'title' => 'Dashboard',
])

<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false, sidebarCollapsed: false }" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard siGizi untuk pengalaman pengguna.">
    <title>{{ $title }} - siGizi</title>

    <script>
        const storedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
            document.documentElement.classList.add('dark');
        }
    </script>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900 antialiased transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">
    <div class="min-h-screen">
        <x-dashboard.sidebar />

        <div class="min-h-screen transition-all duration-300" :class="{ 'lg:pl-24': sidebarCollapsed, 'lg:pl-72': ! sidebarCollapsed }">
            <x-dashboard.topbar :title="$title" />

            <main class="px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
