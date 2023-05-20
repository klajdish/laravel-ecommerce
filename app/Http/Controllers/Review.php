<?php

namespace App\Http\Controllers;

use App\Models\Review as ReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class Review extends Controller
{
    public function addReview(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|min:5|max:150',
        ]);

        $review = new ReviewModel($validatedData);
        $review->product_id = $request->product_id;
        $review->user_id = Session::get('loginId');
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    public function editReview(Request $request)
    {
        $review = ReviewModel::where('id',$request->review_id)->first();

        if(
            $request->comment == $review->comment &&
            $request->rating == $review->rating
        )
        {
            return back()->with('success', 'Nothing changed!');
        }

        $validatedData =   $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|min:5|max:150',
        ]);

        $result = $review->update($validatedData);

        if($result) {
            return redirect()->back()->with('success', 'You have updated a review successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $review = ReviewModel::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully');
    }
}
