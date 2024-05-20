<x-masterSecurity title="Securité">  
    <form action="{{ route('searchSecurity') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Entrez le nom du stagiaire">
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </div>
    </form>
    <br>
        <p class="h4">Liste des Stagiare</p>
        <table class="table table-dark table-striped table-hover">
            <tr>
                <th>Nom</th>
                <th>Durée du stage</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Jour de récéption</th>
                <th>Stage</th>
    
            </tr>   
            @foreach ($stagiaires as $stagiaire)
            <tr>
                <td>{{$stagiaire->last_name}} {{$stagiaire->first_name}}</td>
                <td>
                    <?php
                        $start_date = new DateTime($stagiaire->Stage->start_date);
                        $end_date = new DateTime($stagiaire->Stage->end_date);
                        $duration = $start_date->diff($end_date)->format("%a jours");
                        echo $duration;
                    ?>
                </td>
                <td>{{$stagiaire->Stage->start_date}}</td>
                <td>{{$stagiaire->Stage->end_date}}</td>
                <td>{{$stagiaire->Stage->reception_day}}</td>
                <td>{{$stagiaire->Stage->theme}}</td>
            </tr>
               @endforeach
        </table>
        
        

    
</x-masterSecurity>