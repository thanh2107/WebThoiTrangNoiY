<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\TinTuc;
use App\Models\SanPham;
use App\Models\LoaiSp;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
class NewsController extends Controller
{	
	public function AuthLogin(){

		if(Auth::check()&&Auth::user()->level=='3')
		{   
			return Redirect::to('admin.dashboard'); 

		}
		else
		{   
			return Redirect::to('admin')->send(); 

		}
	}
	public function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
	public function all_news(){
		$this->AuthLogin();
		$all_news = TinTuc::all();
		return view('admin.all_news',compact('all_news'));
	}    
	public function add_news(){
		$this->AuthLogin();
		$news = TinTuc::all();
		return view('admin.add_news',compact('news'));
	}
	public function save_news(Request $req){


		$this->AuthLogin();
		Session::put('message_add', 'add_news');
		$this->validate($req,

			[   

				'news_title'=>'unique:tin_tuc,tieu_de',


			],
			[
				'news_title.unique'=>'Tên tiêu đề đã có sẵn',


			]);

		$data  = array();
		$data['trang_thai'] = $req ->news_status;
		$data['tieu_de'] = $req ->news_title;
		$data['mo_ta'] = $req ->short_desc;
		$data['noi_dung'] = $req ->editordata;
		
		$get_image = $req->file('news_img');
		$allowtypes = array('jpg', 'png', 'jpeg');
		$allowUpload   = true;
		$get_img_extensiton = $get_image->getclientoriginalextension();	
		if (!in_array($get_img_extensiton,$allowtypes))
		{
			$allowUpload = false;
		}
		if ($allowUpload)
		{
			$ten_img = $this->convert_name($req->news_title);
			$new_image = $ten_img.rand(0,99).date("h_i_s").'.'.$get_img_extensiton;
			$get_image->move('resources/img/news',$new_image);
			$data['img'] = $new_image;
			TinTuc::insert($data);
			Session::put('message', 'Thêm bài viết thành công');
			return Redirect::to('all-news');
		}
		else
		{
			Session::put('message', 'Không upload được file,Chỉ được upload các định dạng JPG, PNG, JPEG, kiểu file không đúng ...');
			return Redirect::to('all-news');
		}
	}
	public function delete_slide($id_slide){
		$this->AuthLogin();
		$slide = Slide::where('id',$id_slide)->first();
		$slide_img = "resources/img/slide/".$slide->img;
		unlink($slide_img);
		Slide::where('id',$id_slide) ->delete();
		Session::put('message', 'Xoá Slide thành công');
		return Redirect::to('all-slide');

	}
	public function edit_slide($id_slide){
		$this->AuthLogin();
		$product = SanPham::all();
		$catelogy = LoaiSP::all();
		$slide = Slide::where('id',$id_slide)->first();
		return view('admin.edit_slide',compact('slide','product','catelogy'));
	}
	public function update_slide($id_slide,Request $req){
         $this->AuthLogin();
         Session::put('message_add', 'add_slide');
            $data  = array();
            $data['ten_slide'] = $req ->slide_name;
            $data['tieu_de'] = $req ->tittle_name;
            $data['noi_dung'] = $req ->contten_slide;  
            $data['trang_thai'] = $req ->slide_status; 
            Slide::where('id',$id_slide)->update($data);
            Session::put('message', 'Cật nhật danh mục sản phẩm thành công');
          return redirect()->back();
    }


}
