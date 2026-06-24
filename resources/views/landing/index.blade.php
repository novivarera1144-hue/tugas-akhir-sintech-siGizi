<!DOCTYPE html>
<html lang="id" x-data="{ mobileMenuOpen: false }" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="siGizi membantu menganalisis nutrisi makanan dari foto dengan dukungan AI.">
    <title>siGizi - AI Nutrition Assistant</title>

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
    <div class="min-h-screen overflow-hidden">
        @include('components.navbar')

        <main>
            @include('components.hero')
            @include('components.statistics')
            @include('components.features')
            @include('components.why-choose')
            @include('components.how-it-works')
            @include('components.testimonials')
            @include('components.faq')
            @include('components.cta')
        </main>

        @include('components.footer')
    </div>
</body>
</html>
