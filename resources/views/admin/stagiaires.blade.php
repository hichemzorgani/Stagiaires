<x-masterAdmin title="Stagiaires">  
        @if(request()->has('recherche'))
        @if ($stagiaires->isEmpty())
        <div>
            <a onclick="goBack()" class="btn btn-danger my-2">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="h3 text-center my-3">Aucun stagiaire trouvé.</p>
        @else
        <div>
            <a onclick="goBack()" class="btn btn-danger my-2">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-dark table-bordered table-striped table-hover">
                    <tr>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Lieu de naissance</th>
                        <th>N° de tel</th>
                        <th>Email</th>
                         {{--<th>Durée du stage</th>--}}
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Jours de réception</th>
            
                    </tr>   
                    @foreach ($stagiaires as $stagiaire)
                    <tr>
                        <td>{{$stagiaire->last_name}} {{$stagiaire->first_name}}</td>
                        <td>{{$stagiaire->date_of_birth}}</td>
                        <td>{{$stagiaire->place_of_birth}}</td>
                        <td>{{$stagiaire->phone_number}}</td>
                        <td>{{$stagiaire->email}}</td>
                        {{-- <td>
                            <?php
                            $start_date = new DateTime($stagiaire->Stage->start_date);
                            $end_date = new DateTime($stagiaire->Stage->end_date);
                            $duration = $start_date->diff($end_date)->format("%m mois");
                            if ($start_date->diff($end_date)->days < 30) {
                                $duration = $start_date->diff($end_date)->days . " jours";
                            }
                            echo $duration;
                        ?>
                    </td>--}}
                        <td>{{$stagiaire->Stage->start_date}}</td>
                        <td>{{$stagiaire->Stage->end_date}}</td>
                        <td>{{$stagiaire->Stage->reception_days}}</td>
                    </tr>
                       @endforeach
                </table>
            </div>
            <div class="paginator">
                {{ $stagiaires->links() }}
            </div>
        @endif
        @else
        <div class="d-flex">
            <div class="col">
                <div class="title">
                    <h1>Liste des Stagiares</h1>
                  </div>
            </div>
            <form  method="POST" action="{{ route('searchResultsStagiares1')}}">
                @csrf
            <div class="col d-flex">
                <div style="width: 350px">
                    <input name="name"  placeholder="Nom" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" autocomplete="off" required>
                </div>
                <div>
                    <button name="recherche" type="submit" class="btn btn-sm btn-warning mx-1">
                        <i class="bi bi-search"></i> Rechercher
                    </button>
                </div>         
            </div>
            </form>
        </div>
        <div class="table-responsive">
        <table class="table table-sm table-dark table-bordered table-striped table-hover">
                <tr>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>N° de tel</th>
                    <th>Email</th>
                    {{--<th>Durée du stage</th>--}}
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Jours de réception</th>
        
                </tr>   
                @foreach ($stagiaires as $stagiaire)
                <tr>
                    <td>{{$stagiaire->last_name}} {{$stagiaire->first_name}}</td>
                    <td>{{$stagiaire->date_of_birth}}</td>
                    <td>{{$stagiaire->place_of_birth}}</td>
                    <td>{{$stagiaire->phone_number}}</td>
                    <td>{{$stagiaire->email}}</td>
                    {{-- <td>
                        <?php
                            $start_date = new DateTime($stagiaire->Stage->start_date);
                            $end_date = new DateTime($stagiaire->Stage->end_date);
                            $duration = $start_date->diff($end_date)->format("%m mois");
                            if ($start_date->diff($end_date)->days < 30) {
                                $duration = $start_date->diff($end_date)->days . " jours";
                            }
                            echo $duration;
                        ?>
                    </td>--}}
                    <td>{{$stagiaire->Stage->start_date}}</td>
                    <td>{{$stagiaire->Stage->end_date}}</td>
                    <td>{{$stagiaire->Stage->reception_days}}</td>
                </tr>
                   @endforeach
            </table>
        </div>
        <div class="paginator">
            {{ $stagiaires->links() }}
        </div>
        @endif
        

</x-masterAdmin>