<x-layout title="Edit Utilisateur">
    <x-aside/>

    <main class="admin__main container">
        <x-alert/>

        <div id="card-edit" class="card-edit">

                <form action="{{route('users.update',$user)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <h3 class="section__title__dashbord">Modifier Utilisateur</h3>
                    <div id="service-form">
                         <div class="form-group">
                            <label for="firstname">Prenom:</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $user->firstname}}">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Nom:</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->lastname}}">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telephone:</label>
                            <input type="tel" name="telephone" id="telephone" class="form-control" value="{{ $user->telephone}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="company">Entreprise:</label>
                            <input type="text" name="company" id="company" class="form-control" value="{{ $user->company}}">
                        </div>
                        <div >
                            <label class="d-block">Role:</label>
                            <div class="form-check">
                                <input type="radio" name="role"  class="form-check-input" value="utilisateur" {{  $user->role == "user" ? 'checked' : '' }}>
                                <label for="utilisateur" class="form-check-label">Utilisateur</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="role" class="form-check-input" value="admin" {{  $user->role == "admin" ? 'checked' : '' }}>
                                <label for="admin" class="form-check-label">Admin</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="role" class="form-check-input" value="employe" {{  $user->role == "employe" ? 'checked' : '' }}>
                                <label for="employe" class="form-check-label">Employe</label>
                            </div>
                        </div>

                    </div>

                    <button  type="submit"  class="btn__dashbord" >Modifier Utilisateur </button>
                </form>
            </div>
    </main>
</x-layout>

