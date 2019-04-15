@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Descriçao</td>
                <td>Preço</td>
                <td colspan="2">Açoes</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_description}}</td>
                    <td>{{$product->product_price}}</td>
                    <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection