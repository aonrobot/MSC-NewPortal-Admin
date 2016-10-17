<?php

namespace App\Http\Controllers;

use App\Category;
use App\Category_rela;
use App\Post;
use App\Setting;
use DB;

class FrontHomeController extends Controller {
	public function index() {

		$setting = ['slide_head' => [], 'slide' => [], 'news_category' => []];
		$setting['slide_head'] = Setting::where('set_type', '=', 'home')->Where('set_subtype', '=', 'slide_head')->first();
		$setting['slide'] = Setting::where('set_type', '=', 'home')->Where('set_subtype', '=', 'slide')->first();
		$setting['news_category'] = Setting::where('set_type', '=', 'home')->Where('set_subtype', '=', 'news_category')->first();

		if (empty($setting['slide_head']) && empty($setting['slide']) && empty($setting['news_category']) && empty($setting['slide_head']->set_value)) {
			return view('pages.init', ['error' => '[FrontHome:20] Slide Head, Slide, News Category is not setup !!']);
		}

		//id
		$slide_head_id = $setting['slide_head']->set_value;
		$slide_id = $setting['slide']->set_value;
		$news_category_id = $setting['news_category']->set_value;

		//Read Slide Setting Data
		$slide_setting = ['slide_head' => [], 'slide' => []];
		$slide_setting['slide_head'] = DB::select(" select * from cp_slide where slide_id = ?", [$slide_head_id]);
		$slide_setting['slide'] = DB::select(" select * from cp_slide where slide_id = ?", [$slide_id]);

		//Read Date
		$slide_head = DB::select(" select * from cp_slide_item where slide_id = ? ORDER BY slide_item_sort ASC", [$slide_head_id]);

		$slide = DB::select(" select * from cp_slide_item where slide_id = ? ORDER BY slide_item_sort ASC", [$slide_id]);

		$categorys = Category::where('cat_type', '=', 'administrator')->whereNotIn('catid', [$news_category_id])->get();
		$category_relas = Category_rela::where('catid', '=', $news_category_id)->take(5)->get();

		if (empty(Category::where('catid', '=', $news_category_id)->get()[0])) {
			return view('pages.init', ['error' => '[FrontHome:42] Error not found category for news category !!']);
		}
		$news_category = ['cat_title' => Category::where('catid', '=', $news_category_id)->get()[0], 'posts' => []];

		foreach ($category_relas as $category_rela) {
			array_push($news_category['posts'], Post::where('pid', '=', $category_rela->pid)->first()->toArray());
		}

		$data = [
			'slide_heads' => $slide_head,
			'slides' => $slide,
			'slide_setting' => $slide_setting,
			'news_category' => $news_category,
			'categorys' => $categorys,
		];

		return view('pages.home', $data);
	}

}
