<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta
        name="description"
        content="Portfolio Adi Prasetyo — Web Developer, Designer & Editor"
    >

    <title>@yield('title', 'Adi Prasetyo — Portfolio')</title>

    {{-- Global CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    {{-- Frontend CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}">

    {{-- Main JavaScript --}}
    <script defer src="{{ asset('assets/js/app.js') }}"></script>

    @stack('styles')
</head>

<body class="site-body">

    {{-- =========================================================
         HEADER / NAVBAR
    ========================================================== --}}
    <header class="site-header">
        <div class="container nav-wrap">

            {{-- Logo "Adi." DIHAPUS dari navbar --}}

            <nav
                class="nav-links"
                id="navLinks"
                aria-label="Navigasi utama"
            >
                <a
                    href="{{ route('home') }}"
                    data-nav="home"
                >
                    Home
                </a>

                <a
                    href="{{ route('about') }}"
                    data-nav="about"
                >
                    About
                </a>

                <a
                    href="{{ route('education') }}"
                    data-nav="education"
                >
                    Education
                </a>

                <a
                    href="{{ route('experience') }}"
                    data-nav="experience"
                >
                    Experience
                </a>

                <a
                    href="{{ route('organization') }}"
                    data-nav="organization"
                >
                    Organization
                </a>

                <a
                    href="{{ route('skills') }}"
                    data-nav="skills"
                >
                    Skills
                </a>

                <a
                    href="{{ route('certificates') }}"
                    data-nav="certificates"
                >
                    Certificates
                </a>

                <a
                    href="{{ route('projects.index') }}"
                    data-nav="projects"
                >
                    Projects
                </a>

                <a
                    href="{{ route('contact') }}"
                    data-nav="contact"
                >
                    Contact
                </a>
            </nav>


            {{-- Tombol Let's Talk --}}
            <a
                class="nav-cta"
                href="{{ route('contact') }}"
            >
                Let's Talk <span>↗</span>
            </a>


            {{-- Mobile Menu --}}
            <button
                class="nav-toggle"
                type="button"
                aria-label="Buka menu"
                aria-controls="navLinks"
                aria-expanded="false"
            >
                ☰
            </button>

        </div>
    </header>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}
    <main>

        {{-- Success Message --}}
        @if(session('success'))
            <div
                class="container"
                style="padding-top:18px;"
            >
                <div class="alert success">
                    {{ session('success') }}
                </div>
            </div>
        @endif


        {{-- Error Message --}}
        @if(session('error'))
            <div
                class="container"
                style="padding-top:18px;"
            >
                <div class="alert error">
                    {{ session('error') }}
                </div>
            </div>
        @endif


        {{-- Validation Errors --}}
        @if($errors->any())
            <div
                class="container"
                style="padding-top:18px;"
            >
                <div class="alert error">

                    <strong>
                        Terjadi kesalahan:
                    </strong>

                    <ul style="margin:8px 0 0 18px;">
                        @foreach($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        @endif


        {{-- Page Content --}}
        @yield('content')

    </main>


    {{-- =========================================================
         FOOTER
    ========================================================== --}}
    <footer class="site-footer">

        <div class="container footer-grid">

            {{-- Footer Brand --}}
            <div>

                {{-- Logo "Adi." TETAP ADA di footer --}}
                <a
                    class="brand"
                    href="{{ route('home') }}"
                >
                    Dipra<span>.</span>
                </a>

                <p>
                    Web development, design, editing, and digital projects.
                </p>

            </div>


            {{-- Footer Navigation --}}
            <div class="footer-links">

                <a href="{{ route('about') }}">
                    About
                </a>

                <a href="{{ route('experience') }}">
                    Experience
                </a>

                <a href="{{ route('skills') }}">
                    Skills
                </a>

                <a href="{{ route('projects.index') }}">
                    Projects
                </a>

                <a href="{{ route('contact') }}">
                    Contact
                </a>

            </div>

        </div>


        {{-- Footer Bottom --}}
        <div class="container footer-bottom">

            <span>
                © {{ date('Y') }} Adi Prasetyo
            </span>

            <span>
                Built with Laravel
            </span>

        </div>

    </footer>


    {{-- Additional Scripts --}}
    @stack('scripts')

</body>
</html>