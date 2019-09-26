<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewsStoreRequest;
use App\Http\Requests\ReviewsUpdateRequest;

class ReviewsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all products
        $reviews = Review::all();

        //return a view and send the variable $products with it.
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewsStoreRequest $request)
    {
        //create new Product
        $review = new Review();
        //attributes00000000
        $review->title = $request->title;
        $review->username = $request->username;
        $review->body = $request->body;
        $review->rating = $request->rating;
        //save review in Database (execute inserts)
        $review->save();

        return redirect()->route('reviews.index')->with('message', 'Review aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewsUpdateRequest $request, review $review)
    {
        //
        $review->title = $request->title;
        $review->username = $request->username;
        $review->body = $request->body;
        $review->rating = $request->rating;
        //save review in database (execute update)
        $review->save();

        return redirect()->route('reviews.index')->with('message', 'Review gewijzigd.');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function delete(Review $review)
    {
        return view('reviews.delete', compact('review'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('message', 'Review verwijderd.');
    }
}
