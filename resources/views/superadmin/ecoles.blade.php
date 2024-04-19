<x-master title="Écoles">
    <div id="add_edit_div">
        <p class="h3">
            @if(request()->has('modifier'))
                Modifier le nom de l'école
                <form action="{{ route('ecoles.update',$ecole->id) }}" method="POST">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <p class="h5">Nom</p>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{old('name',$ecole->name)}}">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>               
                        @enderror    
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary my-2" value="Enregistrer" name="modifier">
                        <button type="button" class="btn btn-danger" onclick="goBack()">Annuler</button>
                    </div>    
                </form>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
            @else                       
                Ajouter une école 
                <form action="{{ route('ecoles.store') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <p class="h5">Nom</p>
                        <input type="text" class="form-control" name="name" autocomplete="off">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>               
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success my-2" value="Ajouter" name="ajouter">
                    </div>    
                </form>
            @endif
        </p>
    </div>
    <p class="h4">
        Liste des écoles
    </p>
    <table class="table table-dark table-striped table-hover">
        <tr>
            <th>Nom</th>
            <th>Modification</th>
            <th>Supression</th>
        </tr>    
    @foreach ($ecoles as $ecole)
        <tr>
            <td>{{$ecole->name}}</td>
            <td>
                <form action ="{{route('ecoles.edit', $ecole->id)}}" method="GET">
                    @csrf
                   <button class="btn btn-primary" name="modifier">Modifier</button>
                    </form> 
                </td>
                <td>       
                <form action ="{{route('ecoles.destroy', $ecole->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$ecole->id}}">
                        Supprimer
                      </button>
                    </form> 
            </td>
        </tr> 
        <div class="modal fade" id="exampleModal{{$ecole->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Voulez-vous vraiment supprimer {{$ecole->name}} ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                  <form action ="{{route('ecoles.destroy', $ecole->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="btn btn-danger">Oui</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
    @endforeach
    </table>
    <div class="my-1" > {{$ecoles->links()}} </div>
    
    </x-master>
    