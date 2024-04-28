<x-masterAdmin title="Stages">
    <table class="table table-dark table-striped table-hover">
        <tr>
            <th>Theme</th>
            <th>Nombre de stagiaires</th>
            <th>Nom des stagiaires</th>
            <th>Type de stage</th>
            <th>Niveau</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Domaine</th>
            <th>Spécialité</th>
            <th>Structures D'Affectation</th>
            <th>Encadrant</th>
            <th>Etablissement</th>
        </tr>
        @foreach ($stages as $stage)
            <tr>
                <td>{{$stage->theme}}</td>
                <td>{{$stage->stagiare_count}}</td>
                <td>
                    @foreach ($stage->stagiaires as $key => $stagiaire)
                        {{$stagiaire->last_name}} {{$stagiaire->first_name}}
                        <br>
                    @endforeach
                </td>
                <td>{{$stage->stage_type}}</td>
                <td>{{$stage->level}}</td>
                <td>{{$stage->start_date}}</td>
                <td>{{$stage->end_date}}</td>
                <td>{{$stage->domain}}</td>
                <td>{{$stage->speciality}}</td>
                <td>{{$stage->structureAffectation->name}}</td>
                <td>{{$stage->encadrant->last_name}} {{$stage->encadrant->first_name}}</td>
                <td>{{$stage->etablissement->name}}</td>
            </tr>
        @endforeach
</table>
<div class="my-2">{{$stages->links()}}</div>
</x-masterAdmin>
     