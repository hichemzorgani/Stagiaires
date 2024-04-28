<x-masterAdmin  title="Création">
        <form  id="stage_form" method="POST" action="{{ route('stages.store')}}"> 
            @csrf 
        <p class="h4">Ajouter un stage</p>

        <div class="row">
            <div class="col-6">
                <p class="h6">Type de stage</p>
                <select id="stage_type" name="stage_type" class="form-select form-select-sm" aria-label=".form-select-sm example" required onchange="quotaVerification()">
                    <option value="pfe" {{ old('stage_type') == 'pfe' ? 'selected' : '' }}>Projet fin d'étude</option>
                    <option value="immersion" {{ old('stage_type') == 'immersion' ? 'selected' : '' }}>Stage immersion</option>
                </select>                
            </div>
            <div class="col-6">
                <p class="h6">Structures D'Affectation</p>
                <select name="structuresAffectation_id" id="structuresAffectation" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="" selected disabled>Sélectionnez une structure d'affectation</option>
                    @foreach ($structuresAffectations as $structuresAffectation)
                        <option value="{{ $structuresAffectation->id }}" {{ old('structuresAffectation_id') == $structuresAffectation->id ? 'selected' : '' }}>
                            {{ $structuresAffectation->name }}
                        </option>
                    @endforeach
                </select>               
            </div>
        </div>

        <div class="row" style="margin-top: 5px">
            <div class="col-2">
                <p class="h6">Date début</p>
                <input id="start_date" disabled name="start_date" value="{{old('start_date')}}" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" required>
            </div>
            <div class="col-2">
                <p class="h6">Date fin</p>
                <input id="end_date" disabled name="end_date" value="{{old('end_date')}}" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" required>
            </div>
            <div class="col-4">
                <p class="h6">Jour de réception</p>
                <select id="reception_day" disabled name="reception_day" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="Dimanche" {{ old('reception_day') == 'Dimanche' ? 'selected' : '' }}>Dimanche</option>
                    <option value="Lundi" {{ old('reception_day') == 'Lundi' ? 'selected' : '' }}>Lundi</option>
                    <option value="Mardi" {{ old('reception_day') == 'Mardi' ? 'selected' : '' }}>Mardi</option>
                    <option value="Mercredi" {{ old('reception_day') == 'Mercredi' ? 'selected' : '' }}>Mercredi</option>
                    <option value="Jeudi" {{ old('reception_day') == 'Jeudi' ? 'selected' : '' }}>Jeudi</option>
                    <option value="Vendredi" {{ old('reception_day') == 'Vendredi' ? 'selected' : '' }}>Vendredi</option>
                    <option value="Samedi" {{ old('reception_day') == 'Samedi' ? 'selected' : '' }}>Samedi</option>
                </select>                
            </div>
            <div class="col-4">
                <p class="h6">Nombre de stagiaires</p>
                <select id="stagiare_count" disabled name="stagiare_count" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="toggleStagiaires(this)" required>
                    <option value="" selected disabled>Sélectionnez le nombre de stagiaires</option>
                    <option value="Monome" {{ old('stagiare_count') == 'Monome' ? 'selected' : '' }}>Monome</option>
                    <option value="Binome" {{ old('stagiare_count') == 'Binome' ? 'selected' : '' }}>Binome</option>
                    <option value="Trinome" {{ old('stagiare_count') == 'Trinome' ? 'selected' : '' }}>Trinome</option>
                </select>                
            </div>
        </div>

        <div class="row" style="margin-top: 5px">
            <div class="col-4">
                <p class="h6">Encadrant</p>
                <select id="encadrant_id" disabled name="encadrant_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <!-- Options will be dynamically populated based on selected structuresAffectation -->
                    @foreach ($encadrants as $encadrant)
                        <option value="{{ $encadrant->id }}" 
                            {{ old('encadrant_id') == $encadrant->id ? 'selected' : '' }}
                            data-structure-id="{{ $encadrant->structuresAffectation_id }}">
                            {{ $encadrant->last_name }} {{ $encadrant->first_name }} 
                        </option>
                    @endforeach
                </select>               
            </div>
            <div class="col-4">
                <p class="h6">Établissement</p>
                <select id="etablissement_id" disabled name="etablissement_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    @foreach ($etablissements as $etablissement)
                        <option value="{{$etablissement->id}}" {{ old('etablissement_id') == $etablissement->id ? 'selected' : '' }}>
                            {{$etablissement->name}} ({{$etablissement->wilaya}})
                        </option>
                    @endforeach
                </select>                
            </div>
            <div class="col-4">
                <p class="h6">Niveau</p>
                <select id="level" disabled name="level" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="Licence" {{ old('level') == 'Licence' ? 'selected' : '' }}>Licence</option>
                    <option value="Master" {{ old('level') == 'Master' ? 'selected' : '' }}>Master</option>
                    <option value="Doctorat" {{ old('level') == 'Doctorat' ? 'selected' : '' }}>Doctorat</option>
                    <option value="Ingenieur" {{ old('level') == 'Ingenieur' ? 'selected' : '' }}>Ingénieur</option>
                </select>                          
            </div>
        </div>

        <div class="row" style="margin-top: 5px">
            <div class="col-4">
                <p class="h6">Domaine</p>
                <input id="domain" disabled name="domain" value="{{old('domain')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
            </div>
            <div class="col-4">
                <p class="h6">Specialité</p>
                <input id="speciality" disabled name="speciality" value="{{old('speciality')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
            </div>
            <div class="col-4">
                <p class="h6">Thème</p>
                <input id="theme" disabled name="theme" value="{{old('theme')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
            </div>
        </div>

        <hr style="border-top: 2px solid black;">

        <div class="row" style="margin-top: 5px">
            <p class="h4">Stagiaires</p>

            <div id="stagiaire1" class="col-4">
                <p class="h5">Stagiaire 1</p>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Nom</p>
                        <input id="last_name1" disabled name="last_name1" value="{{old('last_name1')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Prénom</p>
                        <input id="first_name1" disabled name="first_name1" value="{{old('first_name1')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Date de naissance</p>
                        <input id="date_of_birth1" disabled name="date_of_birth1" value="{{old('date_of_birth1')}}" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Lieu de naissance</p>
                <input id="place_of_birth1" disabled name="place_of_birth1" value="{{old('place_of_birth1')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>              
                <p class="h6">Adresse</p>
                <input id="adress1" disabled name="adress1" value="{{old('adress1')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Email</p>
                <input id="email1" disabled name="email1" value="{{old('email1')}}" class="form-control form-control-sm" type="email"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Groupe sanguin</p>
                <select id="blood_group1" disabled name="blood_group1" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="A+" {{ old('blood_group1') == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ old('blood_group1') == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ old('blood_group1') == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ old('blood_group1') == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ old('blood_group1') == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ old('blood_group1') == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{ old('blood_group1') == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ old('blood_group1') == 'O-' ? 'selected' : '' }}>O-</option>
                </select>                
            </div>
         
            <div id="stagiaire2" class="col-4">
                <p class="h5">Stagiaire 2</p>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Nom</p>
                        <input id="last_name2" disabled name="last_name2" value="{{old('last_name2')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Prénom</p>
                        <input id="first_name2" disabled name="first_name2" value="{{old('first_name2')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Date de naissance</p>
                        <input id="date_of_birth2" disabled name="date_of_birth2" value="{{old('date_of_birth2')}}" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Lieu de naissance</p>
                <input id="place_of_birth2" disabled name="place_of_birth2" value="{{old('place_of_birth2')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>              
                <p class="h6">Adresse</p>
                <input id="adress2" disabled name="adress2" value="{{old('adress2')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Email</p>
                <input id="email2" disabled name="email2" value="{{old('email2')}}" class="form-control form-control-sm" type="email"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Groupe sanguin</p>
                <select id="blood_group2" disabled name="blood_group2" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="A+" {{ old('blood_group2') == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ old('blood_group2') == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ old('blood_group2') == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ old('blood_group2') == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ old('blood_group2') == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ old('blood_group2') == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{ old('blood_group2') == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ old('blood_group2') == 'O-' ? 'selected' : '' }}>O-</option>
                </select>         
            </div>
            
            <div id="stagiaire3" class="col-4">
                <p class="h5">Stagiaire 3</p>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Nom</p>
                        <input id="last_name3" disabled name="last_name3" value="{{old('last_name3')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Prénom</p>
                        <input id="first_name3" disabled name="first_name3" value="{{old('first_name3')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Date de naissance</p>
                        <input id="date_of_birth3" disabled name="date_of_birth3" value="{{old('date_of_birth3')}}" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Lieu de naissance</p>
                <input id="place_of_birth3" disabled name="place_of_birth3" value="{{old('place_of_birth3')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>              
                <p class="h6">Adresse</p>
                <input id="adress3" disabled name="adress3" value="{{old('adress3')}}" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Email</p>
                <input id="email3" disabled name="email3" value="{{old('email3')}}" class="form-control form-control-sm" type="email"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Groupe sanguin</p>
                <select id="blood_group3" disabled name="blood_group3" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="A+" {{ old('blood_group3') == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ old('blood_group3') == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ old('blood_group3') == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ old('blood_group3') == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ old('blood_group3') == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ old('blood_group3') == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{ old('blood_group3') == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ old('blood_group3') == 'O-' ? 'selected' : '' }}>O-</option>
                </select>              
            </div>

        </div>

        <input type="submit" class=" float-end btn btn-success my-4" style="width: 200px" value="Ajouter"> 
        <button type="button" onclick="resetForm()" class=" float-end btn btn-secondary mx-4 my-4" style="width: 200px">
            Reset 
        </button>                
        </form>         
    </x-masterAdmin> 
    <script> 
    
    function quotaVerification() {
    var stageTypeSelect = document.getElementById("stage_type");
    var selectedStageType = stageTypeSelect.value;

    var structuresAffectationSelect = document.getElementById("structuresAffectation");
    var selectedStructuresAffectation = structuresAffectationSelect.value;

    if (!selectedStructuresAffectation) {
        console.log('No structures affectation selected');    
        return;
    }

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    var data = {
        stage_type: selectedStageType,
        structuresAffectation_id: selectedStructuresAffectation
    };

    fetch('{{ route('quotaVerification') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Response from server:', data);

        var count = data.count;
        var quota = data.quota;

        if (count >= quota) {
            disableFields();
        } else {
            enableFields();
        }
    })
    .catch(error => {
        console.error('There was a problem with your fetch operation:', error);
    });
}
</script>
    