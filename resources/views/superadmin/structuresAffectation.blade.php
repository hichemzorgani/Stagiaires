<x-master title="Structures D'Affectation">
    <div id="add_edit_div" class="row">
        @if(request()->has('modifier'))
        <form action="{{ route('structuresAffectation.update', $structuresAffectation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <p class="h5 row">Modifier la Structure D'Affectation</p>
            <div class="row">
                <div class="col-6">
                    <p class="h6">Structure IAP</p>
                    <select name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        @foreach ($structuresIAPs as $structuresIAP)
                            <option value="{{ $structuresIAP->id }}" {{ $structuresAffectation->structuresIAP_id == $structuresIAP->id ? 'selected' : '' }}>{{ $structuresIAP->name }}</option>
                        @endforeach
                    </select>
                    <div class="row" style="margin-top: 16px">
                        <div class="col-6">
                            <p class="h6">Type</p>
                            <select name="type" id="type" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option value="Direction" {{ $structuresAffectation->type == 'Direction' ? 'selected' : '' }}>Direction</option>
                                <option value="Sous-direction" {{ $structuresAffectation->type == 'Sous-direction' ? 'selected' : '' }}>Sous-direction</option>
                                <option value="Departement" {{ $structuresAffectation->type == 'Departement' ? 'selected' : '' }}>Département</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <p class="h6">Parent</p>
                            <select name="parent_id" id="parent_id" class="form-select form-select-sm" aria-label=".form-select-sm example" {{ $structuresAffectation->type != 'Departement' ? 'disabled' : '' }}>
                                @foreach ($directions as $direction)
                                    <option value="{{$direction->id}}" {{ $structuresAffectation->parent_id == $direction->id ? 'selected' : '' }}>
                                        {{$direction->name}} ({{$direction->structuresIAP->name}})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <p class="h6">Nom</p>
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" value="{{ old('name',$structuresAffectation->name) }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>               
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="h6">Quota Project Fin D'Étude</p>
                            <div class="input-group input-group-sm mb-3">
                                <input type="number" name="quota_pfe" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" min="0" max="100" value="{{ old('quota_pfe',$structuresAffectation->quota_pfe )}}" required>
                                @error('quota_pfe')
                                    <small class="text-danger">{{ $message }}</small>               
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <p class="h6">Quota Stage Immersion</p>
                            <div class="input-group input-group-sm mb-3">
                                <input type="number" name="quota_im" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" min="0" max="100" value="{{ old('quota_im',$structuresAffectation->quota_im) }}" required>
                                @error('quota_im')
                                    <small class="text-danger">{{ $message }}</small>               
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="modifier">Enregistrer</button>
            <button type="button" class="btn btn-danger" onclick="goBack()">Annuler</button>
        </form>        
        @else
        <form action="{{ route('structuresAffectation.store') }}" method="POST">
            @csrf
            <p class="h5 row">Ajouter Une Structure D'Affectation</p>
            <div class="row">
                <div class="col-6">
                    <p class="h6">Structure IAP</p>
                    <select name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        @foreach ($structuresIAPs as $structuresIAP)
                        <option value="{{ $structuresIAP->id }}">{{ $structuresIAP->name }}</option>
                        @endforeach
                    </select>
                    <div class="row" style="margin-top: 16px">
                        <div class="col-6">
                            <p class="h6">Type</p>
                            <select name="type" id="type" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option value="Direction">Direction</option>
                                <option value="Sous-direction">Sous-direction</option>
                                <option value="Departement">Département</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <p class="h6">Parent</p>
                            <select name="parent_id" id="parent_id" class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                                @foreach ($directions as $direction)
                                    <option value="{{$direction->id}}">{{$direction->name}} ({{$direction->structuresIAP->name}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="col-6">
                    <p class="h6">Nom</p>
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>               
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="h6">Quota Project Fin D'Étude</p>
                            <div class="input-group input-group-sm mb-3">
                                <input type="number" name="quota_pfe" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" min="0" max="100" required>
                                @error('quota_pfe')
                                    <small class="text-danger">{{$message}}</small>               
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <p class="h6">Quota Stage Immersion</p>
                            <div class="input-group input-group-sm mb-3">
                                <input type="number" name="quota_im" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" min="0" max="100" required>
                                @error('quota_im')
                            <small class="text-danger">{{$message}}</small>               
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="ajouter">Ajouter</button>
        </form>
        @endif
    </div>
    <p class="h4">
        Liste des structures D'Affectation
    </p>
    <table class="table table-dark table-striped table-hover">
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Parent</th>
            <th>Structure IAP</th>         
            <th>Quota Project Fin D'Étude</th>
            <th>Quota Immersion</th>
            <th>Modification</th>
            <th>Désactivation</th>
        </tr>   

        @foreach ($structuresAffectations as $structuresAffectation)
        <tr>
        <td>{{$structuresAffectation->name}}</td>
        <td>{{$structuresAffectation->type}}</td>
        <th>{{$structuresAffectation->parent->name ?? ''}}</th>
        <td>{{ $structuresAffectation->structuresIAP->name }}</td>
        <td>{{$structuresAffectation->quota_pfe}}</td>
        <td>{{$structuresAffectation->quota_im}}</td>
        <td>
            <form action ="{{route('structuresAffectation.edit', $structuresAffectation->id)}}" method="GET">
                @csrf
               <button class="btn btn-primary" name="modifier">Modifier</button>
                </form> 
            </td>
            <td>       
            <form action ="{{route('structuresAffectation.destroy', $structuresAffectation->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$structuresAffectation->id}}">
                    Désactiver
                  </button>
                </form> 
        </td>
        </tr>
        <div class="modal fade" id="exampleModal{{$structuresAffectation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Désactivation</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Voulez-vous vraiment désactiver {{$structuresAffectation->name}} ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                  <form action ="{{route('structuresAffectation.destroy', $structuresAffectation->id)}}" method="POST">
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
    <div class="my-1" > {{$structuresAffectations->links()}} </div>
</x-master>