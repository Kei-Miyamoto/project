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
    protected $product;
    protected $company;

    public function __construct(Product $product, Company $company) {
        $this->product = $product;
        $this->company = $company;
    }

    /**
     * 商品情報一覧画面の表示
     * @return view
     * @return $companies
     * @return $products
     */
    public function showHome()
    {
        // メーカー情報を取得
        $companies = $this->company->getCompanyList();
        // 商品情報を取得
        $products = $this->product->getProductList();
        return view('home', ['companies' => $companies, 'products' => $products]);
    }

    /**
     * 商品登録画面を表示する
     * @return view
     * @return $companies
     */
    public function showCreate()
    {
        // メーカー情報を取得
        $companies = $this->company->getCompanyList();
        return view('product.create', ['companies' => $companies]);
    }

    /**
     * 商品の新規登録
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function createProduct(Request $request)
    {
        // トランザクション開始
        \DB::beginTransaction();
        try {
            // 入力されたメーカー名からメーカー情報を取得する
            $company = $this->company->getCompanyDataByName($request->companyName);

            // 入力情報を登録
            $this->product->storeProduct($request, $company);

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
     * @return $product
     * @return $companies
     */
    public function showEdit($id)
    {
        // 商品情報を取得する
        $product = $this->product->getProductData($id);

        // メーカー情報を取得する
        $companies = $this->company->getCompanyList();

        return view('product.edit', ['product' => $product, 'companies' => $companies]);
    }

    /**
     * 商品の更新
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function updateProduct(Request $request, $id)
    {
        // トランザクション開始
        \DB::beginTransaction();
        try {
            // 入力されたメーカー名からメーカー情報を取得する
            $company = $this->company->getCompanyDataByName($request->companyName);

            // 入力情報を更新
            $this->product->updateProduct($request, $company, $id);

            \DB::commit();
            \Session::flash('flash_message_success', '商品情報を更新しました');
        } catch (\Throwable $e) {
            \DB::rollback();
            \Session::flash('flash_message_error', '商品情報の更新に失敗しました');
        }
        return redirect(route('home'));
    }

    /**
     * 商品情報詳細画面を表示する
     * @return view
     */
    public function showDetail($id)
    {
        // 商品情報を取得する
        $product = $this->product->getProductData($id);

        // 商品に登録されているメーカIDからメーカーを取得する
        $company = $this->company->getCompanyDataById($product->company_id);

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
