<?php

namespace App\Http\Controllers\User;

use App\Models\Chat;
use App\Models\Archive;
use App\Mail\AboutOrder;
use App\Models\VendorBid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ArchiveController extends Controller
{
    public function fileDownload(Request $request)
    {
        $id = explode('file',$request->msg_id);
        $messasge = Chat::with('vendor', 'customer')->find($id);
        $messasge[0]->customer_file_status = '1';
        $messasge[0]->save();

        $archive = new Archive();
        $archive->customer_id = Auth::id();
        if ($messasge[0]->vendor_sender_id == null) {
            $archive->sender_name = $messasge[0]->customer->name;
        } else {
            $archive->sender_name = $messasge[0]->vendor->name;
        }
        $archive->file = $messasge[0]->attachment;
        $archive->type = 'image';
        $archive->file_name = $request->file_name;
        $archive->save();
        return response()->json([
            'success' => 'Status updated successfully',
        ]);

    }

    public function index()
    {
        $attachment = Archive::where('customer_id', Auth::id())->get();
        return view('user.archive.index', compact('attachment'));
    }

    public function fileDelete(Request $request)
    {
        $attachment = Archive::destroy($request->file_id);
        return response()->json([
            'success' => 'file deleted successfully',
        ]);
    }


    public function order()
    {

        $message['title'] = "Order Placement Completion";
        $message['order_no'] = 456464;
        $message['order_id'] = 5;
        $message['body1'] = "Your ";
        $message['body2'] = "has been successfully placed. Your selected garage/ service provider will be starting the work soon. To stay updated on the status of your order please sign in to your account or stay tuned as we will communicate to you once the job is completed.";
        $message['link1'] = url('user/order/summary', 5);
        $message['type'] = "order";
        $message['invoice'] = "quote";
        $message['paid'] = 136;
        $message['email'] = auth()->user()->email;
        
        $message[1] = VendorBid::with('vendordetail', 'part')->find(65);

        Mail::to('amirshehzad16752@gmail.com')->send(new AboutOrder($message));
        return 'successfully';
    }


    
}
