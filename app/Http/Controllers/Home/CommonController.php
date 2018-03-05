<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Navs;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct(){
        $new = Article::orderBy( 'art_time','desc' )->take(8)->get();
        $click = Article::orderBy( 'art_view','desc' )->take(5)->get();
        $category = Category::select('id','cate_name')->get()->toarray();
        foreach ($category as $k=>$ca){
            $nums = Article::where('cate_id',$ca['id'])->get()->toarray();
            $category[$k]['counts'] = count($nums);
        }
        $navs = Navs::all();
        View::share( 'navs',$navs );
        View::share( 'new',$new );
        View::share( 'click',$click );
        View::share( 'category',$category );
    }
}
