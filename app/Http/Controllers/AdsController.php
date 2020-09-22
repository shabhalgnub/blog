<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests\AdRequest;
use App\Repositories\ {
    Ads\AdInterface,
    Favorites\FavoriteInterface
};
use App\Models\Country;
use App\Models\Currency;

class AdsController extends Controller
{
    protected $ads;

    protected $favorite;

    public function __construct(AdInterface $ad, FavoriteInterface $favorite)
    {
        $this->middleware('auth',['only'=>['create','store','edit','userAds']]);

        $this->ads=$ad;

        $this->favorite=$favorite;
    }

    public function all()
    {
        $ads=$this->ads->all();
    }

    public function create()
    {
        
        $countries = Country::all();
        return view('ads.create', ['countries' => $countries]);
        

        $currencies = Currency::all();
        return view('ads.create', ['currencies' => $currencies]); 
         
    }

    public function store(AdRequest $request)
    {
        $this->ads->store($request);

        return back()->with('success','تم إضافة الإعلان بنجاح');
    }

    public function edit($id)
    {
        $ad=$this->ads->getById($id);

        if(\Gate::allows('edit-ad', $ad)) {
        return view('ads.edit',compact('ad'));
        }

        abort(403);
    }

    public function update(Request $request, $id)
    {
        $this->ads->update($request,$id);

        return back()->with('success','تم تعديل الاعلان بنجاح');
    }

    public function getUserAds()
    {
        $ads=$this->ads->getByUser();

        return view('ads.userAds',compact('ads'));
    }

    public function destroy($id)
    {
        $this->ads->delete($id);

        return back()->with('success','تم حذف الاعلان بنجاح');
    }

    public function getByCategory($id)
    {
        $ads=$this->ads->getByCategory($id);
        return view('ads.adsByCategory',compact('ads'));
    }
    public function show($id)
    {
        $ad = $this->ads->getDetails($id);
        $favorited = "";
        if(\Auth::check())
            $favorited = $this->favorite->show($id);
        return view('ads.show',compact('ad'),compact('favorited'));
    }

    public function search(Request $request)
    {
        $ads=$this->ads->search($request);
        return view('ads.search',compact('ads'));
    }

    public function getCommonAds()
    {
        $ads=$this->ads->getCommonAds();

        return view('index',compact('ads'));
    }
}