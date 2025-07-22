<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = 'archives';
    protected $guarded = [];

    public function en_title()
    {
        return ArchiveTranslation::where('archive_id', $this->id)
            ->where('locale', 'en')->first()->title;
    }

    public function bn_title()
    {
        return ArchiveTranslation::where('archive_id', $this->id)
            ->where('locale', 'bn')->first()->title;
    }

    public function en_description()
    {
        return ArchiveTranslation::where('archive_id', $this->id)
            ->where('locale', 'en')->first()->description;
    }

    public function bn_description()
    {
        return ArchiveTranslation::where('archive_id', $this->id)
            ->where('locale', 'bn')->first()->description;
    }

    public function translations()
    {
        return $this->hasMany(ArchiveTranslation::class);
    }
}
