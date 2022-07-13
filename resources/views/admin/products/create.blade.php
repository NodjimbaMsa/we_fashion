@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crée un Produit</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="panel-body">

                        <form enctype="multipart/form-data" action="{{route('products.store')}}" method="POST" class="my-8">

                            @csrf

                            <!-- Name -->
                            <div class="form-group my-2">
                                <label for="name" class="col-sm-3 control-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Inscrivez le nom">
                                </div>
                            </div>

                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror


                            <!-- Price -->
                            <div class="form-group my-3">
                                <label for="price" class="col-sm-3 control-label">Prix</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Entrez un prix">
                                </div>
                            </div>

                            @error('price')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror

                            <!-- Category -->
                            <div class="form-group my-3">
                                <label for="category" class="col-sm-3 control-label">Catégorie</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="null" disabled>Choisir une categorie</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}" {{( old('category_id') == $categorie->id )? 'selected' : ''}}>
                                            {{$categorie->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @error('category_id')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror


                            <!-- Description -->
                            <div class="form-group my-3">
                                <label for="description" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            @error('description')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror


                            <!-- Reference -->
                            <div class="form-group my-2">
                                <label for="reference" class="col-sm-3 control-label">Réference</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ old('reference') }}" name="reference" id="reference" placeholder="Inscrivez un réference">
                                </div>
                            </div>

                            @error('reference')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror

                            <!-- Visibility -->
                            <div class="form-group my-3">
                                <label for="visibility" class="col-sm-3 control-label">Visible</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" name="visibility" id="visibility" value="published" {{(old('visiblity') == "published") ? 'checked' : ''}}>Publié
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="visibility" id="visibility" value="no_published" {{(old('visibility') == "no_published") ? 'checked' : ''}}>Non Publié
                                    </label>
                                </div>
                            </div>

                            @error('visibility')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror


                            <!-- Discount -->
                            <div class="form-group my-3">
                                <label for="discount" class="col-sm-3 control-label">Etat du produit</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" name="discount" id="discount" value="solde" {{ (old('discount') == 'solde') ? 'checked' : ''}}> Solde
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="discount" id="discount" value="defaut" {{ (old('discount') == 'defaut') ? 'checked' : ''}}> Standard
                                    </label>
                                </div>
                            </div>

                            @error('discount')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror


                            <!-- Sizes -->
                            <div class="form-group my-3">
                                <label for="sizes" class="col-sm-3 control-label">Tailles du produit</label>
                                @foreach($sizes as $size)
                                <label class="radio-inline" for="sizes">{{ $size->name }}</label>
                                <input type="checkbox" name="sizes[]" value="{{$size->id}}" {{in_array($size->id, old('sizes', [])) ? 'checked' : '' }}>
                                @endforeach
                            </div>

                            @error('sizes')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror


                            <!-- Photo -->
                            <div class="form-group my-4">

                                @if(isset($product->picture))
                                <div class="d-flex flex-column mb-3">
                                    <label class="form-label" for="picture">Photo du produit</label>
                                    <img style="width: 20%" src="{{asset($product->picture->path)}}" alt="produit {{$product->name}}">
                                </div>
                                @endif

                                <label for="picture" class="col-sm-3 control-label">Importez une Image</label>
                                <div class="col-sm-3">
                                    <label class="control-label small" for="picture">Image (jpg/png):</label> <input type="file" name="picture">
                                </div>
                            </div>

                            @error('picture')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror

                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success mb-3">Ajouter un nouveau produit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
