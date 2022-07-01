<?php

namespace App\Http\Controllers\User;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $vendors = ChatFavorite::with('vendor')->where([['customer_id', Auth::id()], ['customer_status', 0]])->orderBy('vendor_online', 'DESC')->get();
        return view('user.chat.index', compact('vendors'));
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
        $chatted = ChatFavorite::where([['customer_id', Auth::id()], ['vendor_id', $id]])->first();
        $chatted->customer_status = 0;
        $chatted->save();
        return redirect()->route('vendor.chat.index');
    }

    public function favorite(Request $request)
    {
        $id = $request->id;
        $auth_id = Auth::id();
        $message = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id], ['customer_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $request->id], ['customer_sender_id', $auth_id], ['customer_deleted', '=', 0]])->orderBy('created_at')->get();

        $unread = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id]])->get();
        foreach ($unread as $data) {
            $data->seen = 1;
            $data->save();
        }
        $chated_user = Vendor::find($id);
        $data = view('user.chat.chat')->with(['message' => $message, 'chated_user' => $chated_user, 'id' => $id])->render();
        $vendors = ChatFavorite::with('vendor')->where([['customer_id', Auth::id()], ['customer_status', 0]])->orderBy('vendor_online', 'DESC')->get();
        $vendors = view('user.chat.chatteduser')->with(['vendors' => $vendors])->render();

        $total_unread = Chat::where([['customer_receiver_id', auth()->user()->id], ['seen', 0]])->count('seen');

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,
            'unread' => $total_unread,
            'vendors' => $vendors,

        ]);

    }

    public function store(Request $request)
    {
        // return response()->json($request);
        $id = $request->id;

        $auth_id = Auth::id();
        $chat = new Chat();
        $chat->type = "customer";
        $chat->customer_sender_id = $auth_id;
        $chat->vendor_receiver_id = $id;
        $chat->body = $request->body;

        if ($request->file('attachment')) {
            $doucments = hexdec(uniqid()) . '.' . strtolower($request->file('attachment')->getClientOriginalExtension());
            $request->file('attachment')->move('public/chat/', $doucments);
            $file = 'public/chat/' . $doucments;
            $chat->attachment = $file;
            $chat->msgtype = 'file';
        }
        else
        {
            $chat->msgtype = 'text';
        }
        $chat->save();

        $date = strtotime(Carbon::now());
        $chatted = ChatFavorite::where([['customer_id', $auth_id], ['vendor_id', $request->id]])->first();
        $chatted->customer_online = $date;
        $chatted->vendor_online = $date;
        $chatted->customer_status = 0;
        $chatted->vendor_status = 0;
        $chatted->save();

        $message = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id], ['customer_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $request->id], ['customer_sender_id', $auth_id], ['customer_deleted', '=', 0]])->orderBy('created_at')->get();

        $unread = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id]])->get();
        foreach ($unread as $data) {
            $data->seen = 1;
            $data->save();
        }

        $total_unread = Chat::where([['customer_receiver_id', auth()->user()->id], ['seen', 0]])->count('seen');

        $chated_user = Vendor::find($id);
        // return response()->json($chated_user);
        $data = view('user.chat.chat')->with(['message' => $message, 'chated_user' => $chated_user, 'id' => $id])->render();
        $vendors = ChatFavorite::with('vendor')->where([['customer_id', Auth::id()], ['customer_status', 0]])->orderBy('vendor_online', 'DESC')->get();
        $vendors = view('user.chat.chatteduser')->with(['vendors' => $vendors])->render();

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,
            'id' => $request->id,
            'vendors' => $vendors,
            'unread' => $total_unread,

        ]);

    }

    public function delete(Request $request)
    {

        $auth_id = Auth::id();
        $id = $request->id;
        $msg_id = $request->msg_id;

        $message = Chat::find($msg_id);
        if ($message->vendor_deleted == 1) {
            $message->delete();
        } else {
            $message->customer_deleted = 1;
            $message->save();
        }

        $message = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id], ['customer_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $request->id], ['customer_sender_id', $auth_id], ['customer_deleted', '=', 0]])->orderBy('created_at')->get();

        $unread = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id]])->get();
        foreach ($unread as $data) {
            $data->seen = 1;
            $data->save();
        }

        $chated_user = Vendor::find($id);
        $data = view('user.chat.chat')->with(['message' => $message, 'chated_user' => $chated_user, 'id' => $id])->render();

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

        $message = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id], ['customer_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $request->id], ['customer_sender_id', $auth_id], ['customer_deleted', '=', 0]])->get();
        // return response()->json($message);

        foreach ($message as $data) {
            if ($data->vendor_deleted == 1) {
                $data->delete();
            } else {
                $data->customer_deleted = 1;
                $data->save();
            }
        }
        $message = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id], ['customer_deleted', '=', 0]])
            ->orWhere([['vendor_receiver_id', $request->id], ['customer_sender_id', $auth_id], ['customer_deleted', '=', 0]])->orderBy('created_at')->get();

        $unread = Chat::where([['vendor_sender_id', $request->id], ['customer_receiver_id', $auth_id]])->get();
        foreach ($unread as $data) {
            $data->seen = 1;
            $data->save();
        }

        $chated_user = Vendor::find($id);
        $data = view('user.chat.chat')->with(['message' => $message, 'chated_user' => $chated_user, 'id' => $id])->render();

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,
            'id' => $request->id,

        ]);
    }

    public function chattedDelete(Request $request)
    {
        // return response()->json($request);
        $auth_id = Auth::id();
        $vendor = ChatFavorite::where([['customer_id', $auth_id], ['vendor_id', $request->id]])->first();

        if ($vendor->vendor_status == 1) {
            $vendor->delete();
        } else {
            $vendor->customer_status = 1;
            $vendor->save();
        }

        $vendors = ChatFavorite::with('vendor')->where([['customer_id', Auth::id()], ['customer_status', 0]])->orderBy('vendor_online', 'DESC')->get();
        $data = view('user.chat.chatteduser')->with(['vendors' => $vendors])->render();

        return response()->json([
            'success' => 'Status updated successfully',
            'message' => $data,

        ]);
    }

    public function status(Request $request)
    {
        // return response()->json($request);
        $auth_id = Auth::id();

        $user = User::where('id', $auth_id)->first();
        $user->online_status = Carbon::now();
        $user->save();

        $vendors = ChatFavorite::with('vendor')->where([['customer_id', Auth::id()], ['customer_status', 0]])->orderBy('vendor_online', 'DESC')->get();
        $data = view('user.chat.chatteduser')->with(['vendors' => $vendors])->render();

        $total_unread = Chat::where([['customer_receiver_id', auth()->user()->id], ['seen', 0]])->count('seen');
        return response()->json([
            'success' => 'Status updated successfully',
            'unread' => $total_unread,
            'message' => $data,

        ]);
    }

}
