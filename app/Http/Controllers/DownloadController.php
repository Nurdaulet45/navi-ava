<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadFileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadFile(DownloadFileRequest $request)
    {
        $path = $request->path;
        if (!Storage::disk('public')->exists($path)) {
            return redirect()->back()->withErrors(['file_name' => 'Файл табылмады']);
        }
        return Storage::disk('public')->download($path);
    }
}
