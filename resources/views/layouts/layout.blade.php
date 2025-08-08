<!DOCTYPE html>
<html lang="{{ (!empty($meta->locale) ? $meta->locale : 'en') }}"{!! (in_array($meta->locale, array('ar', 'he', 'fa')) ? ' dir="rtl"' : '') !!}>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <title>{{ (!empty($meta->metas[$meta->locale]->title) ? $meta->metas[$meta->locale]->title : (!empty($meta->metas['en']->title) ? $meta->metas['en']->title : 'Tarot Academy')) }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="{{ (!empty($meta->metas[$meta->locale]->description) ? $meta->metas[$meta->locale]->description : (!empty($meta->metas['en']->description) ? $meta->metas['en']->description : '')) }}">
    <meta name="keywords" content="{{ (!empty($meta->metas[$meta->locale]->keywords) ? $meta->metas[$meta->locale]->keywords : (!empty($meta->metas['en']->keywords) ? $meta->metas['en']->keywords : '')) }}">
    <meta property="og:title" content="{{ (!empty($meta->metas[$meta->locale]->title) ? $meta->metas[$meta->locale]->title : (!empty($meta->metas['en']->title) ? $meta->metas['en']->title : 'Tarot Academy')) }}">
    <meta property="og:description" content="{{ (!empty($meta->metas[$meta->locale]->description) ? $meta->metas[$meta->locale]->description : (!empty($meta->metas['en']->description) ? $meta->metas['en']->description : '')) }}">
    <meta property="og:locale" content="{{ (!empty($meta->locale) ? $meta->locale : 'en') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ (!empty($meta->image) ? $meta->image : 'https://tarot.ac/assets/img/main_banner.png') }}">
    <meta property="og:url" content="{{ str_replace('http://', 'https://', url()->current()) }}">
    <meta property="og:site_name" content="{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'Tarot Academy')) }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ (!empty($meta->metas[$meta->locale]->title) ? $meta->metas[$meta->locale]->title : (!empty($meta->metas['en']->title) ? $meta->metas['en']->title : 'Tarot Academy')) }}">
    <meta property="twitter:description" content="{{ (!empty($meta->metas[$meta->locale]->description) ? $meta->metas[$meta->locale]->description : (!empty($meta->metas['en']->description) ? $meta->metas['en']->description : '')) }}">
    <meta property="twitter:image" content="{{ (!empty($meta->image) ? $meta->image : 'https://tarot.ac/assets/img/main_banner.png') }}">
    {{--<meta name="robots" content="noindex, nofollow">--}}
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ str_replace('http://', 'https://', url()->current()) }}">
    @yield('styles')
    @yield('ldbread')
</head>
<body x-data="{
    languagePopup: false,
    mobileMenu: false
}">
<div class="bg-gray-900">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">SFC.CY</span>
                    <img src="/assets/images/logo.png" alt="SFC.CY" class="h-8 w-auto" />
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                    <span class="sr-only">{{ __('Main menu') }}</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#" class="text-sm/6 font-semibold text-white">Ecosystem</a>
                <a href="#" class="text-sm/6 font-semibold text-white">Events</a>
                <a href="#" class="text-sm/6 font-semibold text-white">Members</a>
                <a href="#" class="text-sm/6 font-semibold text-white">Resources</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#" class="text-sm/6 font-semibold text-white">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <el-dialog>
            <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                <div tabindex="0" class="fixed inset-0 focus:outline-none">
                    <el-dialog-panel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-100/10">
                        <div class="flex items-center justify-between">
                            <a href="#" class="-m-1.5 p-1.5">
                                <span class="sr-only">SFC.CY</span>
                                <img src="/assets/images/logo.png" alt="SFC.CY" class="h-8 w-auto" />
                            </a>
                            <button type="button" command="close" commandfor="mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                                <span class="sr-only">Close menu</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6"><path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-500/25">
                                <div class="space-y-2 py-6">
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Ecosystem</a>
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Events</a>
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Members</a>
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Resources</a>
                                </div>
                                <div class="py-6">
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-white hover:bg-white/5">Log in</a>
                                </div>
                            </div>
                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
    </header>
{{--<div class="bg-white">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ route('web::index') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'Tarot Academy')) }}</span>
                    <img src="/assets/img/tarot_logo_b.png" alt="{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'Tarot Academy')) }}" class="w-[120px]" />
                </a>
            </div>
            <div class="flex lg:hidden">
                @if (Auth::check())
                    <a href="{{ route('app::index') }}" type="button" class="rounded-md bg-orange-500 px-2.5 py-1.5 me-4 font-semibold text-white shadow-xs hover:bg-orange-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500 cursor-pointer">{{ __('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}" type="button" class="rounded-md bg-orange-500 px-2.5 py-1.5 me-4 font-semibold text-white shadow-xs hover:bg-orange-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500 cursor-pointer">{{ __('Sign In') }}</a>
                @endif
                <button @click="mobileMenu = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">{{ __('Main Menu') }}</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#" class="text-sm/6 font-semibold text-gray-900">{{ __('About') }}</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">{{ __('Blog') }}</a>
                <a @click="languagePopup = true" href="javascript:void(0);" class="text-sm/6 font-semibold text-gray-900"><img class="mr-1 rtl:ml-1 rtl:mr-0 inline-block" src="/assets/flags/language/{{ $meta->locale }}.svg" width="24"> {{ strtoupper(!empty($meta->locale) ? $meta->locale : 'en') }} ({{ (!empty($meta->language) ? $meta->language : '') }})</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                @if (Auth::check())
                    <a href="{{ route('app::index') }}" class="text-sm/6 font-semibold text-gray-900">{{ __('Dashboard') }} <span aria-hidden="true">&rarr;</span></a>
                @else
                    <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-gray-900">{{ __('Sign In') }} <span aria-hidden="true">&rarr;</span></a>
                @endif
            </div>
        </nav>
        <div x-show="mobileMenu" class="lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 z-50"></div>
            <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="{{ route('web::index') }}" class="-m-1.5 p-1.5">
                        <span class="sr-only">{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'Tarot Academy')) }}</span>
                        <img src="/assets/img/tarot_logo_b.png" alt="{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'Tarot Academy')) }}" class="w-[120px]">
                    </a>
                    <button @click="mobileMenu = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">{{ __('Close menu') }}</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">{{ __('About') }}</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">{{ __('Blog') }}</a>
                            <a @click="languagePopup = true" href="javascript:void(0);" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50"><img class="mr-1 rtl:ml-1 rtl:mr-0 inline-block" src="/assets/flags/language/{{ $meta->locale }}.svg" width="24"> {{ strtoupper(!empty($meta->locale) ? $meta->locale : 'en') }} ({{ (!empty($meta->language) ? $meta->language : '') }})</a>
                        </div>
                        <div class="py-6">
                            @if (Auth::check())
                                <a href="{{ route('app::index') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">{{ __('Dashboard') }}</a>
                            @else
                                <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">{{ __('Sign In') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>--}}
    <main class="isolate">
        @yield('content')
    </main>
    <footer class="bg-gray-900 mt-16">
        <div class="mx-auto max-w-7xl px-6 pt-16 pb-8 sm:pt-24 lg:px-8 lg:pt-32">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <img class="w-[120px]" src="/assets/images/logo.png" alt="SFC.CY" />
                <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm/6 font-semibold text-white">{{ __('Ecosystem') }}</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Members') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Events') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Shops') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Services') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Courses') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Venues') }}</a></li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm/6 font-semibold text-white">{{ __('Events') }}</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Decks') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Cards') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Guides') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm/6 font-semibold text-white">{{ __('Members') }}</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Daily Tarot Card') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Daily Tarot Reading') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Yes or No Tarot Reading') }}</a></li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm/6 font-semibold text-white">{{ __('Resources') }}</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('About') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Blog') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Affiliate Program') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Partnerships') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Terms of Service') }}</a></li>
                                <li><a href="#" class="text-sm/6 text-gray-400 hover:text-white">{{ __('Privacy Policy') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-16 border-t border-white/10 pt-8 sm:mt-20 lg:mt-24 lg:flex lg:items-center lg:justify-between">
                <div>
                    <h3 class="text-sm/6 font-semibold text-white">{{ __('Stay in the know') }}</h3>
                    <p class="mt-2 text-sm/6 text-gray-400">{{ __('Subscribe to our newsletter and updates direct to your inbox.') }}</p>
                </div>
                <form class="mt-6 sm:flex sm:max-w-md lg:mt-0">
                    <label for="email-address" class="sr-only">{{ __('Email Address') }}</label>
                    <input type="email" name="email-address" id="email-address" autocomplete="email" required class="w-full min-w-0 rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-gray-700 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus-visible:outline-indigo-500 sm:w-56 sm:text-sm/6" placeholder="{{ __('Enter your email') }}" />
                    <div class="mt-4 sm:mt-0 sm:ml-4 sm:shrink-0">
                        <button type="submit" class="flex w-full items-center justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">{{ __('Subscribe') }}</button>
                    </div>
                </form>
            </div>
            <div class="mt-8 border-t border-white/10 pt-8 md:flex md:items-center md:justify-between">
                <div class="flex gap-x-6 md:order-2">
                    <a href="https://www.facebook.com/tarot.ac" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Facebook</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="https://www.instagram.com/tarot.ecosystem" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Instagram</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="https://www.youtube.com/@tarot-ac" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">YouTube</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="https://www.tiktok.com/@tarot.ac" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">TikTok</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" fill-rule="evenodd" d="M16 21.75A5.75 5.75 0 0 0 21.75 16V8A5.75 5.75 0 0 0 16 2.25H8A5.75 5.75 0 0 0 2.25 8v8A5.75 5.75 0 0 0 8 21.75zM13.711 5.763A.75.75 0 0 0 12.25 6v9A2.25 2.25 0 1 1 10 12.75a.75.75 0 0 0 0-1.5A3.75 3.75 0 1 0 13.75 15V8.458c.767.712 1.847 1.292 3.25 1.292a.75.75 0 0 0 0-1.5c-.972 0-1.711-.4-2.259-.919c-.56-.532-.898-1.173-1.03-1.568" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="https://www.threads.com/@tarot.ecosystem" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Threads</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><defs><path id="mageThreadsSquare0" fill="currentColor" d="M14 12.31c-.022.42-.117.833-.28 1.22a1.601 1.601 0 0 1-.63.71c-.186.1-.39.165-.6.19a2.37 2.37 0 0 1-.92 0a1.57 1.57 0 0 1-.55-.27a.999.999 0 0 1-.08-1.42a1.49 1.49 0 0 1 .67-.38c.272-.085.555-.125.84-.12c.26-.015.52-.015.78 0c.242.019.482.052.72.1z"/></defs><use href="#mageThreadsSquare0"/><path fill="currentColor" d="M17 2H7a5 5 0 0 0-5 5v10a5 5 0 0 0 5 5h10a5 5 0 0 0 5-5V7a5 5 0 0 0-5-5M7.52 14.53A5 5 0 0 0 8.24 16a4 4 0 0 0 1.81 1.39c.447.166.915.274 1.39.32c.466.045.934.045 1.4 0a4.56 4.56 0 0 0 1.57-.41a3.58 3.58 0 0 0 1.39-1.2a2.42 2.42 0 0 0 .33-2.1a2 2 0 0 0-.8-1.09l-.2-.14c0 .09 0 .17-.05.25c-.07.45-.22.882-.44 1.28a2.628 2.628 0 0 1-1.92 1.34a3.3 3.3 0 0 1-1.59-.08A2.55 2.55 0 0 1 10 14.9a2.17 2.17 0 0 1-.61-1.29a2.2 2.2 0 0 1 1-2.12a3.289 3.289 0 0 1 1.2-.49c.423-.07.851-.1 1.28-.09a7.92 7.92 0 0 1 1 .09h.06a2.41 2.41 0 0 0-.27-.78a1.382 1.382 0 0 0-.89-.64a2.3 2.3 0 0 0-1.35 0a1.66 1.66 0 0 0-.79.59v.07l-1-.69v-.07a2.84 2.84 0 0 1 1.77-1.17a3.63 3.63 0 0 1 1.85.08a2.55 2.55 0 0 1 1.55 1.33c.176.359.295.744.35 1.14a3.606 3.606 0 0 1 .05.52l.3.14a4 4 0 0 1 1.22 1c.346.427.573.937.66 1.48c.071.328.095.665.07 1a3.75 3.75 0 0 1-.93 2.25a4.93 4.93 0 0 1-2.7 1.63a8.226 8.226 0 0 1-1.41.17a8 8 0 0 1-1.29-.05a6.319 6.319 0 0 1-2-.58a5.2 5.2 0 0 1-2-1.79a6.75 6.75 0 0 1-.83-1.86c-.134-.495-.231-1-.29-1.51V12c0-.42 0-.84.07-1.26a9.49 9.49 0 0 1 .23-1.41A6.31 6.31 0 0 1 7 7.67a5.09 5.09 0 0 1 2.86-2.35A7.43 7.43 0 0 1 11.2 5a7.61 7.61 0 0 1 1.72 0a6.35 6.35 0 0 1 2 .52a5.17 5.17 0 0 1 2.24 1.9A6.64 6.64 0 0 1 18 9.38l-1.18.32v-.08a5.562 5.562 0 0 0-.58-1.35A4.08 4.08 0 0 0 14 6.52a5.6 5.6 0 0 0-1.52-.29a7.33 7.33 0 0 0-1.15 0a5 5 0 0 0-1.7.48A3.93 3.93 0 0 0 8 8.31a5.76 5.76 0 0 0-.57 1.49a7.89 7.89 0 0 0-.21 1.29a10.38 10.38 0 0 0 0 1.25a8.55 8.55 0 0 0 .3 2.19"/><use href="#mageThreadsSquare0"/></svg>
                    </a>
                </div>
                <p class="mt-8 text-sm/6 text-gray-400 md:order-1 md:mt-0">&copy; 2024-<script>document.write(new Date().getFullYear())</script>. {{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'Tarot Academy')) }}. {{ __('All rights reserved.') }}</p>
            </div>
        </div>
    </footer>
    <div x-show="languagePopup" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="relative z-[55]" aria-labelledby="dialog-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true" @click="languagePopup = false"></div>
        <div @click="languagePopup = false" class="fixed inset-0 z-[55] w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                <div x-show="languagePopup" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                    <div>
                        <div class="max-h-60 overflow-y-auto border border-gray-200 rounded-lg">
                            <div class="divide-y divide-gray-100">
                                @php
                                $languages = $meta->languages;
                                ksort($languages);
                                @endphp
                                @foreach ($languages as $key => $item)
                                    <a class="dropdown-item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150" hreflang="{{ $key }}" href="{{ (($key != 'en') ? LaravelLocalization::getLocalizedURL($key) : '/en' . ((LaravelLocalization::getCurrentLocale() != 'en') ? substr($_SERVER['REQUEST_URI'], 3) : $_SERVER['REQUEST_URI'])) }}" rel="alternate"><img class="mr-3 inline-block" src="/assets/flags/language/{{ $key }}.svg" alt="{{ strtoupper($key) }} ({{ $item['name'] }})" width="24"><span class="rtl:mr-2 font-medium">{{ strtoupper($key) }}</span><span class="ml-2 rtl:ml-0 rtl:mr-2 text-gray-500">({{ $item['native'] }})</span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6 space-y-3">
                        <button @click="languagePopup = false" type="button" class="inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 cursor-pointer hover:bg-gray-50">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('js')
</body>
</html>
