<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices';
    protected $guarded = [];

    public function en_title()
    {
        return optional($this->translations->firstWhere('locale', 'en'))->title;
    }

    public function bn_title()
    {
        return optional($this->translations->firstWhere('locale', 'bn'))->title;
    }

    public function en_description()
    {
        return optional($this->translations->firstWhere('locale', 'en'))->description;
    }

    public function bn_description()
    {
        return optional($this->translations->firstWhere('locale', 'bn'))->description;
    }

    public function translations()
    {
        return $this->hasMany(NoticeTranslation::class, 'notice_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'published_by', 'id');
    }
}
