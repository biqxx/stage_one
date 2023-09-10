<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function (Request $request)
{
    $data = [];
    $data['slack_name'] = $request->query('slack_name');
    $data['current_day'] = Carbon::now()->format('l');
    $data['utc_time'] = Carbon::now()->utc();
    $data['track'] = $request->query('track');
    $data['github_file_url'] = null;
    $data['github_repo_url'] = 'https://github.com/biqxx/stage_one.git';
    $data['status_code'] = 200;
    return response()->json($data, 200);
});
