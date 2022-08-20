<?php

use App\Models\Competition;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('participants.home');
});

Route::get('/Speech', function(Competition $competition){
    return view('participants.competition',[
        // "ID" => "$competition->ID",
        // "title" => "Competition",
        // "competition_name" => "$competition->name",
        // "about" => $competition->about,
        // "person" => $competition->person,
        // "early_price" => $competition->early_price,
        // "normal_price" => $competition->normal_price,
        // "general_rules" => $competition->general_rules,
        // "technical_rules" => $competition->technical_rules,

        "ID" => "1",
        "title" => "Competition",
        "competition_name" => "Speech",
        "about" => "adaadcascsacadc",
        "person" => "1*team",
        "early_price" => "IDR 145.000",
        "normal_price" => "IDR 150.000",
        "general_rules" => '<ul class="list-group list-group-numbered p-4">
                                <li class="list-group-item border-0">
                                The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                                </li>
                                <li class="list-group-item border-0">
                                The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                                </li>
                                <li class="list-group-item border-0">
                                The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                                </li>
                                </li>
                                <li class="list-group-item border-0">
                                The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                                </li>
                            </ul>',
        "technical_rules" => '<ul class="list-group list-group-numbered p-4">
                                <li class="list-group-item border-0">
                                The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                                </li>
                                <li class="list-group-item border-0">
                                The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                                </li>
                                <li class="list-group-item border-0">
                                The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                                </li>
                                <li class="list-group-item border-0">
                                The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                                </li>
                            </ul>',
    ]);
});


Route::get('/{competition:name}/Registration/', function(Competition $competition){
    return view('participants.registration',[
        "title" => "Registration | $competition->name",
        "competition_name" => "$competition->name",
        "person" => $competition->person,
        "price" => $competition->price,
    ]);
});
