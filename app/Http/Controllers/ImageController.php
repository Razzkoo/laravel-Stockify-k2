<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'title' => $request->title,
            'image' => $path,
        ]);

        return redirect()->route('images.index')
            ->with('success', 'Image berhasil diupload');
    }
    public function destroy($id)
{
    // Ambil image berdasarkan ID
    $image = Image::findOrFail($id);

    // Hapus file dari storage jika ada
    if (Storage::disk('public')->exists($image->image)) {
        Storage::disk('public')->delete($image->image);
    }

    // Hapus record dari database
    $image->delete();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('images.index')
        ->with('success', 'Image berhasil dihapus');
}
}
