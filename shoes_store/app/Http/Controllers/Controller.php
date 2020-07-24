<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
     * @param $path
     * @param $file
     * @param $old_image
     *
     * @return file_name
     */
    // public function uploadImage($path, $file, $id, $old_image = '')
    // {
    //     try {
    //         $filesystemPutOptions = [
    //             'disk' => config('filesystems.default'),
    //         ];
    //         $file = $request->file('image');
    //         $path = $path.'/'.$id;
    //         $extension  = $file->getClientOriginalExtension();
    //         $filename   = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;

    //         if (!\Storage::disk('public')->exists($path)) {
    //             \Storage::disk('public')->makeDirectory($path);
    //         }

    //         // In the case update image
    //         if ($old_image) {
    //             \Storage::disk($filesystemPutOptions)->delete($path.'/'.$old_image);
    //         }

    //         $file->storeAs($path, $filename, config('filesystems.disks.public'));

    //         return true;
    //     } catch (\Exception $e) {
    //         \Log::error($e->getMessage());
    //         return false;
    //     }
    // }
}
