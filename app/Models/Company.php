<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    /**
     * メーカー一覧の取得
     * @return メーカー一覧
     */
    public function getCompanyList() {
        return DB::table('companies')
        ->get();
    }

    /**
     * メーカー名からメーカー情報の取得
     * @param $companyName
     * @return メーカー情報
     */
    public function getCompanyDataByName($companyName) {
        return DB::table('companies')
        ->where('company_name',$companyName)
        ->first();
    }

    /**
     * メーカーIDからメーカー情報の取得
     * @param $companyId
     * @return メーカー情報
     */
    public function getCompanyDataById($companyId) {
        return DB::table('companies')
        ->where('id', $companyId)
        ->first();
    }
}
