<x-layout title="Creer Compte">

<div class="container-create">
    <img class="logo__img" src="{{asset('img/rdseLogo.png')}}" alt="image">

     <h3>Créer Votre Compte</h3>
    <x-alert />
    <form action="{{route('user.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="firstname">Prenom:</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname')}}">
        </div>


        <div class="form-group">
            <label for="lastname">Nom:</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname')}}" >
        </div>


        <div class="form-group">
            <label for="company">Nom d'Entreprise:</label>
            <input type="text" name="company" id="company" class="form-control" value="{{old('company')}}" >
        </div>


        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{old('telephone')}}" >
        </div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" >
        </div>


        {{-- <div class="form-group">
            <label for="password">Mot de Passe:</label>
            <input type="password" name="password" id="password" class="form-control" >
        </div>

        <div class="form-group">
            <label for="password">Confirmer Mot de Passe:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
        </div> --}}
        <div class="form-group password-wrapper">
            <label for="password">Mot de Passe:</label>
            <input type="password" name="password" id="password" class="form-control">
            <i class="ri-eye-line toggle-password" id="togglePassword" onclick="toggleVisibility('password', 'togglePassword')"></i>
        </div>

        <div class="form-group password-wrapper">
            <label for="password_confirmation">Confirmer Mot de Passe:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            <i class="ri-eye-line toggle-password" id="toggleConfirm" onclick="toggleVisibility('password_confirmation', 'toggleConfirm')"></i>
        </div>


        <button  type="submit" class="button__sec">Créer Compte</button>
    </form>

</div>

</x-layout>
