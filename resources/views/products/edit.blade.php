@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Share
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('products.update', $product->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="product_name" value={{ $product->product_name }} />
                </div>
                <div class="form-group">
                    <label for="description">Descriçao :</label>
                    <input type="text" class="form-control" name="product_description" value={{ $product->product_description }} />
                </div>
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text" class="form-control" name="product_price" value={{ $product->product_price }} />
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
                <br>
                <a class="btn btn-warning" href="{{ URL::to('products/create') }}">Voltar</a>
        </div>
    </div>
@endsection