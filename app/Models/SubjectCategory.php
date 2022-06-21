<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubjectCategory extends Model
{
    use HasFactory;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['name_url'] = Str::slug($value);
    }

    /**
     * Returns array of main categories (parent = 0)
     *
     * @return array|Model[]
     */
    public static function getIndexCategories()
    {
        $categories = SubjectCategory::all()->where('parent', '=', 0)->all();

        return $categories;
    }

    public function getSubCategories()
    {
        return $this->children()->get()->where('status', '=', 1)->all();
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent');
    }
}
