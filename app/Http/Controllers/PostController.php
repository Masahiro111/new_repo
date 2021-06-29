<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('qiita.drafts.new');
    }

    public function showTopPage()
    {
        $articles = Post::orderBy('created_at', 'asc')->get();
        return view('qiita.top', compact('articles'));
    }

    public function postArticle(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'tags' => 'required|string',
            'article' => 'required|string',
        ]);

        $tags = explode(' ', $request->tags);
        $tag1 = $tags[0];
        $tag2 = (isset($tags[1])) ? $tags[1] : null;
        $tag3 = (isset($tags[2])) ? $tags[2] : null;

        $article = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'tag1' => $tag1,
            'tag2' => $tag2,
            'tag3' => $tag3,
            'article' => $request->article,
        ]);
        return redirect('/drafts/' . $article->id);
    }

    public function showArticle($id)
    {
        $article = Post::where('id', $id)->first();
        return view('qiita.drafts.item', compact('article'));
    }
}
