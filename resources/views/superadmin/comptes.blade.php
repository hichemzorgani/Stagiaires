<x-master title="Comptes">    
       @if(request()->has('modifier'))
       <div id="add_edit_div">
        <form action="{{ route('comptes.update', $compte->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="row">
                <div class="col-6">
                    <p class="h4">Modifier le Compte</p>
    
                    <div class="mb-3">
                        <label for="structuresIAP_id" class="h6">Structure IAP</label>
                        <select name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            @foreach ($structuresIAPs as $structuresIAP)
                            <option value="{{ $structuresIAP->id }}" {{ $compte->structuresIAP_id == $structuresIAP->id ? 'selected' : '' }}>{{ $structuresIAP->name }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <p class="h6">User Type</p>
                        <select name="usertype" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="Superadmin" {{ $compte->usertype == 'Superadmin' ? 'selected' : '' }}>Superadmin</option>
                            <option value="Subadmin" {{ $compte->usertype == 'Subadmin' ? 'selected' : '' }}>Subadmin</option>
                            <option value="Admin" {{ $compte->usertype == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="User" {{ $compte->usertype == 'User' ? 'selected' : '' }}>User</option>
                            <option value="Security" {{ $compte->usertype == 'Security' ? 'selected' : '' }}>Security</option>
                        </select>
                    </div>
    
                    <p class="h6">Username</p>
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $compte->name) }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <input type="submit" class="btn btn-primary" value="Enregistrer" name="modifier">
                    <button type="button" class="btn btn-danger" onclick="goBack()">Annuler</button>
                </div>
                
                <div class="col-6">
                    <p style="margin-top: 39px;" class="h6">Email</p>
                    <div class="input-group input-group-sm mb-3">
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $compte->email) }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <p class="h6">Nouveau mot de passe</p>
                    <div class="input-group input-group-sm mb-3">
                        <input type="password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required>
                        @error('password')
                        <small class="text-danger">{{$message}}</small>               
                        @enderror
                    </div>
    
                    <p class="h6">Confirmer le nouveau mot de passe</p>
                    <div class="input-group input-group-sm mb-3">
                        <input type="password" name="password_confirmation" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required>
                        @error('password_confirmation')
                        <small class="text-danger">{{$message}}</small>               
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
        
        @else
        <div id="add_edit_div">
    <form action="{{ route('comptes.store') }}" method="POST">
        @csrf
        <p class="h4">Ajouter un Compte</p>

        <div class="row">
            <div class="col-6">
                <p class="h6">Structure IAP</p>
                <select name="structuresIAP_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach ($structuresIAPs as $structuresIAP)
                    <option value="{{ $structuresIAP->id }}">{{ $structuresIAP->name }}</option>
                    @endforeach
                </select>
                
                <p style="margin-top: 16px;" class="h6">User Type</p>
                <select name="usertype" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="Superadmin">Superadmin</option>
                    <option value="Subadmin">Subadmin</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    <option value="Security">Security</option>
                </select>

                <p style="margin-top: 16px;" class="h6">Username</p>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('name')}}">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>               
                    @enderror
                </div>
                <button type="submit" class="btn btn-success" name="ajouter">Ajouter</button>
            </div>
            <div class="col-6">
                <p class="h6">Email</p>
                <div class="input-group input-group-sm mb-3">
                    <input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required value="{{old('email')}}">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>               
                    @enderror
                </div>

                <p class="h6">Mot de passe</p>
                <div class="input-group input-group-sm mb-3">
                    <input type="password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required>
                    @error('password')
                    <small class="text-danger">{{$message}}</small>               
                    @enderror
                </div>

                <p class="h6">Confirmer le nouveau mot de passe</p>
                <div class="input-group input-group-sm mb-3">
                    <input type="password" name="password_confirmation" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off" required>
                    @error('password_confirmation')
                    <small class="text-danger">{{$message}}</small>               
                    @enderror
                </div>
            </div>
        </div>
    </form>
</div>

        @endif
    
    <p class="h4">Liste des Comptes</p>
    <table class="table table-dark table-striped table-hover">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Structure IAP</th>
            <th>Modification</th>
            <th>Désactivation</th>
        </tr>   
        @foreach ($comptes as $compte)
        <tr>
            <td>{{$compte->name}}</td>
            <td>{{$compte->email}}</td>
            <td>{{$compte->usertype}}</td>
            <td>{{$compte->structuresIAP->name}}</td>
            <td>
                <form action ="{{route('comptes.edit',$compte->id)}}" method="GET">
                    @csrf
                   <button class="btn btn-primary" name="modifier">Modifier</button>
                    </form> 
                </td>
                <td>
                    <form action ="{{route('comptes.destroy', $compte->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$compte->id}}">
                            Désactiver
                          </button>
                        </form> 
                    </td> 
        </tr>
        <div class="modal fade" id="exampleModal{{$compte->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Désactivation</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Voulez-vous vraiment désactiver {{$compte->name}} ?
                  <br>
                  Email : {{$compte->email}}
                  <br>
                  User Type : {{$compte->usertype}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                  <form action ="{{route('comptes.destroy', $compte->id)}}" method="POST">
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
    <div class="my-1" > {{$comptes->links()}} </div>
</x-master>