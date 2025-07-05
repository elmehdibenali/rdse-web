<x-layout title="Modifier Projet">
    <x-aside/>
    <main class="admin__main container">
        <x-alert/>

        <div id="card-edit" class="card-edit">
            <form action="{{ route('projects.update',$project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h3 class="section__title__dashbord">Modifier Projet</h3>

                <div id="project-form">
                    <div class="form-group">
                        <label for="title">Titre du Projet:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$project->title}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{$project->description}}">
                    </div>

                    <div class="form-group">
                        <label for="project_date">Date du Projet:</label>
                        <input type="date" name="project_date" id="project_date" class="form-control"
                            value="{{ $project->project_date ? \Carbon\Carbon::parse($project->project_date)->format('Y-m-d') : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image du Projet:</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="Photo projet" style="width: 70px; height: auto; border-radius: 4px;">
                    </div>

                    <div>
                        <label class="title_form">Services associés :</label>
                        <div class="checkbox-group">
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input type="checkbox"
                                        name="services[]"
                                        id="service_{{ $service->id }}"
                                        value="{{ $service->id }}"
                                        class="form-check-input"
                                        {{ $project->services->contains($service->id) ? 'checked' : '' }}>
                                    <label for="service_{{ $service->id }}" class="form-check-label">{{ $service->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn__dashbord">Modifier Projet</button>
            </form>
        </div>
    </main>
</x-layout>
