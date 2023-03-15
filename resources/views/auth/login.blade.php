<x-guest-layout>
    <x-jet-authentication-card>

        <x-slot name="title">
            {{ __('Se connecter') }}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-valid">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="relative">
                <x-jet-label class="absolute label_form" for="email" value="{{ __('Adresse mail*') }}" />
                <x-jet-input aria-labelledby="Email" id="email" class="block w-full" type="email" name="email" placeholder="Adresse mail*" :value="old('email')" required autofocus autocomplete="email" />
            </div>

            <div class="mt-4 relative">
                <x-jet-label class="absolute label_form" for="password" value="{{ __('Mot de passe*') }}" />
                <x-jet-input aria-labelledby="Mot de passe" id="password" class="block w-full" type="password" name="password" placeholder="Mot de passe*" required autocomplete="current-password" />
            </div>

            <div class="block mt-2 md:mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox class="rounded-md" id="remember_me" name="remember" aria-labelledby="Se souvenir de moi" />
                    <span class="ml-2 text-sm text-secondary-light">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <div class="flex flex-col items-center mt-4 gap-2 md:gap-4">
                <x-jet-button aria-labelledby="Se connecter" class="text-base md:text-xl w-full flex justify-center font-medium bg-primary hover:bg-primary-dark normal-case">
                    {{ __('Se connecter') }}
                </x-jet-button>
                <div class="flex flex-col gap-2 items-center md:flex-row md:gap-0 md:justify-between w-full">
                    <p class="text-sm font-semibold text-primary">*Champs obligatoires.</p>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-secondary-light hover:text-primary font-semibold" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif
                </div>

            </div>
        </form>
        <div class="mt-4 text-sm">
            <a href="./register">
                <p class="underline text-sm text-center text-gray-600 hover:text-gray-900">Pas de compte ? Inscrivez-vous ici !</p>
            </a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
