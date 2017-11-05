<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function store(Request $request)
    {
        $extension = $request->file('uploaded_file')->extension();
        $mimeType = $request->file('uploaded_file')->getMimeType();
        $path = Storage::putFileAs('uploads', $request->file('uploaded_file'), time().'.'.$extension, 'public');

        return back()->with('success_message', 'Upload successful');
    }

    public function show()
    {
        $file = Storage::get('uploads/1509690208.pdf');

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response($file, 200, $headers);
    }
}
