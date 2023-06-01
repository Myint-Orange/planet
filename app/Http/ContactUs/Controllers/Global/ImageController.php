<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\GpImage;
use App\Models\Group;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Type;
use App\Models\TypeImage;
use App\Models\Vedio;
use App\Models\VedioType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public static function updatePostImage($request)
    {

        if ($request->image != null && $request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalName();
            $post = Post::find($request->post_id);
            $filename = public_path() . '/storage/posts/' . $post->imgname;

            if ($post->imgname != null && file_exists($filename)) {
                unlink($filename);
            }
            Storage::disk('public')->putFileAs('posts', $image, $newName);
            //    dd($newName, $type);
            $user = Auth::user();
            $post->update([
                'imgname' => $newName,
                'user_id' => $user->id,
            ]);
        }
    }
    public static function updateTypeImage($request)
    {
        $newName = null;
        if ($request->image != null && $request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalName();
            $type = Type::find($request->type_id);
            $filename = public_path() . '/storage/types/' . $type->imgname;
            if ($type->imgname != null && file_exists($filename)) {
                unlink($filename);
            }
            Storage::disk('public')->putFileAs('types', $image, $newName);
            $user = Auth::user();
            $type->update([
                'imgname' => $newName,
                'user_id' => $user->id,
            ]);
        }
        return $newName;
    }
    public static function uploadTypeImage($type, $request)
    {

        if ($type != null) {
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalName();
            Storage::disk('public')->putFileAs('types', $image, $newName);
            $user = Auth::user();
            $type->update([
                'imgname' => $newName,
                'user_id' => $user->id,
            ]);
        }
    }

    public static function deleteImage($post)
    {

        if ($post->imgname != null) {

            $filename = public_path() . '/storage/posts/' . $post->imgname;
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
    }
    public  static function uploadImage($request)
    {
        if ($request->image != null && $request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalName();
            Storage::disk('public')->putFileAs('posts', $image, $newName);
            return $newName;
        }
    }

    public  static function updateTypeImages($request, $index, $lang, $imgname)
    {
        //dd("Arrive savea::", $request->$imgname);
        if ($request->$imgname != null && $request->hasFile($imgname)) {
            //   dd("Arrive savea::", $request->$imgname);
            $image = $request->file($imgname);
            $newName = time() . '.' . $image->getClientOriginalName();
            $type = Type::find($request->type_id);
            $filename = public_path() . '/storage/types/' . $type->typeImages[$index]->$imgname;
            if ($type->imageTypes != null && count($type->imageTypes) > 0 && file_exists($filename)) {
                unlink($filename);
            }
            Storage::disk('public')->putFileAs('types', $image, $newName);
            $user = Auth::user();
            $type->typeImages[$index]->update([
                'name_' . $lang => $newName,
                'user_id' => $user->id,
            ]);
        }
    }
    public static function updateGroupImage($request)
    {
        if ($request->image != null && $request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalName();
            $group = Group::find($request->group_id);
            $filename = public_path() . '/storage/groups/' . $group->imgname;
            if ($group->imgname != null && file_exists($filename)) {
                unlink($filename);
            }
            Storage::disk('public')->putFileAs('groups', $image, $newName);
            $user = Auth::user();
            $group->update([
                'imgname' => $newName,
                'group_id' => $group->id,
            ]);
        }
    }
    public  static function updateGroupImages($request, $index, $lang, $imgname)
    {
        dd("Arrive savea::", $request->$imgname);
        if ($request->$imgname != null && $request->hasFile($imgname)) {
            dd("Arrive savea::", $request->$imgname);
            $image = $request->file($imgname);
            $newName = time() . '.' . $image->getClientOriginalName();
            $group = Group::find($request->group_id);
            $filename = public_path() . '/storage/groups/' . $group->$imgname;
            if ($group->gpImages != null && count($group->gpImages) > 0 && file_exists($filename)) {
                unlink($filename);
            }
            Storage::disk('public')->putFileAs('types', $image, $newName);
            $user = Auth::user();
            $group->gpImages[$index]->update([
                'name_' . $lang => $newName,
                'user_id' => $user->id,
            ]);
        }
    }
    public  static function uploadPostImage($image, $post_id)
    {
        if ($image != null) {
            $newName = time() . '.gallery' . $image->getClientOriginalName();
            $post = Post::find($post_id);
            Storage::disk('public')->putFileAs('posts', $image, $newName);
            $postImage = PostImage::create([
                'name_en' => $newName,
                'post_id' => $post->id,
            ]);
        }
    }
    public  static function uploadTypeImages($image, $type_id)
    {
        if ($image != null) {
            $newName = time() . '.gallery' . $image->getClientOriginalName();
            $type = Type::find($type_id);
            Storage::disk('public')->putFileAs('types', $image, $newName);
            TypeImage::create([
                'name_en' => $newName,
                'type_id' => $type->id,
            ]);
        }
    }
    public  static function uploadGroupImages($image, $group_id)
    {
        //  dd("Arrive img not null");
        if ($image != null) {
            //    dd("Arrive img not null");
            $newName = time() . '.gallery' . $image->getClientOriginalName();
            $group = Group::find($group_id);
            Storage::disk('public')->putFileAs('groups', $image, $newName);
            GpImage::create([
                'name_en' => $newName,
                'group_id' => $group->id,
            ]);
        }
    }
    public static function deletePostImage($post_id, $index, $name)
    {
        $post = Post::find($post_id);
        if ($post->postImages != null && count($post->postImages) > 0) {

            $filename = public_path() . '/storage/posts/' . $post->postImages[$index]->$name;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $post->delete();
        }
    }
    public static function deleteTypeImage($type_id, $name)
    {
        $type = Type::find($type_id);
        if ($type != null && $type->imgname != null) {

            $filename = public_path() . '/storage/types/' . $type->$name;
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
    }

    public static function deletePostImageByImgId($img_id, $name)
    {
        $postImage = PostImage::find($img_id);
        //dd($postImage);
        if ($postImage != null) {
            $filename = public_path() . '/storage/posts/' . $postImage->$name;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $postImage->delete();
        }
    }
    public static function deleteGroupImageByImgId($img_id, $name)
    {
        $gpImage = GpImage::find($img_id);
        //dd("Arrive delete ing");
        if ($gpImage != null) {
            $filename = public_path() . '/storage/groups/' . $gpImage->$name;
            //dd("Delete img", $filename);
            if (file_exists($filename)) {
                /// dd("Delete img really");
                unlink($filename);
            }
            $gpImage->delete();
        }
    }
    public static function deleteTypeImageByImgId($img_id, $name)
    {
        $typeImage = TypeImage::find($img_id);
        //dd($postImage);
        if ($typeImage != null) {
            $filename = public_path() . '/storage/types/' . $typeImage->$name;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $typeImage->delete();
        }
    }

    public static function uploadVideo($request, $post, $imgName)
    {
        $fileName = null;
        if ($request->video != null) {
            $fileName = time() . $request->video->getClientOriginalName();
            $filePath = 'vedios/' . $fileName;
            $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
            $url = Storage::disk('public')->url($filePath);
        }

        $vedio = Vedio::create([
            'youtube' => $request->youtube,
            'name' => $fileName,
            'coverImg' => $imgName,
            'post_id' => $post->id,
        ]);



        // dd("file dose not exist");
        return false;
    }
    public static function uploadVideoType($request, $type, $imgName)
    {
        $fileName = null;
        if ($request->video != null) {
            $fileName = time() . $request->video->getClientOriginalName();
            $filePath = 'vedios/' . $fileName;
            $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
            $url = Storage::disk('public')->url($filePath);
        }
        if ($request->video != null || $request->youtube != null) {
            $vedio = VedioType::create([
                'youtube' => $request->youtube,
                'name' => $fileName,
                'coverImg' => $imgName,
                'type_id' => $type->id,
            ]);
            return true;
        }
        return false;
    }
    public static function updateVideoType($request)
    {
        $isFileUploaded = null;
        $fileNew = null;
        $type = Type::find($request->type_id);
        if ($type->vedioTypes != null && count($type->vedioTypes) > 0) {
            if ($request->video != null) {
                //  dd("Arrive to update");
                $filename = public_path() . '/storage/vedios/' . $type->vedioTypes[0]->name;
                if ($type->vedioTypes[0]->name && file_exists($filename)) {
                    //   dd("Delete old");
                    unlink($filename);
                }
                $fileNew = time() . $request->video->getClientOriginalName();
                $filePath = 'vedios/' . $fileNew;
                $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
                $url = Storage::disk('public')->url($filePath);
            }
            if ($isFileUploaded) {
                //  dd("update in table file is success uploaded!!");
                $vedio = $type->vedioTypes[0]->update([
                    'name' => $fileNew,
                    'type_id' => $type->id,
                ]);
            }
            return true;
        }

        return false;
    }

    public static function updateVideo($request)
    {
        $post = Post::find($request->post_id);

        $fileNew = null;


        if ($request->video != null) {
            // dd("upload vedio");
            $fileNew = time() . $request->video->getClientOriginalName();
            $filePath = 'vedios/' . $fileNew;
            $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
            $url = Storage::disk('public')->url($filePath);
            $filename = public_path() . '/storage/vedios/' . $post->vedios[0]->name;
            // dd($filename);
            if ($post->vedios[0]->name && file_exists($filename)) {
                unlink($filename);
            }
        }

        return $fileNew;
    }

    public static function deleteVideo($post_id)
    {
        $post = Post::find($post_id);
        if ($post->has('vedios') && count($post->vedios) > 0) {
            $vedio = $post->vedios[0];
            $filePath = 'vedios/' . $vedio->name;
            $filename = public_path() . '/storage/vedios/' . $post->vedios[0]->name;
            $isFileDeleted = Storage::disk('public')->delete($filePath);
            if (file_exists($filename)) {
                unlink($filename);
            }
            if ($isFileDeleted) {
                $vedio->delete();
                return true;
            }
            return false;
        }
    }
    public static function deleteVideoFile($post_id)
    {
        $post = Post::find($post_id);
        if ($post->has('vedios') && count($post->vedios) > 0) {
            $vedio = $post->vedios[0];
            $filePath = 'vedios/' . $vedio->name;
            $filename = public_path() . '/storage/vedios/' . $post->vedios[0]->name;
            $isFileDeleted = Storage::disk('public')->delete($filePath);
            if ($post->vedios[0]->name != null && file_exists($filename)) {
                unlink($filename);
            }
        }
    }
    public static function deleteTypeVideo($type_id)
    {
        $type = Type::find($type_id);
        if ($type->has('vedioTypes') && count($type->vedioTypes) > 0) {
            $vedioType = $type->vedioTypes[0];
            $filePath = 'vedios/' . $vedioType->name;
            $filename = public_path() . '/storage/vedios/' . $type->vedioTypes[0]->name;
            $isFileDeleted = Storage::disk('public')->delete($filePath);
            if (file_exists($filename)) {
                unlink($filename);
            }
            if ($isFileDeleted) {
                $vedioType->update([
                    "name" => null,
                ]);
                return true;
            }
            return false;
        }
    }
    public static function imageUploadForVedio($request)
    {
        $imageName = null;
        try {
            $image = $request->file('image');
            if ($image != null) {
                $imageName = time() . '.' . $image->getClientOriginalName();
                Storage::disk('public')->putFileAs('vedios', $image, $imageName);
                return $imageName;
            }
        } catch (\Exception $e) {
            return  $imageName;
        }
    }
}
