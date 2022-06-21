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
    public static function getIndexCategories(?bool $withChildren = false)
    {
        $categories = SubjectCategory::query()
            ->where('parent', '=', 0)
            ->where('status', '=', 1);

        if($withChildren) $categories->with(['children' => function ($query) {
            $query->where('status', '=', 1);
        }]);

        return $categories->get()->all();
    }

    public function getSubCategories()
    {
        //return $this->children()->get()->where('status', '=', 1)->all();
        //return $this->with('children')->get()->where('status', '=', 1)->all();
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent');
    }
}
