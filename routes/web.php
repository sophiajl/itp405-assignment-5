<?php



//
//Route::get('/tweet', function () {
//    $tweets = Tweet::with('tweet')->get();
//
//
//
//   foreach( $tweets as $tweet){
//        var_dump($tweet->id);
//        var_dump($tweet->tweet);
//        echo'<hr>';
//   }
//
//});


Route::get('/', 'TweetController@index');
Route::post('/tweets', 'TweetController@store');
Route::get('tweets/{id}/delete', 'TweetController@destroy');
Route::get('tweets/{id}', 'TweetController@viewID');

