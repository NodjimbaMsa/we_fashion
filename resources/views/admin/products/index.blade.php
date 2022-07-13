@extends('layouts.app')

@section('content')

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Liste de Produits</h2>
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
            <a href="{{route('products.create')}}" class="btn btn-success" data-toggle="modal"> <span>Ajouter un nouveau produit</span></a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Etat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product )
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{isset($product->category) ? $product->category->name: 'N/A'}}</td>
                    <td>{{$product->price}} €</td>
                    <td>{{ ( $product->visibility == "published") ? "Publié" : "Non publié"}}</td>
                    <td>
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-success" data-toggle="modal"> <span>Modifier le produit</span></a>
                        <form id="formDelete-{{ $product->id }}" action="{{route('products.destroy', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression de ce produit ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty

                <tr>Aucun Produit</tr>

                @endforelse($products as $product)
            </tbody>
        </table>
        <div class="clearfix">
            <div class="col-12 mt-4 me-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
