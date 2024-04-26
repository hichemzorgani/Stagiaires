<x-masterAdmin  title="Création">
        <form  id="stage_form" method="POST" action="{{ route('stages.store')}}"> 
            @csrf 
        <p class="h4">Ajouter un stage</p>

        <div class="row">
            <div class="col-6">
                <p class="h6">Type de stage</p>
                <select name="stage_type" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="immersion">Stage immersion</option>
                    <option value="pfe">Projet fin d'etude</option>
                  </select>
            </div>
            <div class="col-6">
                <p class="h6">Structures D'Affectation</p>
                <select name="structuresAffectation_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach ($structuresAffectations as $structuresAffectation)
                    <option value="{{$structuresAffectation->id}}">{{$structuresAffectation->name}}</option>
                    @endforeach          
                  </select>
            </div>
        </div>

        <div class="row" style="margin-top: 5px">
            <div class="col-4">
                <p class="h6">Date début</p>
                <input name="start_date" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" >
            </div>
            <div class="col-4">
                <p class="h6">Date fin</p>
                <input name="end_date" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example">
            </div>
            <div class="col-4">
                <p class="h6">Nombre de stagiaires</p>
                <select name="stagiare_count" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="toggleStagiaires(this)">
                    <option value="Monome" selected>Monome</option>
                    <option value="Binome">Binome</option>
                    <option value="Trinome">Trinome</option>
                  </select>
            </div>
        </div>

        <div class="row" style="margin-top: 5px">
            <div class="col-4">
                <p class="h6">Encadrant</p>
                <select name="encadrant_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach ($encadrants as $encadrant)
                    <option value="{{$encadrant->id}}">{{$encadrant->last_name}} {{$encadrant->first_name}} ({{$encadrant->structureAffectation->name}})</option>
                    @endforeach
                  </select>
            </div>
            <div class="col-4">
                <p class="h6">Établissement</p>
                <select name="etablissement_id" class="form-select form-select-sm" aria-label=".form-select-sm example">                
                    @foreach ($etablissements as $etablissement)
                    <option value="{{$etablissement->id}}">{{$etablissement->name}} ({{$etablissement->wilaya}})</option>
                    @endforeach
                  </select>
            </div>
            <div class="col-4">
                <p class="h6">Niveau</p>
                <select name="level" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="Licence">Licence</option>
                    <option value="Master">Master</option>
                    <option value="Doctorat">Doctorat</option>
                  </select>          
            </div>
        </div>

        <div class="row" style="margin-top: 5px">
            <div class="col-4">
                <p class="h6">Domaine</p>
                <input name="domain" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
            </div>
            <div class="col-4">
                <p class="h6">Specialité</p>
                <input name="speciality" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
            </div>
            <div class="col-4">
                <p class="h6">Thème</p>
                <input name="theme" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
            </div>
        </div>

        <hr>

        <div class="row" style="margin-top: 5px">
            <p class="h4">Stagiaires</p>

            <div id="stagiaire1" class="col-4">
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Nom</p>
                        <input name="last_name1" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Prénom</p>
                        <input name="first_name1" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Date de naissance</p>
                        <input name="date_of_birth1" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" >
                    </div>
                    <div class="col-6">
                        <p class="h6">Lieu de naissance</p>
                <input name="place_of_birth1" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>              
                <p class="h6">Adresse</p>
                <input name="adress1" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Email</p>
                <input name="email1" class="form-control form-control-sm" type="email"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Groupe sanguin</p>
                <select name="blood_group1" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>                   
                  </select>
            </div>

            <div id="stagiaire2" class="col-4">
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Nom</p>
                        <input disabled name="last_name2" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Prénom</p>
                        <input disabled name="first_name2" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Date de naissance</p>
                        <input disabled name="date_of_birth2" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" >
                    </div>
                    <div class="col-6">
                        <p class="h6">Lieu de naissance</p>
                <input disabled name="place_of_birth2" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>              
                <p class="h6">Adresse</p>
                <input disabled name="adress2" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Email</p>
                <input disabled name="email2" class="form-control form-control-sm" type="email"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Groupe sanguin</p>
                <select disabled name="blood_group2" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>                   
                  </select>
            </div>

            <div id="stagiaire3" class="col-4">
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Nom</p>
                        <input disabled name="last_name3" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <p class="h6">Prénom</p>
                        <input disabled name="first_name3" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="h6">Date de naissance</p>
                        <input disabled name="date_of_birth3" class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" >
                    </div>
                    <div class="col-6">
                        <p class="h6">Lieu de naissance</p>
                <input disabled name="place_of_birth3" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                    </div>
                </div>              
                <p class="h6">Adresse</p>
                <input disabled name="adress3" class="form-control form-control-sm" type="text"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Email</p>
                <input disabled name="email3" class="form-control form-control-sm" type="email"  aria-label=".form-control-sm example" autocomplete="off" required>
                <p class="h6">Groupe sanguin</p>
                <select disabled name="blood_group3" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>                   
                  </select>
            </div>

        </div>

        <input type="submit" class=" float-end btn btn-success my-4" style="width: 200px" value="Ajouter"> 
        <button type="button" onclick="resetForm()" class=" float-end btn btn-secondary mx-4 my-4" style="width: 200px">
            Reset 
        </button>                
        </form>       
    <script>

        function toggleStagiaires(selectElement) {
            var stagiaire1 = document.getElementById("stagiaire1");
            var stagiaire2 = document.getElementById("stagiaire2");
            var stagiaire3 = document.getElementById("stagiaire3");

            if (selectElement.value === "Monome") {
                toggleInputs(stagiaire1, false);
                toggleInputs(stagiaire2, true); 
                toggleInputs(stagiaire3, true);
            } else if (selectElement.value === "Binome") {
                toggleInputs(stagiaire1, false);
                toggleInputs(stagiaire2, false);
                toggleInputs(stagiaire3, true);
            } else if (selectElement.value === "Trinome") {
                toggleInputs(stagiaire1, false);
                toggleInputs(stagiaire2, false);
                toggleInputs(stagiaire3, false);
            }
        }

        function toggleInputs(container, enable) {
            var inputs = container.querySelectorAll("input");
            var selects = container.querySelectorAll("select");

            inputs.forEach(function (input) {
                input.disabled = enable;
            });

            selects.forEach(function (select) {
                select.disabled = enable;
            });
        }

        function resetForm() {
            document.getElementById("stage_form").reset();
        }
    </script>
</x-masterAdmin>

