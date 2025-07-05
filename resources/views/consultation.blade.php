<x-layout title="Mes Consultations">
    <x-header/>
      <main class="main consultation__page">
        <section class="section" id="home">
            <div class="consultation__page__title">
                <div class="container ">
                    <h3 class="consultation__title">Mes Consultations</h3>
                </div>
            </div>
            <div class="consultation__page__table">
                <div class="container consultation__page__container">
                    <div class="consultation__table">
                        <div id="table-responsive " class="table-responsive table__responsive ">
                            <table class="table table-striped  table__stripped">
                                <thead class="no-border-style ">
                                    <tr>
                                        <th>Id </th>
                                        {{-- <th>Nom D'utilisateur</th> --}}
                                        <th>Nom de Service</th>
                                        <th>Date de Consultaion</th>
                                        <th>Status</th>
                                        {{-- @if($consultation->proposed_datetime !== null) --}}
                                            <th>Action</th>
                                        {{-- @endif --}}

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultations  as $consultation )
                                        <tr>
                                            <td>{{$consultation->id}}</td>
                                            {{-- <td>{{$consultation->user->firstname}} {{$consultation->user->lastname}}</td> --}}
                                            <td>{{$consultation->service->name}}</td>
                                            <td>
                                                {{ $consultation->proposed_datetime ? \Carbon\Carbon::parse($consultation->proposed_datetime)
                                                ->format('d/m/Y H:i') : 'Date non précisée' }}
                                            </td>
                                            <td>
                                                @switch($consultation->status)
                                                    @case('pending')
                                                        <span class="badge bg-warning" >En attente</span>
                                                        @break

                                                    @case('confirmed')
                                                        <span class="badge bg-success" >Confirmé</span>
                                                        @break

                                                    @case('canceled')
                                                        <span class="badge bg-danger" >Annulé</span>
                                                        @break
                                                    @case('finished')
                                                        <span class="badge bg-success" >Terminé</span>
                                                        @break
                                                    @case('in_progress')
                                                        <span class="badge bg-primary" >En cours</span>
                                                        @break

                                                @endswitch
                                            </td>
                                            @if($consultation->proposed_datetime !== null)
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    @switch($consultation->status)
                                                        @case('pending')

                                                            <form method="post" action="{{ route('user.consultation.update', $consultation) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="confirmed">
                                                                <button type="submit" onclick="return confirm('La date de consultation vous convient-elle ?')" class="btn btn-success btn-sm">
                                                                    <i class="ri-check-fill"></i>
                                                                </button>
                                                            </form>

                                                            <form method="post" action="{{ route('user.consultation.update', $consultation) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="canceled">
                                                                <button type="submit" onclick="return confirm('La date de consultation ne vous convient-elle pas ?')" class="btn btn-danger btn-sm">
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                            </form>
                                                            @break

                                                        @case('canceled')
                                                            {{-- @if ($consultation->is_retried == null) --}}
                                                            @if (!$consultation->hasRetried)
                                                                <form method="post" action="{{route('user.consultation.store')}}">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <input type="hidden" name="service_id" value="{{$consultation->service->id}}">
                                                                    <input type="hidden" name="retried_from_id" value="{{ $consultation->id }}">
                                                                    <button type="submit" onclick="return confirm('Souhaitez-vous demander une nouvelle consultation à une date différente ?')" class="btn btn-warning btn-sm">
                                                                        <i class="ri-loop-left-line"></i>
                                                                    </button>
                                                                </form>
                                                                @endif
                                                                @break

                                                        @case('confirmed')

                                                            @if ($consultation->consultation_link)
                                                                <a href="{{$consultation->consultation_link}}" class="btn btn-primary btn-sm">
                                                                    <i class="ri-link-m"></i>
                                                                </a>
                                                            @break
                                                            @else
                                                                <button type="button" class="btn btn-secondary" onclick="alert('Le lien n\'est pas encore publié.')">
                                                                    <i class="ri-link-m"></i>
                                                                </button>
                                                                @break
                                                            @endif


                                                    @endswitch
                                                </div>
                                            </td>
                                            @else
                                                <td>

                                                <button type="button" class="btn btn-secondary"onclick="return false;">Pas d'action</button>
                                                </td>
                                            @endif



                                        </tr>



                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </main>
      {{-- <x-footer/> --}}

</x-layout>

