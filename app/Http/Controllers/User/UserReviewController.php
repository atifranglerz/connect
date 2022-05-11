<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserReview;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review_prev = UserReview::where('user_id',auth()->id())->where('garage_id',$request->garage_id)->first();
        if($review_prev){

            $review_prev->user_id = auth()->id();
            $review_prev->rating = $request->rating;
            $review_prev->review = $request->review;
            $review_prev->garage_id  = $request->garage_id;
            $review_prev->save();
            return $this->message($review_prev, 'user.order.index', 'Thanks for submit your review', 'Failed to submit review');
        }else{
            $review = new UserReview();
            $review->user_id = auth()->id();
            $review->rating = $request->rating;
            $review->review = $request->review;
            $review->garage_id  = $request->garage_id;
            $review->save();
            return $this->message($review, 'user.order.index', 'Thanks for submit your review', 'Failed to submit review');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function show(UserReview $userReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function edit(UserReview $userReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserReview $userReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserReview $userReview)
    {
        //
    }
}
