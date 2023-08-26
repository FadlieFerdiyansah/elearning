<?php

use Carbon\Carbon;

function hariIndo()
{
    $today = date('l');
    if ($today == 'Sunday') {
        $day = 'Minggu';
    } elseif ($today == 'Monday') {
        $day = 'Senin';
    } elseif ($today == 'Tuesday') {
        $day = 'Selasa';
    } elseif ($today == 'Wednesday') {
        $day = 'Rabu';
    } elseif ($today == 'Thursday') {
        $day = 'Kamis';
    } elseif ($today == 'Friday') {
        $day = 'Jum\'at';
    } else {
        $day = 'Sabtu';
    }

    return $day;
}

function waktuSekarang()
{
    $manadoTime = Carbon::now('Asia/Jakarta');
    $utcPlus8Time = $manadoTime->copy()->addHour();
    return $utcPlus8Time->format('Y-m-d H:i');
}

function formatedWaktuSekarang()
{
    $time = Carbon::createFromFormat('Y-m-d H:i', waktuSekarang());
    return $time->format('H:i');
}
