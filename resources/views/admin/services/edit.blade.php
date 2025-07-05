<x-layout title="Modifier Service">
    <x-aside/>

    <main class="admin__main container">
        <x-alert/>

        <div id="card-edit" class="card-edit">

                <form action="{{route('service.update',$service)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <h3 class="section__title__dashbord">Modifier Service</h3>
                    <div id="service-form">
                        <div class="form-group">
                            <label for="icon">Icon:</label>
                            <input type="text" name="icon" id="icon" class="form-control" value="{{$service->icon}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Nom de Service:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $service->name}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description de Service:</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{$service->description}}">
                        </div>

                    </div>

                    <button  type="submit"  class="btn__dashbord" >Modifier Service </button>
                </form>
        </div>
    </main>
</x-layout>
