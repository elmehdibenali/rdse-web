<x-layout title="Utilisateur">
    <x-aside/>

    <main class="admin__main container">
        <x-alert/>

        <div class="dashboard__header">
            <i class="ri-user-line dashboard__icon"></i>
            <h1 class="dashboard__title">Utilisateurs</h1>
        </div>

        <form method="GET" action="{{ route('users.index') }}" class="filter-form">
            <div class="filter-group">
                <label for="filter_select" class="filter-label">Filtrer par rôle:</label>
                <select name="role" id="role_filter" class="filter-select" onchange="this.form.submit()">
                    <option value="">Tous</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                    <option value="client" {{ request('role') == 'client' ? 'selected' : '' }}>Client</option>
                </select>
            </div>
        </form>

        {{-- User Table --}}
        <div id="table-responsive" class="table-responsive table__responsive">
            <table class="table table-striped table__stripped">
                <thead class="no-border-style ">
                    <tr>
                        <th>Id</th>
                        <th>Nom Complet</th>
                        <th>Entreprise</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td>{{ $user->company }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    @if ($user->role === 'admin')
                                        Administrateur
                                    @else
                                        Client
                                    @endif
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm">
                                        <i class="ri-pencil-line"></i>
                                    </a>
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')" class="btn btn-danger btn-sm">
                                            <i class="ri-delete-bin-6-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Aucun utilisateur trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</x-layout>
