@extends('layouts.auth')

@section('ldbread')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Service",
    "name": "{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'SFC.CY')) }}",
    "url": "{{ url()->current() }}",
    "description": "{{ (!empty($meta->metas[$meta->locale]->description) ? $meta->metas[$meta->locale]->description : (!empty($meta->metas['en']->description) ? $meta->metas['en']->description : '')) }}",
    "areaServed": "Global",
    "provider": {
        "@@type": "Brand",
        "name": "{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'SFC.CY')) }}"
    }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [{
        "@@type": "ListItem",
        "position": 1,
        "name": "{{ __('Home') }}",
        "item": "{{ str_replace('http://', 'https://', route('web::index')) }}"
    }]
},
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [{
        "@@type": "ListItem",
        "position": 2,
        "name": "{{ __('Sign In') }}",
        "item": "{{ str_replace('http://', 'https://', route('forgot')) }}"
    }]
}
</script>
@endsection

@section('content')
<div>
    <a href="{{ route('web::index') }}"><img class="h-10 w-auto" src="/assets/images/logo.png" alt="{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'SFC.CY')) }}" /></a>
    <h2 class="mt-8 text-2xl/9 font-bold tracking-tight text-white">{{ __('Forgot Password?') }}</h2>
    <p class="mt-2 text-sm/6 text-white">{{ __('Please fill in your Email...') }}</p>
    <p class="mt-2 text-sm/6 text-white">{{ __("Don't have an account yet?") }} <a href="{{ route('signup') }}" class="font-semibold text-orange-600 hover:text-orange-500">{{ __('Sign Up') }}</a></p>
</div>
<div class="mt-10">
    <div>
        @if (session('error'))
            <div class="px-4 py-2 bg-red-500/20 mb-4 border border-red-500/10 rounded-md" role="alert">{{ __('Invalid Email') }}</div>
        @endif
        @if (session('success'))
            <div class="px-4 py-3 rounded-md bg-success-500/20 border border-success-500/25 text-success-900 dark:text-success-300">{{ __('auth.forgot_text_success') }}</div>
        @else
            <form action="{{ route('auth::forgot') }}" class="space-y-6" method="POST">
                @csrf
                <div>
                    <label for="signIn_email" class="block text-sm/6 font-medium text-white">{{ __('Email Address') }}</label>
                    <div class="mt-2">
                        <input name="email" required type="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" id="signIn_email" placeholder="{{ __('Email Address') }}" value="{{ (!empty(old('email')) ? old('email') : '') }}">
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-orange-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 cursor-pointer">{{ __('Restore Password') }}</button>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection
