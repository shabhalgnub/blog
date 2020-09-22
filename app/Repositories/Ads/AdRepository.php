<?php
namespace App\Repositories\Ads;

use App\Traits\ImageUploadTrait;
use App\Helpers\helper;
use App\Models\ {
    Ad,
    Favorite,
    Image
};

class AdRepository implements AdInterface
{
    use ImageUploadTrait;

    protected $ads;

    public function __construct(Ad $ads)
    {
        $this->ads=$ads;
    }

    public function all()
    {
        $ads = \Cache::remember('ads','1440', function() {
            return $this->ads::with('images')->select('id','title','slug','price')->whereIn('id',
                Favorite::select('ad_id')
                    ->groupBy('ad_id')
                    ->orderByRaw('COUNT(*) DESC')
                    ->limit(8)->get()
                )->get();
       });

        return $ads;
    }

    public function store($request)
    {
        $slug=helper::slug($request->title);

        $uniqueslug=helper::uniqueSlug($slug, 'ads');

        $ad=$request->user()->ads()->create($request->all()+['slug'=>$request->title]);

        if($request->file('images'))
            $this->storeImages($ad,$request->file('images'));
    }

    public function storeImages($ad,$imgArry)
    {
        foreach($imgArry as $img)
        {

            $image_name = $this->saveImages($img);

           $image = new Image();
           $image->image = $image_name;
           $ad->images()->save($image);
        }
    }

    public function getDetails($id)
    {
        return $this->ads::with(['comments'=>function($query){
            $query->with(['user:id,name']);
        }])->find($id);
    }

    public function getById($id)
    {
        return $this->ads::find($id);
    }

    public function update($request, $id)
    {
        return $this->ads->find($id)->update($request->all());
    }

    public function getByUser()
    {
        return $this->ads::select('id','title','price','slug','created_at')->whereUser_id(\Auth::user()->id)->get();
    }

    public function getByCategory($catId)
    {
        return $this->ads::with('images')->where('category_id',$catId)->get();
    }

    public function delete($id)
    {
            $this->ads->findOrFail($id)->delete();
    }

    public function search($request)
    {
        return $this->ads->Filter($request);
    }

    public function getCommonAds()
    {
        return $this->ads::with('images')->select('id','title','slug','price')->whereIn('id',
                Favorite::select('ad_id')
                ->groupBy('ad_id')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(8)
                ->get()
            )->get();
    }
}