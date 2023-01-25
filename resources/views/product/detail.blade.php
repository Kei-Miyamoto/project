
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">商品詳細</div>

                <div class="card-body">
                    <form action="">
                        <div class="text-center col-md-12 myz-1">
                            <label class="col-md-2 col-form-label" for="">商品情報ID</label>
                            <input id="" class="col-md-8" value="" type="text" readonly>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">商品画像</label>
                            <input id="" class="col-md-8" value="" type="file" readonly>
                        </div>
                        <div class="text-center col-md-12 myz-1">
                            <label class="col-md-2 col-form-label" for="">商品名</label>
                            <input id="" class="col-md-8" value="" type="text" readonly>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">メーカー名</label>
                            <select name="" id="" class="col-md-8" readonly>
                                <option value="" >未選択</option>
                            </select>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">価格</label>
                            <input id="" class="col-md-8" value="" type="text" readonly>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">在庫</label>
                            <input id="" class="col-md-8" value="" type="text" readonly>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">コメント</label>
                            <textarea id="" class="col-md-8" value="" type="text" readonly></textarea>
                        </div>
                        <div class="text-center my-2">
                            <button type="button" onclick="location.href='{{ route('product.show.edit') }}'" class="btn btn-primary">編集</button>
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
