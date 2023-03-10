<x-guest-layout>
    <x-jet-authentication-card>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-valid">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                {{-- <x-jet-label for="email" value="{{ __('Adresse mail') }}" /> --}}
                <x-jet-input aria-labelledby="Email" id="email" class="block w-full" type="email" name="email" placeholder="Adresse mail" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                {{-- <x-jet-label for="password" value="{{ __('Mot de passe') }}" /> --}}
                <x-jet-input aria-labelledby="Mot de passe" id="password" class="block w-full" type="password" name="password" placeholder="Mot de passe" required autocomplete="current-password" />
            </div>

            <div class="block mt-2 md:mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" aria-labelledby="Se souvenir de moi" />
                    <span class="ml-2 text-sm text-secondary-light">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col items-center mt-4 gap-2 md:gap-4">
                <x-jet-button aria-labelledby="Se connecter" class="text-base md:text-xl w-full flex justify-center bg-primary hover:bg-primary-dark normal-case tracking-wide">
                    {{ __('Se connecter') }}
                </x-jet-button>

                <p class="text-sm font-semibold">*Champs obligatoires.</p>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-secondary-light hover:text-primary font-semibold" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
