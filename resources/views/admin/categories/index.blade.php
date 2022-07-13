@extends('layouts.app')

@section('content')

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Liste des Catégories</h2>
                </div>

                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

            </div>
        </div>
        <div class="col-sm-5">
            <a href="{{route('products.create')}}" class="btn btn-success" data-toggle="modal"> <span>Ajouter une nouvelle catégorie</span></a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-success" data-toggle="modal"> <span>Modifier le produit</span></a>
                        <form id="formDelete-{{ $category->id }}" action="{{route('categories.destroy', $category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression de cette catégorie ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty

                <tr>Aucune Catégorie</tr>

                @endforelse($categories as $category)
            </tbody>
        </table>
        <div class="clearfix">
            <div class="col-12 mt-4 me-4">
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection

