<?php 

namespace App\Utils; 

class FilePondManager 
{
    public static function getSource(array $files){
        $sourceFiles = array_map(function($folderFile){
            $sourceType = file_exists(FILES_UPLOAD_DIRECTORY . $folderFile) ? 'local' : 'limbo';
            return [
                'source' => $folderFile, 
                'options' => [
                    'type' => $sourceType,
                ]
            ];

        }, $files);

        return $sourceFiles;
    }
}
