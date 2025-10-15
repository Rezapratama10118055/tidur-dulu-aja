<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = [
            "Tidur dulu aja, besok kamu bakal lebih tenang 🌙",
            "Yang pergi belum tentu bahagia, jadi jangan iri 💫",
            "Kamu capek, bukan lemah. Istirahat ya 🤍",
            "Nggak semua yang hilang perlu dicari lagi 🌧",
            "Kalau sedihnya kambuh, rebahan aja dulu ☁️",
            "Percaya deh, kamu bakal baik-baik aja 🌷",
            "Besok matahari terbit lagi, kayak semangatmu nanti ☀️",
        ];

        $random = $messages[array_rand($messages)];

        return view('welcome', ['message' => $random]);
    }
}

