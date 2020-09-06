<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name','cat_id','description'];
  
    /**
     * Set the categories
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['cat'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['cat'] = json_decode($value);
    }

    public function cat()
    {
        return $this->belongsTo('App\Cat', 'cat_id', 'id');
    }
}
