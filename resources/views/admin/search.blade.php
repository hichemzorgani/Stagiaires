<x-masterAdmin title="Recherche">
    <form id="search_form" action="{{ route('search.search') }}" method="POST">
        @csrf 
<p class="h4">Rechercher un stage</p>
<div id="add_edit_div">
    <div class="row">
        <div class="col-3">
            <p class="h6">Thème</p>
            <input name="theme" class="form-control form-control-sm" type="text" placeholder="Entrez un thème" aria-label=".form-control-sm example" autocomplete="off">
        </div>
        <div class="col-3">
            <p class="h6">Type de stage</p>
            <select name="stage_type" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="" selected>Sélectionnez le type de stage</option>
                <option value="pfe">Projet fin d'étude</option>
                <option value="immersion">Stage immersion</option>
            </select>  
        </div>
        <div class="col-3">
            <p class="h6">Niveau</p>
            <select name="level" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="" selected>Sélectionnez le niveau</option>
                <option value="Licence">Licence</option>
                <option value="Master">Master</option>
                <option value="Doctorat">Doctorat</option>
            </select>
        </div>
        <div class="col-3">
            <p class="h6">Structure D'Affectation</p>
                <select name="structuresAffectation_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="" selected>Sélectionnez une structure d'affectation</option>
                    @foreach ($structuresAffectations as $structuresAffectation)
                        <option value="{{ $structuresAffectation->id }}">
                            {{ $structuresAffectation->name }}
                        </option>
                    @endforeach
                </select>     
        </div>
    </div>
    <div class="row" style="margin-top: 5px;">
        <div class="col-3">
            <p class="h6">Encadrant</p>
                <select name="encadrant_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="" selected>Sélectionnez un encadrant</option>
                    @foreach ($encadrants as $encadrant)
                        <option value="{{ $encadrant->id }}">
                            {{ $encadrant->last_name }} {{ $encadrant->first_name }} 
                        </option>
                    @endforeach
                </select>
        </div>
        <div class="col-3">
            <p class="h6">Établissement</p>
                <select name="etablissement_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="" selected>Sélectionnez un établissement</option>
                    @foreach ($etablissements as $etablissement)
                        <option value="{{$etablissement->id}}">
                            {{$etablissement->name}} ({{$etablissement->wilaya}})
                        </option>
                    @endforeach
                </select>    
        </div>
        <div class="col-3">
            <p class="h6">Spécialité</p>
            <select name="speciality" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="" selected>Sélectionnez une spécialité</option>
                    @foreach ($specialities as $speciality)
                        <option value="{{$speciality}}">
                            {{$speciality}}
                        </option>
                    @endforeach
            </select>  
        </div>
        <div class="col-3">
            <p class="h6">Année</p>
            <input name="year" min="1900" max="2099" class="form-control form-control-sm" type="number" placeholder="YYYY" aria-label=".form-control-sm example" autocomplete="off">
        </div>
    </div>

    <div class="row" style="margin-top: 5px;">
        <div class="col-3">
             
            <button type="button" onclick="resetForm2()" style="width: 100px" class=" float-end btn btn-secondary my-2 mx-3">Reset</button>
            <input type="submit" class=" float-end btn btn-success my-2 mx-2" style="width: 100px" value="Rechercher">
            
        </div>
        <div class="col-3">
            <p class="h6">En cours ?</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="en_cours" id="inlineRadio1" value="Oui">
                <label class="form-check-label" for="inlineRadio1">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="en_cours" id="inlineRadio2" value="Non">
                <label class="form-check-label" for="inlineRadio2">Non</label>
            </div>
        </div>
        
    </div>

</div>
    </form>

    <hr style="border-top: 2px solid black;">

    @if (!isset($result))
    <p class="h5">Lancer votre recherche . . .</p>
    @elseif (empty($result))
    <p class="h5 text-danger">Pas de stage trouvé.</p>
    @else
    <p class="h5">Liste de stages</p>
    <p class="h6">Nombre de stages : {{ count($result) }}</p>
    <table class="table table-bordered table-striped">
        
        <tr>           
            <th>Thème</th>
            <th>Type de stage</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Niveau</th>
            <th>Structure D'Affectation</th>
            <th>Encadrant</th>
            <th>Établissement</th>
        </tr>  
   
        @foreach ($result as $stage)
        <tr> 
        <td>{{$stage->theme}}</td>
        <td>{{$stage->stage_type}}</td>
        <td>{{$stage->start_date}}</td>
        <td>{{$stage->end_date}}</td>
        <td>{{$stage->level}}</td>
        <td>{{$stage->structureAffectation->name}}</td>
        <td>{{$stage->encadrant->last_name}} {{$stage->encadrant->first_name}}</td>
        <td>{{$stage->etablissement->name}}</td>        
        </tr> 
        @endforeach  
    </table>
    @endif

</x-masterAdmin>
