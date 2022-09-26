<?php

namespace App\Jobs;

use Mail;
use App\Models\Garage;
use App\Models\Vendor;
use App\Models\UserWishlist;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $message;
    public function __construct($message)
    {
        //
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->message['type'] == "all_garage") {
            $data = Vendor::all();
            foreach ($data as $content) {
                $email = new \App\Mail\SendNotification($this->message);
                Mail::to($content->email)->send($email);
            }
        }
        if ($this->message['type'] == "preferred_garage") {
            $data = UserWishlist::where('user_id', auth()->user()->id)->with('garage')->get();
            foreach ($data as $list_item) {
                
                $garage = Garage::with('vendor')->find($list_item->garage->id);

                $email = new \App\Mail\SendNotification($this->message);
                Mail::to($garage->vendor->email)->send($email);

            }
        }
    }
}
