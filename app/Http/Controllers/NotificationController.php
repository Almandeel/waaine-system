<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // $user = $request->user();
        $query = auth()->user()->unreadNotifications();

        $notifications = $query->get()->each(function ($n) {
            $n->created = $n->created_at->toIso8601String();
        });

        $total = $notifications->count();

        return response()->json(compact('notifications', 'total'));
    }
}
