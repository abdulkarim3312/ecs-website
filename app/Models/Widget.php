<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $table = 'widgets';
    protected $guarded = [];
    public function en_title()
    {
        return optional(
            WidgetTranslation::where('widget_id', $this->id)->where('locale', 'en')->first()
        )->title ?? '';
    }

    public function bn_title()
    {
        return optional(
            WidgetTranslation::where('widget_id', $this->id)->where('locale', 'bn')->first()
        )->title ?? '';
    }

    public function en_description()
    {
        return optional(
            WidgetTranslation::where('widget_id', $this->id)->where('locale', 'en')->first()
        )->description ?? '';
    }

    public function bn_description()
    {
        return optional(
            WidgetTranslation::where('widget_id', $this->id)->where('locale', 'bn')->first()
        )->description ?? '';
    }

    public function translations()
    {
        return $this->hasMany(WidgetTranslation::class);
    }

}
