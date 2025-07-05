<x-layout title="Profile">
    <x-header/>

      <main class="main consultation__page">

        <section class="section" id="home">
            <div class="consultation__page__title">
                <div class="container ">
                    <h3 class="consultation__title">Mon Profile</h3>
                </div>
            </div>

            <div class="row">
                <x-alert />
                <div class="col-sm-4">
                <div id="card-profile" class="card">
                    <div class="card-profile">
                        {{-- <img  src="{{asset('img/profileimage.jpg')}}" alt=""> --}}
                        <img
                            src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('img/profileimage.jpg') }}"
                            alt="Photo de profil">

                        <h5 class="card-title">{{$user->firstname}} {{$user->lastname}}</h5>
                        <p class="card-text">{{$user->email}}</p>
                        <button   class="profile-btn" id="edit-profile-btn">Modifier Profile</button>
                        <button  class="profile-btn" id="edit-password-btn">Modifier Password</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-edit-profile">
                        {{-- {{ route('user.update', $user) }} --}}
                        <form action="{{route('user.update', $user)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div id="profile-form">
                                <div class="form-group">
                                    <label for="firstname">Prenom:</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname', $user->firstname)}}">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Nom:</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname', $user->lastname)}}">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone:</label>
                                    <input type="tel" name="telephone" id="telephone" class="form-control" value="{{old('telephone', $user->telephone)}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{old('email', $user->email)}}">
                                </div>
                                <div class="form-group">
                                    <label for="company">Entreprise:</label>
                                    <input type="text" name="company" id="company" class="form-control" value="{{old('company', $user->company)}}">
                                </div>
                                <div class="form-group">
                                    <label>Photo:</label>
                                    <input type="file" name="photo" class="form-control" id="customFile" value="">
                                </div>
                            </div>


                            <div id="password-form" style="display: none;">
                                <div class="form-group">
                                    <label for="password">Nouveau Mot de Passe:</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmer Mot de Passe:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                </div>
                            </div>

                            <button class="button__sec"  type="submit"  class="">Modifier Profile </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>

        </section>
      </main>

<script>

    document.getElementById('edit-profile-btn').addEventListener('click', function() {
        document.getElementById('profile-form').style.display = 'block';
        document.getElementById('password-form').style.display = 'none';
    });

    document.getElementById('edit-password-btn').addEventListener('click', function() {
        document.getElementById('profile-form').style.display = 'none';
        document.getElementById('password-form').style.display = 'block';
    });
</script>

</x-layout>
