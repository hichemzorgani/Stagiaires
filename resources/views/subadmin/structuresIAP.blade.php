<x-masterSubadmin title="Structures IAP">
        @if(request()->has('recherche'))
            @if ($structuresIAPs->isEmpty())
                <div>
                    <a onclick="goBack()" class="btn btn-danger my-2">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
                <p class="h3 text-center my-3">Aucune strucutre IAP trouvé.</p>
            @else
                <div>
                    <a onclick="goBack()" class="btn btn-danger my-2">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-dark table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Structures IAP</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($structuresIAPs as $structuresIAP)
                            <tr>
                                <td>{{$structuresIAP->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    {{ $structuresIAPs->appends(['recherche' => ''])->links() }}
                </div>
            @endif
        @else
            <div class="d-flex">
                <div class="col">
                    <div class="title">
                        <h1>Liste des structures IAP</h1>
                    </div>
                </div>
                <form method="POST" action="{{ route('structuresIAP.searchIAP2') }}">
                    @csrf
                    <div class="col d-flex">
                        <div style="width: 450px">
                            <input name="name" placeholder="Structure IAP" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" autocomplete="off" required>
                        </div>
                        <button type="submit" name="recherche" class="btn btn-sm btn-warning mx-1">
                            <i class="bi bi-search"></i> 
                        </button>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-dark table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Structures IAP</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($structuresIAPs as $structuresIAP)
                        <tr>
                            <td>{{$structuresIAP->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                {{ $structuresIAPs->links() }}
            </div>
        @endif

    
</x-masterSubadmin>