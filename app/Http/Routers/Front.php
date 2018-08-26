<?php

Route::namespace('Front')->name('front.')->group(function () {
    Route::middleware('guest')->group(function() {
        Route::get('/', 'PagesController@welcome');

        Route::prefix('voting')->name('voting.')->group(function() {
            Route::get('identity', 'VotesController@showIdentityForm')->name('identity');
            Route::post('identity', 'VotesController@identify');
            Route::get('{election}/{user}', 'VotesController@showVoteForm')->name('vote');
            Route::post('{election}/{user}', 'VotesController@vote');
        });
    });
});