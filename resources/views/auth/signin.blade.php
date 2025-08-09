@extends('layouts.auth')

@section('ldbread')

@endsection

@section('content')
<div>
    <a href="{{ route('web::index') }}"><img class="h-10 w-auto" src="/assets/images/logo.png" alt="{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'SFC.CY')) }}" /></a>
    <h2 class="mt-8 text-2xl/9 font-bold tracking-tight text-white">{{ __('Welcome Back') }}</h2>
    <p class="mt-2 text-sm/6 text-white">{{ __("Don't have an account yet?") }} <a href="{{ route('signup') }}" class="font-semibold text-orange-600 hover:text-orange-500">{{ __('Sign Up') }}</a></p>
</div>
<div class="mt-10">
    <div>
        @if (session('error'))
            <div class="px-4 py-2 bg-red-500/20 mb-4 border border-red-500/10 rounded-md" role="alert">{{ __('Invalid credentials') }}</div>
        @endif
        <form action="{{ route('auth::login') }}" class="space-y-6" method="POST">
            @csrf
            <div>
                <label for="signIn_email" class="block text-sm/6 font-medium text-white">{{ __('Email Address') }}</label>
                <div class="mt-2">
                    <input name="email" required type="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" id="signIn_email" placeholder="{{ __('Email Address') }}" value="{{ (!empty(old('email')) ? old('email') : '') }}">
                </div>
            </div>
            <div>
                <label for="signIn_password" class="block text-sm/6 font-medium text-white">{{ __('Password') }}</label>
                <div class="mt-2">
                    <input name="password" required type="password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" id="signIn_password" placeholder="{{ __('Password') }}" minlength="6">
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex gap-3">
                    <div class="flex h-6 shrink-0 items-center">
                        <div class="group grid size-4 grid-cols-1">
                            <input class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" type="checkbox" name="remember" id="rememberMe" value="1">
                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none"><path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </div>
                    </div>
                    <label class="input-check-label ml-2 text-white" for="rememberMe">{{ __('Remember Me') }}</label>
                </div>
                <div class="text-sm/6">
                    <a href="{{ route('forgot') }}" class="font-semibold text-orange-600 hover:text-orange-500">{{ __('Forgot Password?') }}</a>
                </div>
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-orange-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">{{ __('Sign In') }}</button>
            </div>
        </form>
    </div>
    <div class="mt-10">
        <div class="relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-white"></div>
            </div>
            <div class="relative flex justify-center text-sm/6 font-medium">
                <span class="bg-gray-900 px-6 text-white">{{ __('or') }}</span>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('auth::google') }}" class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus-visible:ring-transparent">
                <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z" fill="#EA4335" /><path d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z" fill="#4285F4" /><path d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z" fill="#FBBC05" /><path d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.2654 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z" fill="#34A853" /></svg>
                <span class="text-sm/6 font-semibold">Google</span>
            </a>
        </div>
    </div>
</div>
@endsection
