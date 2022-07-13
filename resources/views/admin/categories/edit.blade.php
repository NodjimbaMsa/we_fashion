@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifie une Catégorie</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="panel-body">

                        <form enctype="multipart/form-data" action="{{route('categories.update', $category->id)}}" method="POST" class="my-8">
                            @method('PUT')

                            @csrf

                            <!-- Name -->
                            <div class="form-group my-2">
                                <label for="name" class="col-sm-3 control-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ old('name', $category->name) }}" name="name" id="name" placeholder="Inscrivez le nom">
                                </div>
                            </div>

                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0"> {{$message}} </p>
                            </div>
                            @enderror

                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success mb-3">Modifier la catégorie</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
