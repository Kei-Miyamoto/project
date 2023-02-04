<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * 商品情報一覧画面の表示
     * @return \Illuminate\Http\Response
     */
    public function showHome()
    {
        // メーカー情報を取得
        $companies = Company::all();
        // 商品じょうを取得
        $products = DB::table('products')
                ->select('products.id'
                        ,'products.product_name'
                        ,'products.img_path'
                        ,'products.stock'
                        ,'products.price'
                        ,'companies.company_name')
                ->leftJoin('companies', 'companies.id', '=', 'products.company_id') // メーカー情報をjoinする
                ->get();

        return view('home', ['companies' => $companies, 'products' => $products]);
    }

    /**
     * 商品登録画面を表示する
     * @return view
     */
    public function showCreate()
    {
        $companies = Company::all();
        return view('product.create', ['companies' => $companies]);
    }

    /**
     * 商品の新規登録
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createProduct(Request $request)
    {
        // トランザクション開始
        \DB::beginTransaction();
        try {
            // 入力されたメーカー名からメーカー情報を取得する
            $company = DB::table('companies')
                        ->where('company_name',$request['companyName'])
                        ->first();

            // 画像がアップされていたらstorageへ保存
            if ($request->img) {
                $image = $request->file('img');
                $path = Storage::put('/public/product', $image);
                $path = explode('/product/', $path);
            }

            // 入力情報を商品情報に格納
            $product = new Product;
            $product->product_name = $request->productName;
            $product->company_id = $company->id;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->comment = $request->comment;
            $product->img_path = $path[1] ? $path[1] : null;
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();
            $product->save();

            // 商品情報の登録処理
            \DB::commit();
            \Session::flash('flash_message_success', '商品情報を登録しました');
        } catch (\Throwable $e) {
            \DB::rollback();
            \Session::flash('flash_message_error', '商品情報の登録に失敗しました');
        }
        return redirect(route('home'));
    }

    /**
     * 商品情報編集画面を表示する
     * @param $id 商品ID
     * @return view
     */
    public function showEdit($id)
    {
        // 商品情報を取得する
        $product = DB::table('products')
                ->where('id', $id)
                ->first();

        
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * 商品情報詳細画面を表示する
     * @return view
     */
    public function showDetail($id)
    {
        // 商品情報を取得する
        $product = DB::table('products')
                ->where('id', $id)
                ->first();

        // 商品に登録されているメーカIDからメーカーを取得する
        $company = DB::table('companies')
                ->where('id', $product->company_id)
                ->first();

        return view('product.detail', ['product' => $product, 'company' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
