<x-layout title="Admin">

    <x-aside/>

    <main class="admin__main container">
        <!-- Dashboard Title -->
        <div class="dashboard__header">
            <i class="ri-dashboard-line dashboard__icon"></i>
            <h1 class="dashboard__title">Tableau de bord</h1>
        </div>

        <!-- Info Cards -->
        <div class="dashboard__cards grid">
            <div class="dashboard__card">
                <div class="card__header">
                    <i class="ri-user-line card__icon"></i>
                    <h3>Utilisateurs</h3>
                </div>
                <p>{{$totalUsers}}</p>
            </div>
            <div class="dashboard__card">
                <div class="card__header">
                   <i class="ri-psychotherapy-line card__icon"></i>
                    <h3>Consultations</h3>
                </div>
                <p>{{$totalConsultation}}</p>
            </div>
            <div class="dashboard__card">
                <div class="card__header">
                    <i class="ri-folder-line card__icon"></i>
                    <h3>Offres</h3>
                </div>
                <p>{{$totalOffers}}</p>
            </div>


        </div>

        <!-- Recent Activities -->
        {{-- <section class="dashboard__activities section"> --}}
            {{-- <h2 class="section__title">Activités récentes</h2> --}}
            {{-- <h2 class="section__title__dashbord">
                <i  class="ri-time-line section__icon activite__icon"></i> Activités récentes
            </h2> --}}



            {{-- <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Exemple</td>
                            <td>Exemple</td>
                            <td>Exemple</td>
                            <td>Exemple</td>
                            <td>Exemple</td>
                            <td>
                                <button class="btn btn-sm btn-primary">Voir</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div> --}}

        {{-- </section> --}}
    </main>


</x-layout>
