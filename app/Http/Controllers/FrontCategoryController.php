<?php

namespace App\Http\Controllers;

use App\Category;
use App\Category_rela;
use App\Post;

class FrontCategoryController extends Controller {

	//////////////////////////////////// Main /////////////////////////////////////////

	public function index($id) {

		return view('pages.category', $this->cat_posts($id));
	}

	public function news($id) {
		return view('pages.category_news', $this->cat_posts($id));
	}

	// Function to read category by id and read post in this category
	public function cat_posts($cat_id, $col = 'created_at', $sortType = 'DESC') {

		$category = Category::where('catid', '=', $cat_id)->first();

		if (empty($category)) {
			abort(404, '[Category -> cat_posts function] This category is not found');
		}

		$posts = \DB::select("select c.catid,p.*
		from mscnewportal.dbo.category_rela as c
		left join mscnewportal.dbo.post as p on c.pid = p.pid
		where catid = ? ORDER BY p." . $col . " " . $sortType , [$cat_id]);
		

		return ['posts' => $posts, 'category' => $category];
	}
}
