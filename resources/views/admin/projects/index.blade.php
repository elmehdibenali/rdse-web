<x-layout title="Projets">
    <x-aside/>


    <main class="admin__main container">
        <x-alert/>

        <div class="dashboard__header">
                <i class="ri-briefcase-fill dashboard__icon"></i> 
                <h1 class="dashboard__title">Nos Projets</h1>
        </div>
        <button id="add-btn" class="btn__dashbord">Ajouter Un Projet</button>
        <div id="table-responsive" class="table-responsive table__responsive">
            <table class="table table-striped table__stripped">
                <thead class="no-border-style ">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Photo</th>
                        <th>Services Associés</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->project_date ? \Carbon\Carbon::parse($project->project_date)->format('d/m/Y') : '' }}</td>
                            <td>
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="Photo projet" style="width: 70px; height: auto; border-radius: 4px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($project->services && $project->services->count())
                                    <ul style="padding-left: 16px; margin: 0;">
                                        @foreach ($project->services as $service)
                                            <li>{{ $service->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    Aucun service associé
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                        <a href="{{route('projects.edit',$project)}}" class="btn btn-primary btn-sm" id="edit-btn">
                                            <i class="ri-pencil-line"></i>
                                        </a>

                                        <form method="post" action="{{route('projects.destroy',$project->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?')" class="btn btn-danger btn-sm">
                                                <i class="ri-delete-bin-6-line"></i>
                                            </button>
                                        </form>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
        <div id="card-add" class="card-add">
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <h3 class="section__title__dashbord">Ajouter Projet</h3>

                <div id="project-form">
                    <div class="form-group">
                        <label for="title">Titre du Projet:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                    </div>

                    <div class="form-group">
                        <label for="project_date">Date du Projet:</label>
                        <input type="date" name="project_date" id="project_date" class="form-control" value="{{ old('project_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image du Projet:</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div>
                        <label class="title_form">Services associés :</label>
                        <div class="checkbox-group">
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input type="checkbox" name="services[]" id="service_{{ $service->id }}" value="{{ $service->id }}" class="form-check-input">
                                    <label for="service_{{ $service->id }}" class="form-check-label">{{ $service->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn__dashbord">Ajouter Projet</button>
            </form>
        </div>

    </main>
    <script>
        document.getElementById('card-add').style.display = 'none';


        document.getElementById('add-btn').addEventListener('click' , function(){
            document.getElementById('card-add').style.display = 'block';
            document.getElementById('table-responsive').style.display = 'none';
            document.getElementById('add-btn').style.display = 'none';
        })

    </script>
</x-layout>
