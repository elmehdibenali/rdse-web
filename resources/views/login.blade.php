<x-layout title="Se Connecter">

    <div class="container-login">
        <x-alert />
        <form method="POST" action="{{route('login.login')}}" class="login-form">
            @csrf

            <img src="{{ asset('img/rdseLogo.png') }}" alt="logo" class="logo__img">

            <h3 class="login__title">Se Connecter</h3>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="form-group password-wrapper">
                <label for="password" class="form-label">Mot de Passe:</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="current-password">

                 <i class="ri-eye-line toggle-password" id="togglePassword" onclick="toggleVisibility('password', 'togglePassword')"></i>
            </div>
            <div class="text-right mt-1">
                <a href="{{ route('password.request') }}" class="forgot-password-link">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="button__sec">Se Connecter</button>

            <p class="login__footer-text">
                Vous n'avez pas de compte ? <a href="{{route('user.create')}}">Créer Compte</a>
            </p>
        </form>
    </div>
</x-layout>
