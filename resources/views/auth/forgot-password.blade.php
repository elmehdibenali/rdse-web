<x-layout title="Mot de passe oublié">
    <div class="container-login">
        {{-- {{ route('password.email') }} --}}
        <x-alert/>
        <form method="POST" action="{{ route('password.email') }}" class="login-form">
            @csrf

            <img src="{{ asset('img/rdseLogo.png') }}" alt="logo" class="logo__img">

            <h3 class="login__title">Mot de passe oublié</h3>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <button type="submit" class="button__sec">Envoyer un nouveau mot de passe</button>

            <p class="login__footer-text">
                <a href="{{ route('login') }}">Retour à la connexion</a>
            </p>
        </form>
    </div>
</x-layout>
