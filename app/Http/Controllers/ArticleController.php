<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'user'])->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return redirect()->route('categories.create')->with('info', 'Silakan buat kategori terlebih dahulu sebelum menambah artikel.');
        }

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required',
        ]);

        Article::create([
            'user_id'     => Auth::id(),
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . time(),
            'content'     => $request->content,
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(Article $article)
    {
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'       => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required',
        ]);

        $article->update([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . $article->id,
            'content'     => $request->content,
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
