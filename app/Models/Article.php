<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'publish_date',
        'desc_ar',
        'desc_en',
        'image',
        'type',
    ];

    protected $dates = [
        'publish_date',
    ];

    public function getTitleAttribute()
    {
        return $this->{'title_' . app()->getLocale()};
    }

    public function getDescAttribute()
    {
        return $this->{'desc_' . app()->getLocale()};
    }

    public function getDateAttribute($date)
    {

        $dateFromat = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['publish_date']);

        // Get the current app locale
        $locale = app()->getLocale();

        // Tell Carbon to use the current app locale
        Carbon::setlocale($locale);

        /**
         * Set the date format you'd like to use.
         * Here, I use two different formats depending on current app locale.
         *
         * For Example: `D, M j, Y H:i:s` outputs `mer., oct. 21, 2020 15:11:07`,
         *  and `D, M j, Y g:i A` outputs `mer., oct. 21, 2020 3:26 PM`
         * If you have a look at the below function 👇🏻 in the Carbon source code,
         * you'll see it uses the first format mentioned above.
         *
         * @see \Carbon\Traits\Converter::toDayDateTimeString()
         */
        $format = $locale === 'ar' ? 'd M Y | h:i A' : 'd M Y | h:i A';

        // Use `translatedFormat()` to get a translated date string
        return $dateFromat->translatedFormat($format);
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}
