<x-layout title="Mes Consultations">
    <x-header/>
    <x-alert/>
    <main class="main consultation__page">
        <section class="section" id="home">
            <div class="consultation__page__title">
                <div class="container ">
                    <h3 class="consultation__title">Mes Offres</h3>
                </div>
            </div>
            <div class="consultation__page__table">
                <div class="container consultation__page__container">
                    <div class="consultation__table">
                        <div id="table-responsive " class="table-responsive table__responsive ">
                            <table class="table table-striped  table__stripped">
                                <thead class="no-border-style ">
                                    <th>Id</th>
                                    <th>Nom De Service</th>
                                    <th>Date de l'offre</th>
                                    <th>Voir L'offre</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($offers  as $offer )
                                    <tr>
                                        <td>{{$offer->id}}</td>
                                        <td>{{$offer->consultation->service->name}}</td>
                                        <td>{{ $offer->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if($offer->pdf_path)
                                            <a href="{{ route('offers.download', $offer->id) }}" class="btn btn-outline-primary btn-sm" >
                                                Télécharger l’offre PDF
                                            </a>

                                            @endif
                                        </td>
                                        <td>
                                            @if($offer->status === 'acceptée')
                                                <button class="btn btn-success btn-sm" disabled>
                                                    Offre acceptée
                                                </button>
                                            @elseif($offer->status === 'refusée')
                                                <button class="btn btn-danger btn-sm" disabled>
                                                    Offre refusée
                                                </button>
                                            @else
                                                <form method="POST" action="{{ route('offers.accept', $offer) }}" style="display:inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        Accepter
                                                    </button>
                                                </form>

                                                <form method="POST" action="{{ route('offers.refuse', $offer) }}" style="display:inline-block; margin-left: 5px;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Refuser
                                                    </button>
                                                </form>
                                            @endif
                                        </td>

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
</x-layout>
