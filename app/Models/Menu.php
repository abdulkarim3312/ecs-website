<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $guarded = [];

    public function parent() {

        return $this->hasOne(Menu::class, 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany(Menu::class, 'parent_id', 'id');

    }

    public static function mainNavigation() {
        //Position: 2 = Navigation
        return static::with(implode('.', array_fill(0, 3, 'children')))
	        ->where('is_active', 1)
            ->where('position', 2)
            ->where('parent_id', '=', NULL)->get();

    }

    public static function TopNavigation() {
        //Position: 2 = Navigation
        return static::with(implode('.', array_fill(0, 3, 'children')))
	        ->where('is_active', 1)
            ->where('position', 1)
            ->where('parent_id', '=', NULL)->get();

    }

    public static function AboutNavigation() {
        //Position: 5 = About
        return static::with(implode('.', array_fill(0, 3, 'children')))
	        ->where('is_active', 1)
            ->where('position', 5)
            ->where('parent_id', '=', NULL)->get();

    }

    public static function FooterNavigation() {
        //Position: 4 = Footer
        return static::with(implode('.', array_fill(0, 3, 'children')))
	        ->where('is_active', 1)
            ->where('position', 4)
            ->where('parent_id', '=', NULL)->get();

    }


    public function ec_slug()
    {
        if( !empty($this->custom_link) ):
            return $this->custom_link;
        endif;

        if( !empty($this->page_id) ):
            $page_slug = 'page/'.Page::find($this->page_id)->slug;
            return $page_slug;
        elseif(!empty($this->category_id)):
            $cat_slug = 'category/'.Category::find($this->category_id)->slug;
            return $cat_slug;
        else:
            return '#';
        endif;
    }

    public function page_name()
    {
        if( !empty($this->custom_link) )
            return $this->custom_link;

        if( !empty($this->page_id) )
            return Page::find($this->page_id)->title;
        else
            return '#';
    }

    public function menu_parent()
    {
        if( $this->parent_id != null )
            return MenuTranslation::where('menu_id', $this->parent_id)->where('locale', 'en')->first()->title;
        else
            return 'No';
    }

    public function title()
    {
        return $this->hasMany(MenuTranslation::class);
    }

    public function bn_title()
    {
        return optional(MenuTranslation::where('menu_id', $this->id)
            ->where('locale', 'bn')
            ->first())->title ?? '';
    }

    public function en_title()
    {
        return optional(
            MenuTranslation::where('menu_id', $this->id)
                ->where('locale', 'en')
                ->first()
        )->title ?? '';
    }

}
