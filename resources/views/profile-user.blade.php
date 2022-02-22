@extends('Master.MasterDashUser')

@section('title')
    liste des commandes
@endsection
@section('content')
<div class="container-fluid px-4">
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Les Commandes</h3>
        <div class="col">
        @if(session('successdel'))
            <div class="alert alert-success">
                {{ session('successdel') }}
            </div>
            @elseif(session('successAnnuler'))
            <div class="alert alert-success">
                {{ session('successAnnuler') }}
            </div>
            @elseif(session('successConfirmer'))
            <div class="alert alert-success">
                {{ session('successConfirmer') }}
            </div>
        @endif
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="100">#ID</th>
                        <th scope="col">Nom Client</th>
                        <th scope="col">Total Qty</th>
                        <th scope="col">Total Prix</th>
                        <th scope="col">Statue</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @if ($commandes->count() >= 1)
                    @foreach ($commandes as $cmd )

                    <tr>
                        <th scope="row">{{ $cmd->id }}</th>
                        <td>{{ $cmd->nom }}</td>
                        <td>{{ $cmd->totalq }}</td>

                        <td>{{ $cmd->totalr }}DH</td>
                        <td>
                            @if ($cmd->statue == "traitement")
                              <b class="text-warning">En cours de traitement..</b>
                            @elseif($cmd->statue == "confirmer")
                            <b class="text-success">Confirmée</b>
                            @elseif($cmd->statue == "annuler")
                            <b class="text-danger">Annulée</b>
                            @endif
                        </td>
                        <td>{{ $cmd->created_at }}</td>
                        <td class=" position-relative"><a href="{{ route('commande-user.show', $cmd->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>

                        </td>
                    </tr>

                    @endforeach
                    @else
                    <tr>
                        <td colspan="4">
                    <div class="row text-center">

                        <h4 class="text-secondary p-2">Aucune Commande.</h4>

                 </div>
                </td>
                </tr>
                 @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
