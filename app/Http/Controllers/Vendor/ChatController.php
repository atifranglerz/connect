<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatFavorite;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {

        $customer = ChatFavorite::with('customer')->where([['vendor_id', Auth::id()], ['vendor_status', 0]])->orderBy('customer_online', 'DESC')->get();
        return view('vendor.chat.index', compact('customer'));
    }

    //add in fevorit and go to chat page
    public function chat($id)
    {
        if (ChatFavorite::where('vendor_id', auth()->user()->id)->where('customer_id', $id)->doesntExist()) {
            $data = new ChatFavorite();
            $data->customer_id = $id;
            $data->vendor_id = Auth::id();
            $data->save();
        }
        $chatted = ChatFavorite::where([['customer_id', $id], ['vendor_id', Auth::id()]])->first();
        $chatted->vendor_status = 0;
        $chatted->save();

        return redirect()->route('vendor.chat.index');
    }

    public function favorite(Request $request)
    {
        $id = $request->id;
        $auth_id = Auth::id();
        $message = Chat::where([['vendor_sender_id', $auth_id], ['customer_receiver_id', $request->id], ['vendor_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id], ['vendor_deleted', '=', 0]])->orderBy('created_at')->get();

        $unread = Chat::Where([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id]])->get();
        foreach ($unread as $data) {
            $data->seen = 1;
            $data->save();
        }
        $chated_user = User::find($id);
        $data = view('vendor.chat.chat')->with(['message' => $message, 'chated_user' => $chated_user, 'id' => $id])->render();
        $customer = ChatFavorite::with('customer')->where([['vendor_id', Auth::id()], ['vendor_status', 0]])->orderBy('customer_online', 'DESC')->get();
        $customer = view('vendor.chat.chatteduser')->with(['customer' => $customer])->render();

        $total_unread = Chat::where([['vendor_receiver_id', auth()->user()->id], ['seen', 0]])->count('seen');

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,
            'unread' => $total_unread,
            'customer' => $customer,

        ]);

    }

    public function store(Request $request)
    {
        // return response()->json($request);

        $id = $request->id;

        $auth_id = Auth::id();
        $chat = new Chat();
        $chat->type = "vendor";
        $chat->vendor_sender_id = $auth_id;
        $chat->customer_receiver_id = $request->id;
        $chat->body = $request->body;
        if ($request->file('attachment')) {
            $doucments = hexdec(uniqid()) . '.' . strtolower($request->file('attachment')->getClientOriginalExtension());
            $request->file('attachment')->move('public/chat/', $doucments);
            $file = 'public/chat/' . $doucments;
            $chat->attachment = $file;
            $chat->bodytype = 'file';
        }
        $chat->save();

        $date = strtotime(Carbon::now());
        $chatted = ChatFavorite::where([['customer_id', $id], ['vendor_id', $auth_id]])->first();
        $chatted->vendor_online = $date;
        $chatted->customer_online = $date;
        $chatted->customer_status = 0;
        $chatted->vendor_status = 0;
        $chatted->save();

        $message = Chat::where([['vendor_sender_id', $auth_id], ['customer_receiver_id', $request->id], ['vendor_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id], ['vendor_deleted', '=', 0]])->orderBy('created_at')->get();

        $unread = Chat::Where([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id]])->get();
        foreach ($unread as $data) {
            $data->seen = 1;
            $data->save();
        }
        $chated_user = User::find($id);
        // return response()->json($message);
        $data = view('vendor.chat.chat')->with(['message' => $message, 'chated_user' => $chated_user, 'id' => $id])->render();
        $customer = ChatFavorite::with('customer')->where([['vendor_id', Auth::id()], ['vendor_status', 0]])->orderBy('customer_online', 'DESC')->get();
        $customer = view('vendor.chat.chatteduser')->with(['customer' => $customer])->render();

        $total_unread = Chat::where([['vendor_receiver_id', auth()->user()->id], ['seen', 0]])->count('seen');

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,
            'unread' => $total_unread,
            'customer' => $customer,
            'id' => $request->id,

        ]);

    }

    public function delete(Request $request)
    {

        $auth_id = Auth::id();
        $id = $request->id;
        $msg_id = $request->msg_id;

        $message = Chat::find($msg_id);

        if ($message->customer_deleted == 1) {
            $message->delete();
        } else {
            $message->vendor_deleted = 1;
            $message->save();
        }
        $message = Chat::where([['vendor_sender_id', $auth_id], ['customer_receiver_id', $request->id], ['vendor_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id], ['vendor_deleted', '=', 0]])->orderBy('created_at')->get();

        $unread = Chat::Where([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id]])->get();
        foreach ($unread as $data) {
            $data->seen = 1;
            $data->save();
        }
        $chated_user = User::find($id);
        $data = view('vendor.chat.chat')->with(['message' => $message, 'chated_user' => $chated_user, 'id' => $id])->render();

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,
            'id' => $request->id,

        ]);
    }

    public function alldelete(Request $request)
    {

        $id = $request->id;
        $auth_id = Auth::id();

        $message = Chat::where([['vendor_sender_id', $auth_id], ['customer_receiver_id', $request->id], ['vendor_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id], ['vendor_deleted', '=', 0]])->orderBy('created_at')->get();
        // return response()->json($message);

        foreach ($message as $data) {
            if ($data->customer_deleted == 1) {
                $data->delete();
            } else {
                $data->vendor_deleted = 1;
                $data->save();
            }
        }
        $message = Chat::where([['vendor_sender_id', $auth_id], ['customer_receiver_id', $request->id], ['vendor_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id], ['vendor_deleted', '=', 0]])->orderBy('created_at')->get();

        $unread = Chat::Where([['vendor_receiver_id', $auth_id], ['customer_sender_id', $request->id]])->get();
        foreach ($unread as $data) {
            $data->seen = 1;
            $data->save();
        }

        $chated_user = User::find($id);
        $data = view('vendor.chat.chat')->with(['message' => $message, 'chated_user' => $chated_user, 'id' => $id])->render();

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,
            'id' => $request->id,

        ]);
    }

    public function chattedDelete(Request $request)
    {
        $auth_id = Auth::id();
        $customer = ChatFavorite::where([['vendor_id', $auth_id], ['customer_id', $request->id]])->first();

        if ($customer->customer_status == 1) {
            $customer->delete();
        } else {
            $customer->vendor_status = 1;
            $customer->save();
        }
        $customer = ChatFavorite::with('customer')->where([['vendor_id', Auth::id()], ['vendor_status', 0]])->orderBy('customer_online', 'DESC')->get();
        $data = view('vendor.chat.chatteduser')->with(['customer' => $customer])->render();

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,
        ]);

    }

    public function status(Request $request)
    {
        // return response()->json($request);
        $auth_id = Auth::id();

        $user = Vendor::where('id', $auth_id)->first();
        $user->online_status = Carbon::now();
        $user->save();

        $customer = ChatFavorite::with('customer')->where([['vendor_id', Auth::id()], ['vendor_status', 0]])->orderBy('customer_online', 'DESC')->get();
        $data = view('vendor.chat.chatteduser')->with(['customer' => $customer])->render();

        $total_unread = Chat::where([['vendor_receiver_id', auth()->user()->id], ['seen', 0]])->count('seen');
        return response()->json([
            'success' => 'Status updated successfully',
            'unread' => $total_unread,
            'message' => $data,

        ]);
    }

}
