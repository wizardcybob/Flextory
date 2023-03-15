<x-guest-layout>
    <x-jet-authentication-card>

        <x-slot name="title">
            {{ __('S\'inscrire') }}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-valid">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nom*') }}" />
                <x-jet-input aria-labelledby="Nom" id="name" class="block w-full" type="text" name="name" placeholder="Nom*" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Adresse mail*') }}" />
                <x-jet-input aria-labelledby="Adresse mail" id="email" class="block w-full" type="email" name="email" placeholder="Adresse mail*" :value="old('email')" required auto-complete="email" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe*') }}" />
                <x-jet-input aria-labelledby="Mot de passe" id="password" class="block w-full" type="password" name="password" placeholder="Mot de passe*" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmation du mot de passe*') }}" />
                <x-jet-input aria-labelledby="Confirmation du mot de passe" id="password_confirmation" class="block w-full" type="password" name="password_confirmation" placeholder="Confirmation du mot de passe*" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="mt-8">

                <x-jet-button class="mb-4" aria-labelledby="S'inscrire">
                    {{ __('S\'inscrire') }}
                </x-jet-button>
                <a aria-labelledby="Déjà inscrit ?" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Vous avez déjà un compte ?') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
