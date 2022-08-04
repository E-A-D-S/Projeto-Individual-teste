@extends('template.users')
@section('title', 'Novo Usuário')
@section ('body')
    
        <div class="mb-4 text-sm text-dark-600">
            {{ __('Esta é uma área segura do aplicativo. Confirme sua senha antes de continuar') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirmar') }}
                </x-button>
            </div>
        </form>
@endsection