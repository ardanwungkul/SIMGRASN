<?php

namespace App\Helpers;

use Carbon\Carbon;

class FormatHelper
{
    /**
     * Ubah format periode (YYYYMM) menjadi "NamaBulan Tahun"
     *
     * @param  string  $periode
     * @return string|null
     */
    public static function formatThnBln(?string $periode): ?string
    {
        if (!$periode || strlen($periode) !== 6) {
            return null;
        }

        try {
            $date = Carbon::createFromFormat('Ym', $periode);
            Carbon::setLocale('id');
            setlocale(LC_TIME, 'id_ID.UTF-8');

            return $date->translatedFormat('F Y');
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function getTahun(?string $periode): ?string
    {
        if (!$periode || strlen($periode) !== 6) {
            return null;
        }

        try {
            $date = substr($periode, 0, 4);

            return $date;
        } catch (\Exception $e) {
            return null;
        }
    }
    public static function getBulan(?string $periode): ?string
    {
        if (!$periode || strlen($periode) !== 6) {
            return null;
        }

        try {
            $date = substr($periode, 4, 2);

            return $date;
        } catch (\Exception $e) {
            return null;
        }
    }
}
