@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Adicionar Produto
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
            <form method="post" action="{{ route('products.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Nome do Produto:</label>
                    <input type="text" class="form-control" name="product_name"/>
                </div>
                <div class="form-group">
                    <label for="desc">Descriçao:</label>
                    <input type="text" class="form-control" name="product_description"/>
                </div>
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text" class="form-control" name="product_price"/>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>

    </div>
@endsection