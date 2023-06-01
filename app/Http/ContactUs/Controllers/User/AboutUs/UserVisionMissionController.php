<?php

namespace App\Http\Controllers\User\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class UserVisionMissionController extends Controller
{
    public function index()
    {
        $typeVision = Type::where('name', 'vision')->first();
        $typeMission = Type::where('name', 'mission')->first();
        return view('user.aboutus.vision', compact(['typeVision', 'typeMission']));
    }
    public function historyIndex()
    {
        $typeHistory = Type::where('name', 'history')->first();
        return view('user.aboutus.history', compact('typeHistory'));
    }
    public function awardIndex()
    {
        $typeAward = Type::where('name', 'pride')->first();
        return view('user.aboutus.awards', compact('typeAward'));
    }
    public function groupStructureIndex()
    {
        $typeGpStructure = Type::where('name', 'groupstructure')->first();
        $typeDiagram = Type::where('name', 'diagram')->first();
        return view('user.aboutus.business-structure', compact(['typeGpStructure', 'typeDiagram']));
    }
    public function orgStructureIndex()
    {
        $typeOrgStructure = Type::where('name', 'orgstructure')->first();
        return view('user.aboutus.organizational-structure', compact('typeOrgStructure'));
    }
    public function networkIndex()
    {
        $type = Type::where('name', 'network')->first();
        return view('user.aboutus.network', compact('type'));
    }
}
