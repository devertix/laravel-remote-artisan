<?php

Route::post('api/command/run', [\Devertix\LaravelRemoteArtisan\Http\Controllers\CommandController::class, 'run'])
    ->middleware(\Devertix\LaravelRemoteArtisan\Http\Middlewares\TokenAuth::class);
