<x-layout title="Offres">
    <x-aside/>

    <main class="admin__main container">
        <x-alert/>

        <div class="dashboard__header">
            <i class="ri-folder-line dashboard__icon"></i>
            <h1 class="dashboard__title">Les Offres Des Clients</h1>
        </div>

           <form method="GET" action="{{ route('offers.index') }}" class="filter-form">
                <div class="filter-group">
                    <label for="filter_select" class="filter-label">Filtrer par statut :</label>
                    <select name="status" id="filter_select" class="filter-select" onchange="this.form.submit()">
                        <option value="">Tous</option>
                        <option value="en_attente" {{ request('status') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                        <option value="acceptée" {{ request('status') == 'acceptée' ? 'selected' : '' }}>Confirmé</option>
                        <option value="refusée" {{ request('status') == 'refusée' ? 'selected' : '' }}>Annulé</option>
                    </select>
                </div>
            </form>
        <div id="table-responsive" class="table-responsive table__responsive">
            <table class="table table-striped table__stripped">
                <thead class="no-border-style ">
                        <tr>
                            <th>Id</th>
                            <th>Nom De Client</th>
                            <th>Nom De Service</th>
                            <th>Date de l'offre</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($offers  as $offer )
                        <tr>
                            <td>{{$offer->id}}</td>
                            <td>
                                {{$offer->consultation->user->firstname}}
                                {{$offer->consultation->user->lastname}}
                            </td>
                            <td>
                                {{$offer->consultation->service->name}}
                            </td>
                            <td>{{ $offer->created_at->format('Y-m-d') }}</td>

                            <td>
                                @switch($offer->status)
                                        @case('en_attente')
                                            <span class="badge bg-warning" ">En attente</span>
                                            @break

                                        @case('acceptée')
                                            <span class="badge bg-success" ">Confirmé</span>
                                            @break

                                        @case('refusée')
                                            <span class="badge bg-danger" ">Annulé</span>
                                            @break

                                    @endswitch
                            </td>
                            <td>
                                <form method="post" action="{{route('offers.destroy',$offer)}}">
                                    {{-- {{route('offres.destroy',$offre)}} --}}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cet offre?')" class="btn btn-danger btn-sm">
                                        <i class="ri-delete-bin-6-line"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </main>
</x-layout>
