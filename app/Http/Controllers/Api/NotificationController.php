<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class NotificationController extends Controller
{
    public function getSettings(Request $request)
    {
        $settings = $request->user()->notification_settings;

        return response()->json($settings);
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'common.general_notification' => 'required|boolean',
            'common.sound' => 'required|boolean',
            'common.vibrate' => 'required|boolean',
            'languages.arabic' => 'required|boolean',
            'languages.english' => 'required|boolean',
        ]);

        $user = $request->user();
        $user->notification_settings = $request->all();
        $user->save();

        return response()->json(['message' => 'Notifications settings updated successfully']);
    }
}
