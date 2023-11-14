<?php

namespace Devertix\LaravelRemoteArtisan\Http\Controllers;

use Illuminate\Routing\Controller;
use Devertix\LaravelRemoteArtisan\Http\Requests\CommandRunRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Output\ConsoleOutput;

class CommandController extends Controller
{
    public function run(CommandRunRequest $request)
    {
        $token = $request->header('Token', null);
        if (config('laravel-remote-artisan.enable')) {
            $command = $request->input('command');
            $params = $request->input('params', []);
            \Artisan::call($command, $params);
            return response()->json(['output' => \Artisan::output(), 'config' => Config::all()]);
        }
        return response()->json([], Response::HTTP_FORBIDDEN);
    }
}
