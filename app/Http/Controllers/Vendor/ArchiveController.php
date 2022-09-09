<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function fileDownload(Request $request)
    {
        $messasge = Chat::with('vendor', 'customer')->find($request->msg_id);
        $messasge->vendor_file_status = '1';
        $messasge->save();

        $archive = new Archive();
        $archive->vendor_id = Auth::id();
        if ($messasge->vendor_sender_id == null) {
            $archive->sender_name = $messasge->customer->name;
        } else {
            $archive->sender_name = $messasge->vendor->name;
        }
        $archive->file = $messasge->attachment;
        $archive->type = 'image';
        $archive->save();
        return response()->json([
            'success' => 'Status updated successfully',
        ]);
    }

    public function index()
    {
        $attachment = Archive::where('vendor_id', Auth::id())->get();
        return view('vendor.archive.index', compact('attachment'));
    }

    public function fileDelete(Request $request)
    {
        $attachment = Archive::destroy($request->file_id);
        return response()->json([
            'success' => 'file deleted successfully',
        ]);
    }

    
}
