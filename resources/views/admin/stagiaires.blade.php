<x-masterAdmin title="Stagiares">
    <table class="table table-dark table-striped table-hover">
        <tr>
            <th>Theme</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Lieu de naiisance</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Groupe sanguin</th>
            <th>Options</th>
        </tr>
        @foreach ($stagiaires as $stagiaire)
            <tr>
                <td>{{$stagiaire->stage->theme}}</td>
                <td>{{$stagiaire->last_name}} {{$stagiaire->first_name}}</td>
                <td>{{$stagiaire->date_of_birth}}</td>
                <td>{{$stagiaire->place_of_birth}}</td>
                <td>{{$stagiaire->adress}}</td>
                <td>{{$stagiaire->email}}</td>
                <td>{{$stagiaire->blood_group}}</td>
                <td>
                    <button class="btn btn-primary">***</button>
                </td>
            </tr>
        @endforeach
    </table>

</x-masterAdmin>