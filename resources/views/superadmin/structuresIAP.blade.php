<x-master title="Structures IAP">
    <div id="add_edit_div">  
            @if(request()->has('modifier'))
            <p class="h3">Modifier le nom de la structure IAP </p>
                <form action="{{ route('structuresIAP.update',$structuresIAP->id) }}" method="POST">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <p class="h5">Nom</p>
                        <div class="input-group input-group-sm mb-3">
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" value="{{old('name',$structuresIAP->name)}}" required>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>               
                        @enderror    
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Enregistrer" name="modifier">
                        <button type="button" class="btn btn-danger" onclick="goBack()">Annuler</button>
                    </div>    
                </form>
            @else   
            <p class="h3">                    
                Ajouter une structure IAP </p>
                <form action="{{ route('structuresIAP.store') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <p class="h5">Nom</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('name')}}">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>               
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Ajouter" name="ajouter">
                    </div>    
                </form>
            @endif
        
    </div>
    <p class="h4">
        Liste des structures IAP
    </p>
    <table class="table table-dark table-striped table-hover">
        <tr>
            <th>Nom</th>
            <th>Modification</th>
            <th>Désactivation</th>
        </tr>    
    @foreach ($structuresIAPs as $structuresIAP)
        <tr>
            <td>{{$structuresIAP->name}}</td>
            <td>
                <form action ="{{route('structuresIAP.edit', $structuresIAP->id)}}" method="GET">
                    @csrf
                   <button class="btn btn-primary" name="modifier">Modifier</button>
                    </form> 
                </td>
                <td>       
                <form action ="{{route('structuresIAP.destroy', $structuresIAP->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$structuresIAP->id}}">
                        Désactiver
                      </button>
                    </form> 
            </td>
        </tr> 
        <div class="modal fade" id="exampleModal{{$structuresIAP->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Désactivation</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Voulez-vous vraiment désactiver {{$structuresIAP->name}} ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                  <form action ="{{route('structuresIAP.destroy', $structuresIAP->id)}}" method="POST">
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
    <div class="my-1" > {{$structuresIAPs->links()}} </div>
    
    </x-master>
    