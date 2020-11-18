<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiLSP extends Model
{
   protected $table = "loai_lsp";
    //Tạo mối quan hệ 1-n với sản phẩm
    public function LoaiSP(){
    	return $this->hasMany('App\Models\LoaiSP','id_loai_lsp','id');
    }
}
