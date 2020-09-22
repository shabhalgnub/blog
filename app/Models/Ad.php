<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Helpers\helper as Helper;

class Ad extends Model
{
    protected $guarded=['id'];
    protected $fillable= ['title','slug','text','price','user_id','category_id','country_id','currency_id'];

    public function setSlugAttribute($value)
    {
        $sulg = Helper::slug($value);

        $uniqueslug = Helper::uniqueSlug($sulg,'ads');

        $this->attributes['slug'] =$uniqueslug;
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function scopeFilter($query,Request $request)
    {
        if($request->country){
            $query->whereCountry_id($request->country);
        }

        if($request->category){
            $query->whereCategory_id($request->category);
        }
        
        if($request->keyword){
            $query->where('title','LIKE','%'.$request->keyword.'%');
        }

        return $query->with('images')->get();
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments')->where('parent_id', null);
    }
}
