<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class UserOverViewController extends Controller
{
   public function indexOverView(){
      $typeVision = Type::where('name','vision')->first();
      $typeAward = Type::where('name','pride')->first();
      $typeNetwork = Type::where('name','network')->first();
      $typeGpStructure = Type::where('name','groupstructure')->first();
      $typeOrgStructure = Type::where('name','orgstructure')->first();
      $typeCoreValue = Type::where('name','corevalue')->first();
      $typeHistory = Type::where('name','history')->first();
      $typeOverView=Type::where('name','overview')->first();
      return view(
          'user.aboutus.overview',
          compact(['typeHistory', 'typeCoreValue', 'typeOrgStructure', 'typeGpStructure', 'typeNetwork', 'typeAward', 'typeVision','typeOverView'])
      );
   }
}
