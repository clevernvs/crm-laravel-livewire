<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen font-sans antialiased">
        <x-main full-width>
            <x-slot:sidebar drawer="main-drawer" collapsible class="pt-3 bg-sky-800 text-white">

                {{-- Hidden when collapsed --}}
                <div class="hidden-when-collapsed ml-5 font-black text-4xl text-yellow-500">mary</div>

                {{-- Display when collapsed --}}
                <div class="display-when-collapsed ml-5 font-black text-4xl text-orange-500">m</div>

                {{-- Custom `active menu item background color` --}}
                <x-menu activate-by-route active-bg-color="bg-base-300/10">

                    {{-- User --}}
                    @if($user = auth()->user())
                        <x-list-item :item="$user" sub-value="username" no-separator no-hover class="!-mx-2 mt-2 mb-5 border-y border-y-sky-900">
                            <x-slot:actions>
                                <div class="tooltip tooltip-left" data-tip="logoff">
                                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" />
                                </div>
                            </x-slot:actions>
                        </x-list-item>
                    @endif

                    <x-menu-item title="Home" icon="o-home" link="/" />
                    <x-menu-item title="Yeah" icon="o-sparkles" link="####" />

                    <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                        <x-menu-item title="Wifi" icon="o-wifi" />
                        <x-menu-item title="Archives" icon="o-archive-box" />
                    </x-menu-sub>
                </x-menu>
            </x-slot:sidebar>

            {{-- The `$slot` goes here --}}
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>
        </x-main>
        </body>

        {{-- The navbar with `sticky` and `full-width` --}}
        <x-nav sticky full-width>

            <x-slot:brand>
                {{-- Drawer toggle for "main-drawer" --}}
                <label for="main-drawer" class="lg:hidden mr-3">
                    <x-icon name="o-bars-3" class="cursor-pointer" />
                </label>

                {{-- Your logo --}}
                My App
            </x-slot:brand>

            {{-- Right side actions --}}
            <x-slot:actions>
                <a href="###">
                    <x-icon name="o-envelope" />
                    Messages</a>
                <a href="###">
                    <x-icon name="o-bell" />
                    Notifications</a>
            </x-slot:actions>
        </x-nav>

        {{-- The main content with `full-width` --}}
        <x-main full-width>

            {{-- This is a sidebar that works also as a drawer on small screens --}}
            {{-- Notice the `main-drawer` reference here --}}
            <x-slot:sidebar drawer="main-drawer" class="bg-slate-200">

                {{-- Activates the menu item when a route matches the `link` property --}}
                <x-menu activate-by-route>
                    <x-menu-item title="Home" icon="o-home" link="###" />
                    <x-menu-item title="Messages" icon="o-envelope" link="###" />
                </x-menu>
            </x-slot:sidebar>

            {{-- The `$slot` goes here --}}
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>

            {{-- Footer area --}}
            <x-slot:footer>
                <hr />
                <div class="p-6">
                    Footer
                </div>
            </x-slot:footer>
        </x-main>
        </body>
</html>
