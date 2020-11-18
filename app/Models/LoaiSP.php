<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    protected $table = "loai_san_pham";
    //Tạo mối quan hệ 1-n với sản phẩm
    public function sanpham(){
    	return $this->hasMany('App\Models\SanPham','id_loai_san_pham','id_loai_san_pham');
    }
    public function loai_lsp(){
    	return $this->belongsTo('App\Models\LoaiLSP','id_loai_lsp','id');
    	//Khoá ngoại và khoá chính của bảng loai_lsp
    }
}
