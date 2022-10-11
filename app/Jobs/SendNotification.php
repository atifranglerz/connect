<?php

namespace App\Jobs;

use Mail;
use App\Models\Garage;
use App\Models\Vendor;
use App\Models\UserWishlist;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
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
            if ($this->message['qoute_range'] == '5') {
                $garage = Garage::with('vendor')->orderBy('rating', 'desc')->limit(5)->get();
            } elseif ($this->message['qoute_range'] == '10') {
                $garage = Garage::with('vendor')->orderBy('rating', 'desc')->limit(10)->get();
            }else{
                $garage = Garage::with('vendor')->get();
            }
            foreach ($garage as $data) {
                $email = new \App\Mail\SendNotification($this->message);
                Mail::to($data->vendor->email)->send($email);
            }
        }

        if ($this->message['type'] == "preferred_garage") {

            $id = $this->message['auth'];
            $garageIds = [];
            $data = UserWishlist::where('user_id', $id)->with('garage')->get();
            foreach ($data as $list_item) {
                array_push($garageIds, $list_item->garage->id);
            }
            if ($this->message['qoute_range'] == '5') {
                $garage = Garage::with('vendor')->whereIn('id', $garageIds)->orderBy('rating', 'desc')->limit(1)->get();
            } elseif ($this->message['qoute_range'] == '10') {

                $garage = Garage::with('vendor')->whereIn('id', $garageIds)->orderBy('rating', 'desc')->limit(10)->get();
            } else {
                $garage = Garage::with('vendor')->whereIn('id', $garageIds)->get();
            }
            foreach ($garage as $data) {

                $email = new \App\Mail\SendNotification($this->message);
                Mail::to($data->vendor->email)->send($email);

            }
        }
    }
}
