<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;

class ForAllPageController extends Controller
{
    public function prepareDataForBusiness()
    {
        $group = Group::where('name', 'business_group')->first();
        $typeTitles = [];
        $types = $group->types;
        foreach ($types as $type) {
            $typeTitles[$type->id] = $type->typeTitles[0];
        }
        return response()->json(['types' => $types, 'typeTitles' => $typeTitles]);
    }
    public function prepareForMenu($lang)
    {
        $returnMenuBar = $this->getMenu($lang);
        $imgMenu=$this->getImageMenu();
        return response()->json(['menuBar' => $returnMenuBar,'imgMenu'=>$imgMenu]);
    }
    public function prepareForSubMenu($lang)
    {
        $returnMenuBar = $this->getSubMenu($lang);
        $imgMenu=$this->getImageMenu();
        return response()->json(['menuBar' => $returnMenuBar]);
    }
    public function prepareForAddress(Request $request)
    {


        $addressType = Type::where('name', 'address')->first();
        $address = [];
        $typeTitles = $addressType->typeTitles;
        foreach ($typeTitles as $typeTitle) {
            $address[] = $typeTitle;
        }
        return response()->json(['address' => $address]);
    }
    public function prepareForLink()
    {
        $linkType = Type::where('name', 'followus')->first();
        $link = [];
        $typeTitles = $linkType->typeTitles;
        foreach ($typeTitles as $typeTitle) {
            $link[] = $typeTitle;
        }
        return response()->json(['link' => $link]);
    }
    public function getMenu($lang)
    {
        $aboutus = Group::where('name', 'about_us')->first();
        $knowledge = Group::where('name', 'knowledge')->first();
        $business_group = Group::where('name', 'business_group')->first();
        $work_with_us = Group::where('name', 'work_with_us')->first();
        $contactus = Group::where('name', 'contactus')->first();
        $mainpage = Group::where('name', 'mainpage')->first();
        $investor = Group::where('name', 'investor')->first();


        $returnMenuBar = null;
        $groups = Group::all();
        if ($groups != null) {
            $returnMenuBar = array(
                'about_us' => $aboutus->gpTitles[0]['title_' . $lang],
                'knowledge' => $knowledge->gpTitles[0]['title_' . $lang],
                'bus_group' => $business_group->gpTitles[1]['title_' . $lang],
                'work_with_us' => $work_with_us->gpTitles[1]['title_' . $lang],
                'contactus' => $contactus->gpTitles[0]['title_' . $lang],
                'mainpage' => $mainpage->gpTitles[3]['title_' . $lang],
                'investor' => $investor->gpTitles[0]['title_' . $lang],

            );
        }

        return  $returnMenuBar;
    }
    public function getImageMenu()
    {
        $aboutus = Group::where('name', 'about_us')->first();
        $knowledge = Group::where('name', 'knowledge')->first();
        $business_group = Group::where('name', 'business_group')->first();
        $imgMenu= null;
      
            $imgMenu = array(
                'aboutus' => $aboutus->imgname,
                'knowledge' => $knowledge->imgname,
                'busgroup' => $business_group->imgname,
              

            );
      
        return  $imgMenu;
    }
    public function getSubMenu($lang)
    {
        $returnMenuBar = null;
        $network = Type::where('name', 'network')->first();
        $coreValue = Type::where('name', 'corevalue')->first();
        $vision = Type::where('name', 'vision')->first();
        $groupstructure = Type::where('name', 'groupstructure')->first();
        $orgstructure = Type::where('name', 'orgstructure')->first();
        $history = Type::where('name', 'history')->first();
        $pride = Type::where('name', 'pride')->first();
        $overview = Type::where('name', 'overview')->first();
        $manstructure = Type::where('name', 'manstructure')->first();
        ////////for Social Media///////////
        $activity = Type::where('name', 'activity')->first();
        $social = Type::where('name', 'social')->first();
        $interest = Type::where('name', 'interest')->first();




        $returnMenuBar = array(
            'network' => $network->typeTitles[0]['title_' . $lang],
            'corevalue' => $coreValue->typeTitles[0]['title_' . $lang],
            'vision' => $vision->typeTitles[0]['title_' . $lang],
            'groupstructure' => $groupstructure->typeTitles[0]['title_' . $lang],
            'orgstructure' => $orgstructure->typeTitles[0]['title_' . $lang],
            'history' => $history->typeTitles[0]['title_' . $lang],
            'pride' => $pride->typeTitles[0]['title_' . $lang],
            'overview' => $overview->typeTitles[0]['title_' . $lang],
            'manstructure' => $manstructure->typeTitles[0]['title_' . $lang],
            'activity' => $activity->typeTitles[0]['title_' . $lang],
            'social' => $social->typeTitles[0]['title_' . $lang],
            'interest' => $interest->typeTitles[0]['title_' . $lang],

        );


        return  $returnMenuBar;
    }

    public function setLang(Request $request, $lang)
    {
        //  dd($lang);
        $request->session()->put('lang', $lang);
    }
}
