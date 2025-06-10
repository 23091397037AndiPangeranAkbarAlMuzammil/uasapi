<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\UMKM;

class UMKMController extends Controller
{
    // Menampilkan semua UMKM
    public function index()
    {
        // Mengambil semua data UMKM beserta produk yang terkait
        $umkms = UMKM::with('produks')->get();  // Mengambil UMKM dan relasi produk
        return view('umkm.index', compact('umkms'));  
    }


    // Menambahkan data UMKM
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'gambar_usaha' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $gambarUsahaPath = null;

        if ($request->hasFile('gambar_usaha')) {
            $gambarUsahaPath = $request->file('gambar_usaha')->store('images', 'public');
        }

        $umkm = UMKM::create([
            'nama_usaha' => $request->nama_usaha,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'gambar_usaha' => $gambarUsahaPath,
        ]);

        return response()->json($umkm->fresh(), 201);

    }


    // Mengupdate data UMKM berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'gambar_usaha' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi gambar
        ]);

        // Mencari UMKM berdasarkan ID
        $umkm = UMKM::findOrFail($id);  // Jika UMKM tidak ditemukan, akan melempar error 404

        // Proses unggah gambar baru jika ada
        if ($request->hasFile('gambar_usaha')) {
            $gambarUsahaPath = $request->file('gambar_usaha')->store('images', 'public');
        } else {
            $gambarUsahaPath = $umkm->gambar_usaha; // Jika tidak ada gambar baru, tetap gunakan gambar lama
        }

        // Mengupdate data UMKM
        $umkm->update([
            'nama_usaha' => $request->nama_usaha,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'gambar_usaha' => $gambarUsahaPath, // Mengupdate gambar jika ada
        ]);

        // Mengembalikan response dalam format JSON dengan status 200 (OK)
        return response()->json($umkm, 200);
    }

    // Menghapus data UMKM berdasarkan ID
    public function destroy($id)
    {
        // Mencari UMKM berdasarkan ID
        $umkm = UMKM::findOrFail($id);  // Jika UMKM tidak ditemukan, akan melempar error 404

        // Menghapus UMKM beserta produk terkait jika perlu
        $umkm->delete();

        // Mengembalikan response dalam format JSON dengan status 200 (OK)
        return response()->json(['message' => 'UMKM deleted successfully'], 200);
    }

    public function show($id)
    {
        $umkm = UMKM::findOrFail($id);
        return view('umkm.umkm_detail', compact('umkm'));
    }
}