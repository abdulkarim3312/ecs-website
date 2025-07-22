<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $guarded = [];

    public function menu_name()
    {
        $menus = Menu::where('page_id', $this->id)->get();
        return $menus;
    }

    public function en_title()
    {
        return PageTranslation::where('page_id', $this->id)
            ->where('locale', 'en')->first()->title;
    }
    public function bn_title()
    {
        return PageTranslation::where('page_id', $this->id)
            ->where('locale', 'bn')->first()->title;
    }
    public function en_description()
    {
        return PageTranslation::where('page_id', $this->id)
            ->where('locale', 'en')->first()->description;
    }
    public function bn_description()
    {
        return PageTranslation::where('page_id', $this->id)
            ->where('locale', 'bn')->first()->description;
    }
    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }
}
