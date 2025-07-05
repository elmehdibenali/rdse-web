<x-layout title="Consultations">
    <x-aside/>

    <main class="admin__main container">
        <x-alert/>

            <div class="dashboard__header">
                <i class="ri-psychotherapy-line dashboard__icon"></i>
                <h1 class="dashboard__title">Consultations Des Clients</h1>
            </div>

            <form method="GET" action="{{ route('consultation.index') }}" class="filter-form">
                <div class="filter-group">
                    <label for="filter_select" class="filter-label">Filtrer par statut :</label>
                     <select name="status" id="filter_select" class="filter-select"  onchange="this.form.submit()">
                        <option value="">Tous</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmé</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>En cours</option>
                        <option value="finished" {{ request('status') == 'finished' ? 'selected' : '' }}>Terminé</option>
                        <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Annulé</option>
                    </select>
                </div>
            </form>

            <div id="table-responsive" class="table-responsive table__responsive">
                <table class="table table-striped table__stripped">
                    <thead class="no-border-style ">
                        <tr>
                            <th>Id</th>
                            <th>Nom D'utilisateur</th>
                            <th>Nom de Service</th>
                            <th>Date de Consultaion</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations  as $consultation )
                            <tr>
                                <td>{{$consultation->id}}</td>
                                <td>{{$consultation->user->firstname}} {{$consultation->user->lastname}}</td>
                                <td>{{$consultation->service->name}}</td>
                                <td>
                                    {{ $consultation->proposed_datetime ? \Carbon\Carbon::parse($consultation->proposed_datetime)
                                    ->format('d/m/Y H:i') : 'Date non précisée' }}
                                </td>
                                <td>
                                    @switch($consultation->status)
                                        @case('pending')
                                            <span class="badge bg-warning" ">En attente</span>
                                            @break

                                        @case('confirmed')
                                            <span class="badge bg-success" ">Confirmé</span>
                                            @break

                                        @case('canceled')
                                            <span class="badge bg-danger" ">Annulé</span>
                                            @break
                                        @case('finished')
                                            <span class="badge bg-success" >Terminé</span>
                                            @break
                                        @case('in_progress')
                                            <span class="badge bg-primary" >En cours</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    {{-- @dd($consultation->status) --}}
                                    @if($consultation->status ==='finished')
                                            @if($consultation->offer)
                                                <button class="btn btn-secondary btn-sm" disabled>Offre créée !</button>
                                            @else
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createOfferModal-{{ $consultation->id }}">
                                                    Créer une offre
                                                </button>
                                            @endif

                                    @else
                                        <div class="d-flex align-items-center gap-2">
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $consultation->id }}">
                                                <i class="ri-pencil-line"></i>

                                            </button>

                                            <form method="post" action="{{route('consultation.destroy',$consultation)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette consultation?')" class="btn btn-danger btn-sm">
                                                    <i class="ri-delete-bin-6-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>


                            </tr>

                            <!-- Modal for Editing -->
                            <div class="modal fade" id="editModal-{{ $consultation->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{ route('consultation.update', $consultation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modifier la consultation #{{ $consultation->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="proposed_datetime_{{ $consultation->id }}" class="form-label">Date de consultation</label>
                                                    <input type="datetime-local" name="proposed_datetime" class="form-control" id="proposed_datetime_{{ $consultation->id }}"
                                                     value="{{ $consultation->proposed_datetime }}"
                                                     @if($consultation->proposed_datetime) readonly @endif>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="consultation_link_{{ $consultation->id }}" class="form-label">Lien vers la consultation</label>
                                                    <input type="text" name="consultation_link" class="form-control" id="consultation_link_{{ $consultation->id }}" value="{{ $consultation->consultation_link }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Modal pour ajouter une offre -->
                            <div class="modal fade" id="createOfferModal-{{ $consultation->id }}" tabindex="-1" aria-labelledby="createOfferModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ajouter une offre pour la consultation #{{ $consultation->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="pdf_{{ $consultation->id }}" class="form-label">Fichier PDF de l’offre</label>
                                                    <input type="file" name="pdf" id="pdf_{{ $consultation->id }}" class="form-control" accept=".pdf" required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Créer une offre</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <div id="card-edit" class="card-edit">

                <form action="" method="POST">
                    @csrf
                    @method('POST')

                    <h3 class="">Ajouter Service</h3>
                    <div id="">
                        <div class="form-group">
                            <label for="date">La Date de Consultation:</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{old('date')}}">
                        </div>
                        <div class="form-group">
                            <label for="link">Lien Vers Consultation:</label>
                            <input type="text" name="link" id="link" class="form-control" value="{{old('link')}}">
                        </div>

                    </div>

                    <button  type="submit"  class="btn__dashbord" >Modifier Consultation </button>
                </form>
            </div> --}}

    </main>




</x-layout>
