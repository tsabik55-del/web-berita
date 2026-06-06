<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Tampilkan semua berita (produk under-the-hood).
     */
    public function index()
    {
        $beritaList = Product::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.berita.index', compact('beritaList'));
    }

    /**
     * Tampilkan form tambah berita.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.berita.create', compact('categories'));
    }

    /**
     * Simpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ], [
            'name.required' => 'Judul berita wajib diisi.',
            'name.min' => 'Judul berita minimal 5 karakter.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak valid.',
            'description.required' => 'Isi berita wajib diisi.',
        ]);

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => 0.00, // Nilai default agar valid di database
            'stock' => 999,  // Nilai default agar valid di database
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    /**
     * Tampilkan form edit berita.
     */
    public function edit($id)
    {
        $berita = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.berita.edit', compact('berita', 'categories'));
    }

    /**
     * Perbarui berita di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ], [
            'name.required' => 'Judul berita wajib diisi.',
            'name.min' => 'Judul berita minimal 5 karakter.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak valid.',
            'description.required' => 'Isi berita wajib diisi.',
        ]);

        $berita = Product::findOrFail($id);
        $berita->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita dari database.
     */
    public function destroy($id)
    {
        $berita = Product::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
