document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const parentSelect = document.getElementById('parent_id');

    typeSelect.addEventListener('change', function() {
        if (this.value === 'Departement') {
            parentSelect.removeAttribute('disabled');
        } else {
            parentSelect.setAttribute('disabled', 'disabled');
        }
    });
});

function goBack() {
    window.history.back();
}
