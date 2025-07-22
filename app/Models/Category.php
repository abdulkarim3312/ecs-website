<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notice;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];
    public function en_title()
    {
        return CategoryTranslation::where('category_id', $this->id)
            ->where('locale', 'en')->first()->title;
    }

    public function bn_title()
    {
        return CategoryTranslation::where('category_id', $this->id)
            ->where('locale', 'bn')->first()->title;
    }

    public function en_description()
    {
        return CategoryTranslation::where('category_id', $this->id)
            ->where('locale', 'en')->first()->description;
    }

    public function bn_description()
    {
        return CategoryTranslation::where('category_id', $this->id)
            ->where('locale', 'bn')->first()->description;
    }

    public function notices()
    {
        return $this->hasMany(Notice::class, 'category_id')->orderBy('created_at', 'DESC');
    }

    public static function publications()
    {
    	$category = Category::where('slug', 'publications')->first();
    	if ($category){
		    return Notice::latest()->where('category_id', $category->id)->paginate(10);
	    }
    }

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
}
