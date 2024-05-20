<x-masterSubadmin title="Domaines">
    @if(request()->has('recherche'))
    @if ($domaines->isEmpty())
    <div>
        <a onclick="goBack()" class="btn btn-danger my-2">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
    </div>
    <p class="h3 text-center my-3">Aucun domaine trouvé.</p>
    @else
    <div>
        <a onclick="goBack()" class="btn btn-danger my-2">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-dark table-bordered table-striped table-hover">
        </table>
    </div>
    <div class="paginator">
        {{ $domaines->links() }}
    </div>
@endif
@else
<div class="d-flex">
    <div class="col">
        <div class="title">
            <h1>Liste des domaines</h1>
          </div>
    </div>
    <form  method="POST" action="">
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
        @foreach ($structuresIAPs as $structuresIAP)
            <th>{{$structuresIAP->name}}</th>
            
    </tr>
    <tr>
        <td>
        @foreach ($structuresIAP->domaines as $domaine)
        {{$domaine->name}}<br>
        @endforeach
        </td>     
    </tr>
    @endforeach
    
</table>
</div>
<div class="paginator">
    {{ $domaines->links() }}
</div>
@endif
</x-masterSubadmin>