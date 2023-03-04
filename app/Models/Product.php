<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Product extends Model
{
    /**
     * 商品情報一覧の取得
     * @return $obj
     */
    public function getAllProductList() {
        return DB::table('products')
        ->select('products.id'
                ,'products.product_name'
                ,'products.img_path'
                ,'products.stock'
                ,'products.price'
                ,'companies.company_name')
        ->leftJoin('companies', 'companies.id', '=', 'products.company_id') // メーカー情報をjoinする
        ->orderBy('products.id', 'asc')
        ->get();
    }

    /**
     * 検索キーワードによっての商品情報一覧の取得
     * @param $search_word 商品名キーワード
     * @param $search_company メーカーID
     * @return $products 商品情報
     */
    public function getProductList($search_word, $search_company) {
        $query = Product::query();
        $query->select(
            'products.id'
            ,'products.product_name'
            ,'products.img_path'
            ,'products.stock'
            ,'products.price'
            ,'companies.company_name')
        ->leftJoin('companies', 'companies.id', '=', 'products.company_id'); // メーカー情報をjoinする
        // 商品名キーワードが入力されていた場合
        if ($search_word) {
            $query->where('products.product_name', 'like', '%'.$search_word.'%'); // 商品名キーワードでの曖昧検索
        }
        // メーカー名が入力されていた場合
        if ($search_company) {
            $query->where('companies.id', '=', $search_company);
        }
        $query->orderBy('products.id', 'asc');
        $products = $query->get();
        return $products;
    }

    /**
     * 商品情報の取得
     * @param $id 商品ID
     * @return $obj
     */
    public function getProductData($id) {
        return DB::table('products')
        ->where('id', $id)
        ->first();
    }

    /**
     * 商品情報を登録
     * @param $product
     * @return
     */
    public function storeProduct($inputProduct, $inputCompany) {
        $path = null;
        // 画像がアップされていたらstorageへ保存
        if ($inputProduct->img) {
            $image = $inputProduct->file('img');
            $path = Storage::put('/public/product', $image);
            $path = explode('/product/', $path);
        }

        // 商品情報を登録
        $product = new Product;
        $product->product_name = $inputProduct->productName;
        $product->company_id = $inputCompany->id;
        $product->price = $inputProduct->price;
        $product->stock = $inputProduct->stock;
        $product->comment = $inputProduct->comment;
        $product->img_path = $path ? $path[1] : null;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->save();
    }

    /**
     * 商品情報を更新
     * @param $product
     * @return
     */
    public function updateProduct($inputProduct, $inputCompany, $id) {
        $path = null;
        // 画像がアップされていたらstorageへ保存
        if ($inputProduct->hasFile('img')) {
            $image = $inputProduct->file('img');
            $path = Storage::put('/public/product', $image);
            $path = explode('/product/', $path);
        }

        // IDから商品情報を取得
        $product = Product::find($id);
        $product->product_name = $inputProduct->productName;
        $product->company_id = $inputCompany == null ? $product->company_id : $inputCompany->id;
        $product->img_path = $path ? $path[1] : null;
        $product->price = $inputProduct->price;
        $product->stock = $inputProduct->stock;
        $product->comment = $inputProduct->comment;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->save();
    }
}