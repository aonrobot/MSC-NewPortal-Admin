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
	public function cat_posts($cat_id) {

		$category = Category::where('catid', '=', $cat_id)->first();

		if (empty($category)) {
			abort(404, '[Category -> cat_posts function] This category is not found');
		}

		$posts = [];
		$pids = Category_rela::where('catid', '=', $cat_id)->get(['pid']);
		foreach ($pids as $pid) {
			$post = Post::where('pid', '=', $pid->pid)->first()->toArray();
			array_push($posts, $post);
		}

		return ['posts' => $posts, 'category' => $category];
	}
}
