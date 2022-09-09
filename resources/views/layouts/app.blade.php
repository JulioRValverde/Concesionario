

<x-layouts.base>
    @auth
        {{-- Nav --}}
        @include('layouts.nav')
        {{-- SideNav --}}
        @include('layouts.sidenav')
        <main class="content">
            {{-- TopBar --}}
            @include('layouts.topbar')
            {{ $slot }}
            {{-- Footer --}}
            @include('layouts.footer')
        </main>
    @endauth

    @guest
        {{ $slot }}
        @include('layouts.footer2')
    @endguest
</x-layouts.base>
