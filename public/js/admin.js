
    function resetForm() {
    document.getElementById("stage_form").reset();
    }   
    
    function resetForm2() {
        document.getElementById("search_form").reset();
        }   

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

    const structuresAffectationSelect = document.getElementById('structuresAffectation');
    const encadrantSelect = document.getElementById('encadrant_id');
    const encadrantOptions = Array.from(encadrantSelect.options);
    
    // Function to dynamically populate encadrant select based on selected structuresAffectation
    function populateEncadrantOptions(selectedStructuresAffectation) {
        // Clear existing options in encadrant select
        encadrantSelect.innerHTML = '';
    
        // Filter encadrants based on the selected structuresAffectation
        encadrantOptions.forEach(option => {
            if (option.dataset.structureId === selectedStructuresAffectation || selectedStructuresAffectation === '') {
                const clone = option.cloneNode(true);
                encadrantSelect.appendChild(clone);
            }
        });
    }

    populateEncadrantOptions(structuresAffectationSelect.value);

    structuresAffectationSelect.addEventListener('change', function() {
    
        const selectedStructuresAffectation = this.value;
    
        populateEncadrantOptions(selectedStructuresAffectation);
    
        quotaVerification();
    });

    function disableFields() {
        document.getElementById('theme').disabled = true;
        document.getElementById('etablissement_id').disabled = true;
        document.getElementById('encadrant_id').disabled = true;
        document.getElementById('stagiare_count').disabled = true;
        document.getElementById('stagiare_count').value = document.getElementById('stagiare_count').options[0].value;
        document.getElementById('level').disabled = true;
        document.getElementById('end_date').disabled = true;
        document.getElementById('start_date').disabled = true;
        document.getElementById('speciality').disabled = true;
        document.getElementById('domain').disabled = true;
        document.getElementById('reception_day').disabled = true;

        toggleInputs(stagiaire1, true);
        toggleInputs(stagiaire2, true);
        toggleInputs(stagiaire3, true);  

    }

    function enableFields() {
        document.getElementById('theme').disabled = false;
        document.getElementById('etablissement_id').disabled = false;
        document.getElementById('encadrant_id').disabled = false;
        document.getElementById('stagiare_count').disabled = false;
        document.getElementById('level').disabled = false;
        document.getElementById('end_date').disabled = false;
        document.getElementById('start_date').disabled = false;
        document.getElementById('speciality').disabled = false;
        document.getElementById('domain').disabled = false;
        document.getElementById('reception_day').disabled = false;
    }
    

    
    


   
