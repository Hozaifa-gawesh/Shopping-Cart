<?php

namespace App\Http\Controllers;
use File;

trait UploadFilesTrait {


    /**
     * Upload File
     * @param $file
     * @param $path
     * @param null $type
     * @return bool|string
     */
    public static function storeFile($file, $path, $type)
    {
        if($file != null) {
            // Rename File
            $newFile = date('ymdgis') . mt_rand(100, 1000000) . '.' . $file->getClientOriginalExtension();

            // Move File
            if ($type === 'file') {
                $file->move('files/' . $path, $newFile);
                return $newFile;

            } elseif ($type === 'image') {
                $file->move('images/' . $path, $newFile);
                return $newFile;
            }
        }

        return null;
    }


    /**
     * Update File
     * @param $file
     * @param $path
     * @param $oldFile
     * @param $type
     * @return bool|string
     */
    public static function updateFile($file, $path, $type, $oldFile)
    {
        if($file != null) {

            // Rename File
            $newFile = date('ymdgis') . mt_rand(100, 1000000) . '.' . $file->getClientOriginalExtension();

            // Move File
            if ($type === 'file') {
                if ($file->move('files/' . $path, $newFile)) {
                    // Delete old file
                    File::Delete('files/' . $path . '/' . $oldFile);
                    return $newFile;
                }

            } elseif ($type === 'image') {
                if ($file->move('images/' . $path, $newFile)) {
                    // Delete old file
                    File::Delete('images/' . $path . '/' . $oldFile);
                    return $newFile;
                }
            }
        }

        return $oldFile;
    }

}