
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">商品詳細</div>

                <div class="card-body">
                    <form action="">
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">商品情報ID</label>
                            <input id="" class="col-md-8" value="{{ $product->id }}" type="" disabled>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">商品画像</label>
                            <img class=
                            "col-md-8" src="{{ '/storage/product/' .  $product->img_path }}" alt="non-image" width="100" height="auto">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">商品名</label>
                            <input id="" class="col-md-8" value="{{ $product->product_name }}" type="text" disabled>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">メーカー名</label>
                            <select name="" id="" class="col-md-8" style="color: black;" disabled>
                                <option value="" selected>{{ $company->company_name }}</option>
                            </select>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">価格</label>
                            <input id="" class="col-md-8" value="{{ $product->price }}" type="text" disabled>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">在庫</label>
                            <input id="" class="col-md-8" value="{{ $product->stock }}" type="text" disabled>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">コメント</label>
                            <textarea id="" class="col-md-8" value="{{ $product->comment }}" type="text" disabled>{{ $product->comment }}</textarea>
                        </div>
                        <div class="text-center my-2">
                            <button type="button" onclick="location.href='/product/show/edit/{{ $product->id }}'" class="btn btn-primary">編集</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-left my-2">
                <button type="button" onclick="location.href='{{ route('home') }}'" class="btn btn-secondary">戻る</button>
            </div>
        </div>
    </div>
</div>
@endsection
