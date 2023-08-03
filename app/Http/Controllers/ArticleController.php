<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.articles.index', ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.articles.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'unique:articles'],
            'tags' => 'required',
            'category' => 'required',
            'text' => 'required',
        ]);

        if ($request->has('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }

        $tags = explode(',', $request->tags);

        $article = new Article();
        $article->title = $request->title;
        $article->image = $filename ?? null;
        $article->category_id = $request->category;
        $article->text = $request->text;
        $article->save();

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        }

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.articles.show', ['article' => Article::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.articles.edit',
            [
                'article' => Article::find($id),
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        $request->validate([
            'title' => ['required', 'unique:articles'],
            'tags' => 'required',
            'category' => 'required',
            'text' => 'required',
        ]);

        if ($request->has('image')) {
            Storage::delete('public/uploads/' . $article->image);

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }


        $article->title = $request->title;
        $article->image = $filename ?? $article->image;
        $article->category_id = $request->category;
        $article->text = $request->text;
        $article->save();

        $tags = explode(',', $request->tags);
        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $article->tags()->sync($newTags);

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete('public/uploads/' . $article->image);
        }

        $article->tags()->detach();
        $article->delete();

        return redirect('/articles');
    }
}
