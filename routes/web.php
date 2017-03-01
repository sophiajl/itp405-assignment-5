<?php

use App\Tweet;


Route::get('/tweet', function () {
    $tweets = Tweet::with('tweet')->get();



   foreach( $tweets as $tweet){
        var_dump($tweet->id);
        var_dump($tweet->tweet);
        echo'<hr>';
   }

});

Route::get('tweets/{id}/delete',function() {
    $tweet = Tweet::find();
    $tweet->delete();
    return $tweet;
});

Route::get('/', 'TweetController@index');
Route::post('/tweets', 'TweetController@store');
//Route::get('tweets/{id}/delete', 'TweetController@destroy');
Route::get('tweets/{id}', 'TweetController@viewID');

