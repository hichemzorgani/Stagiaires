<x-master title="Encadrants">{{-- nom last name | prenom first_name --}}
    
        @if(request()->has('modifier'))
        <div id="add_edit_div">
        <div class="row">
            <div class="col-md-6">
                <p class="h4">Modifier un Encadrant</p>
                <form action="{{ route('encadrants.update',$encadrant->id) }}" method="POST">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <p class="h6">Structures D'Affectation</p>
                        <select name="structuresAffectation_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            @foreach ($structuresAffectations as $structuresAffectation)
                            <option value="{{$structuresAffectation->id}}" {{ old('structuresAffectation_id', $encadrant->structuresAffectation_id) == $structuresAffectation->id ? 'selected' : '' }}>
                                {{$structuresAffectation->name}} ({{$structuresAffectation->structuresIAP->name}})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-top: 4px" class="row">
                        <div class="col-6">
                    <div style="margin-top: 10px" class="form-group">
                        <p class="h6">Nom</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="last_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{ old('last_name', $encadrant->last_name) }}">
                            @error('last_name')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                    </div>
                </div>
                    <div class="col-6">
                    <div class="form-group" style="margin-top: 10px">
                        <p class="h6">Prénom</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="first_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{ old('first_name', $encadrant->first_name) }}">
                            @error('first_name')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                    </div>
                </div></div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Enregistrer" name="modifier">
                    <button type="button" class="btn btn-danger" onclick="goBack()">Annuler</button>
                </div>
                </div>
                <div class="col-md-6" style="margin-top: 35px">
                    <div  class="form-group row">
                        <div class="col-6">
                            <p class="h6">Matricule</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="registration_id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('registration_id',$encadrant->registration_id)}}">
                            @error('registration_id')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                        </div>
                        <div class="col-6">
                            <p class="h6">Fonction</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="function" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('function',$encadrant->function)}}">
                            @error('function')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                        </div>                      
                    </div>
                    <div class="form-group">
                        <p class="h6">Email</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{ old('email', $encadrant->email) }}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                    </div> 
                </form>        
            </div>
        </div>
    </div>
        @else
        <div id="add_edit_div">
        <div class="row">
            <div class="col-md-6">
                <p class="h4">Ajouter un Encadrant</p>
                <form action="{{ route('encadrants.store') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <p class="h6">Structures D'Affectation</p>
                        <select name="structuresAffectation_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            @foreach ($structuresAffectations as $structuresAffectation)
                            <option value="{{$structuresAffectation->id}}">
                                {{$structuresAffectation->name}} ({{$structuresAffectation->structuresIAP->name}})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-top: 4px" class="row">
                        <div class="col-6">
                    <div style="margin-top: 10px" class="form-group">
                        <p class="h6">Nom</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="last_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('last_name')}}">
                            @error('last_name')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                    </div>
                </div>
                    <div class="col-6">
                    <div class="form-group" style="margin-top: 10px">
                        <p class="h6">Prénom</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="first_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('first_name')}}">
                            @error('first_name')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                    </div>
                </div></div>
                <div class="form-group">
                    <input  type="submit" class="btn btn-success" value="Ajouter" name="ajouter">
                </div>
                </div>
                <div class="col-md-6" style="margin-top: 35px">
                    <div  class="form-group row">
                        <div class="col-6">
                            <p class="h6">Matricule</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="registration_id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('registration_id')}}">
                            @error('registration_id')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                        </div>
                        <div class="col-6">
                            <p class="h6">Fonction</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="function" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('function')}}">
                            @error('function')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                        </div>                      
                    </div>
                    <div class="form-group">
                        <p class="h6">Email</p>
                        <div class="input-group input-group-sm mb-3">
                            <input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('email')}}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>               
                            @enderror
                        </div>
                    </div> 
                </form>        
            </div>
        </div>
    </div>
        @endif
    <p class="h4">Liste des Encadrants</p>
        <table class="table table-dark table-striped table-hover">
            <tr>
                <th>Nom</th>
                <th>Fonction</th>
                <th>Matricule</th>
                <th>Email</th>
                <th>Struct. D'Affectation</th>
                <th>Parent</th>
                <th>Struct. IAP</th>
                <th>Modification</th>
                <th>Désactivation</th>
            </tr>   
            @foreach ($encadrants as $encadrant)
            <tr>
                <td>{{$encadrant->last_name}} {{$encadrant->first_name}}</td>
                <td>{{$encadrant->function}}</td>
                <td>{{$encadrant->registration_id}}</td>
                <td>{{$encadrant->email}}</td>
                <td>{{$encadrant->structureAffectation->name}}</td>  
                <td>{{$encadrant->structureAffectation->parent->name ?? ''}}</td>        
                <td>{{$encadrant->structureAffectation->structuresIAP->name}}</td>
                <td>
                    <form action ="{{route('encadrants.edit', $encadrant->id)}}" method="GET">
                        @csrf
                       <button class="btn btn-primary" name="modifier" >Modifier</button>
                        </form> 
                </td>
                <td>
                <form action ="{{route('encadrants.destroy', $encadrant->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$encadrant->id}}">
                        Désactiver
                      </button>
                    </form> 
                </td> 
            </tr> 
            <div class="modal fade" id="exampleModal{{$encadrant->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Désactivation</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Voulez-vous vraiment désactiver {{$encadrant->last_name}} {{$encadrant->first_name}} ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                      <form action ="{{route('encadrants.destroy', $encadrant->id)}}" method="POST">
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
        <div class="my-1" > {{$encadrants->links()}} </div>
</x-master>
