<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SertifikatCreateRequest;

class SertifikatController extends Controller
{
    public function index(){
        return view('sertifikat-test');
    }

    public function formTambah(){

        return view('form-sertifikat', [
            'page_meta' => [
                'method' => 'POST',
                'url' => route('admin.tambah.sertifikat'),
            ]
        ]);

    }

    public function tambah(SertifikatCreateRequest $request)
    {
        $userId = Auth::User()->id;

        // Get the photos data array
        $photos = $request->input('photos', []);

        // Process each file
        foreach ($request->file('file') as $key => $file) {
            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Store the file
            $filePath = $file->storeAs('public/photos', $filename);
            
            // Get the associated data using the key
            $photoData = $photos[$key];

            // Create a new document record            
            Dokumen::create([
                'file_name' => $filename,
                'file_path' => $filePath,
                'jenis_dokumen' => $photoData['jenis_dokumen'] ?? '',
                'tanggal_dokumen' => $photoData['tanggal_dokumen'] ?? null,
                'description' => $photoData['description'] ?? '',
                'seumur_hidup' => filter_var($photoData['seumur_hidup'] ?? false, FILTER_VALIDATE_BOOLEAN),
                'user_id' => $userId,
            ]);
        }

        // Redirect or respond with success message
        return redirect()->back()->with('success', 'Documents uploaded successfully.');
    }
}
