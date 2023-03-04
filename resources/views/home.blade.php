@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">検索</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('product.search') }}">
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">商品名</label>
                            <input id="" name="searchWord" class="col-md-8" value="" type="text">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">メーカー名</label>
                            <select name="searchCompany" id="" class="col-md-8">
                                <option value="">未選択</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center my-2">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="col-md-12 col-xs-12 my-2 text-right">
                <button  type="button" onclick="location.href='{{ route('product.show.create') }}'" class="btn btn-primary col-xs-12">新規登録</button>
            </div>

            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr class="">
                        <th class="text-center">ID</th>
                        <th class="text-center">商品画像</th>
                        <th class="text-center">商品名</th>
                        <th class="text-center">価格</th>
                        <th class="text-center">在庫</th>
                        <th class="text-center">メーカー名</th>
                        <th class="text-center">詳細</th>
                        <th class="text-center">削除</th>
                    </tr>
                </thead>
                <tbody id="" class="table-striped">
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center">{{ $product->id }}</td>
                            <td class="text-center"><img src="{{ '/storage/product/' .  $product->img_path }}" alt="non-image" width="100" height="auto"></td>
                            <td class="text-center">{{ $product->product_name }}</td>
                            <td class="text-center">{{ $product->price }}</td>
                            <td class="text-center">{{ $product->stock }}</td>
                                    <td class="text-center">{{ $product->company_name }}</td>
                            <td class="text-center">
                                <button type="button" onclick="location.href='/product/show/detail/{{ $product->id }}'" class="btn btn-success">詳細</button> 
                            </td>
                            <td class="text-center">
                                <button type="" class="btn btn-danger">削除</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
