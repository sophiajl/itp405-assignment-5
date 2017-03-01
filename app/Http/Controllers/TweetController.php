<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TweetController extends Controller
{
    public function viewID($tweetID)
    {
        $tweets = DB::table('tweets')
            ->select('id', 'tweet')
            ->where('id', '=', $tweetID)
            ->get();

        return view('tweets.viewID', [
            'tweets' => $tweets
        ]);

    }

    public function destroy($tweetID)
    {
        DB::table('tweets')
            ->where('id', '=', $tweetID)
            ->delete();
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
                ->withErrors($validation);
        }


    }

    public function index()
    {
        $tweets = DB::table('tweets')
            ->select('id', 'tweet')
            ->orderBy('id', 'desc')
            ->get();


        return view('tweets.index', [
            'tweets' => $tweets
        ]);
    }
}
