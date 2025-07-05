<x-layout title="Services">
    <x-aside/>

    <main class="admin__main container">
        <x-alert/>

            <div class="dashboard__header">
                {{-- <i class="ri-briefcase-fill dashboard__icon"></i> --}}
                <i class="ri-service-line dashboard__icon"></i>
                <h1 class="dashboard__title">Nos Services</h1>
            </div>
            <button id="add-btn" class="btn__dashbord">Ajouter Un Service</button>
            <div id="table-responsive" class="table-responsive table__responsive">
                <table class="table table-striped table__stripped">
                    <thead class="no-border-style ">
                        <tr>
                            <th>Id</th>
                            <th>Nom de Service</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services  as $service )
                            <tr>
                                <td>{{$service->id}}</td>
                                <td>{{$service->name}}</td>
                                <td>{{$service->description}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{route('service.edit',$service)}}" class="btn btn-primary btn-sm" id="edit-btn">
                                            <i class="ri-pencil-line"></i>
                                        </a>

                                        <form method="post" action="{{route('service.destroy',$service->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce service?')" class="btn btn-danger btn-sm">
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

                <form action="{{route('service.store')}}" method="POST">
                    @csrf
                    @method('POST')

                    <h3 class="section__title__dashbord">Ajouter Service</h3>
                    <div id="service-form">
                        <div class="form-group">
                            <label for="icon">Icon:</label>
                            <input type="text" name="icon" id="icon" class="form-control" value="{{old('icon')}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Nom de Service:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description de Service:</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{old('description')}}">
                        </div>

                    </div>

                    <button  type="submit"  class="btn__dashbord" >Ajouter Service </button>
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
