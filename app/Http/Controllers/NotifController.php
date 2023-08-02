<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function index()
    {
        return view('notif', [
            'title' => 'FCM Notif'
        ]);
    }

    public function send(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $apiKey = "AAAAfqsnaJI:APA91bEIu5nx0JGOVD76MIfVKyB16Lbmy7BW8eSOjWxN0aBrNQZQqx32X-x3Z1Yk1-ifj-pWzjPncNH3A_7YoXM4qpYB6rdr8trW4l6PXAPhfXvJAqrMomoor3jGKg6hEbtHymb4fgIz";

        $headers = array(
            'Authorization:key=' . $apiKey,
            'Content-Type:application/json'
        );

        $notifData = [
            'title' => $request->title,
            'body' => $request->text
        ];

        $apiBody = [
            'to' => '/topics/Notif',
            'notification' => $notifData
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));

        $result = curl_exec($ch);
        curl_close($ch);

        return redirect('/fcm')->with('success', 'Notifikasi Berhasil Terkirim.');
    }
}
