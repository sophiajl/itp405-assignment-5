<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Tweet;

class TweetController extends Controller
{
    public function viewID($tweetID)
    {
        return Tweet::find($tweetID);
//        $tweets = Tweet::with("$tweetID")->get();
//   // $tweets = Tweet::find($tweetID);
//        $tweets = DB::table('tweets')
//            ->select('id', 'tweet')
//            ->where('id', '=', $tweetID)
//            ->get();


//
//        return view('tweets.viewID', [
//            'tweets' => $tweets
//        ]);

    }

    public function destroy($tweetID)
    {

    $tweet = Tweet::find($tweetID);
    $tweet->delete();

//        DB::table('tweets')
//            ->where('id', '=', $tweetID)
//            ->delete();
        return redirect('/')
            ->with('successStatus', 'Tweet successfully deleted!');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all()
        /*[
            'tweet' => request('tweet'),
        ]*/, [
            'tweet' => 'required|max:140',
        ]);

        if($validation->passes())
        {
            DB::table('tweets')->insert([
                'tweet'=> request('tweet'),
//            'id' => request('tweet'),
            ]);

            return redirect('/')

                ->with('successStatus', 'Tweet successfully created!');
        } else{

            return redirect('/')
                ->withInput()
                ->withErrors($validation);
        }


    }

    public function index()
    {
        $tweets = Tweet::orderBy('tweet')->get();
//
   //     $tweets = DB::table('tweets')
//            ->select('id', 'tweet')
//            ->orderBy('id', 'desc')
//            ->get();


        return view('tweets.index', [
            'tweets' => $tweets
        ]);
    }
}
