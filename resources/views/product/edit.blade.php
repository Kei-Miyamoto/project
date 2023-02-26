
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">商品編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype='multipart/form-data'>
                        @csrf
                        <div class="text-center col-md-12 myz-1">
                            <label class="col-md-2 col-form-label" for="">商品情報ID</label>
                            <input class="col-md-8" value="{{ $product->id }}" type="text" name="productId" disabled>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">商品画像</label>
                            <input id="" class="col-md-8" value="" type="file" name="img">
                        </div>
                        <div class="text-center col-md-12 myz-1">
                            <label class="col-md-2 col-form-label" for="">商品名</label>
                            <input id="" class="col-md-8" value="{{ $product->product_name }}" type="text" name="productName">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">メーカー名</label>
                            <select name="" id="" class="col-md-8" name="companyName">
                                @foreach($companies as $company)
                                    @if($product->company_id === $company->id)
                                        <option value="{{ $company->company_name }}" selected>{{ $company->company_name }}</option>
                                    @else
                                        <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">価格</label>
                            <input id="" class="col-md-8" value="{{ $product->price }}" type="text" name="price">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">在庫</label>
                            <input id="" class="col-md-8" value="{{ $product->stock }}" type="text" name="stock">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">コメント</label>
                            <textarea id="" class="col-md-8" value="{{ $product->comment }}" type="text" name="comment">{{ $product->comment }}</textarea>
                        </div>
                        <div class="text-center my-2">
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-left my-2">
                <button type="button" onclick="location.href='/product/show/detail/{{ $product->id }}'" class="btn btn-secondary">戻る</button>
            </div>
        </div>
    </div>
</div>
@endsection
