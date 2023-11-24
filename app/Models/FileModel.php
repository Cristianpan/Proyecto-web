<?php

namespace App\Models;

use App\Utils\FileManager;
use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table            = 'files';
    protected $primaryKey       = 'fileId';
    protected $allowedFields    = ['uuid', 'fileName', 'fileDirectoryRoute'];

    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];

    protected $beforeInsert  = ['getFileEntity'];
    protected $afterInsert = ['saveFile'];

    protected function getFileEntity(array $data)
    {
        $uuid                               = $data['data']['fileId'];
        $outputFolder                       = FILES_UPLOAD_DIRECTORY . $uuid;
        $sourceFolder                       = FILES_TEMPORAL_DIRECTORY . $uuid;
        $filePath                           = scandir($sourceFolder)[2];
        $data['data']['fileDirectoryRoute'] = $outputFolder;
        $data['data']['fileName']           = $filePath;

        return $data;
    }

    protected function saveFile(array $data)
    {
        $uuid = $data['data']['fileId'];
        $sourcePath = FILES_TEMPORAL_DIRECTORY . $uuid;
        $outputFolder = FILES_UPLOAD_DIRECTORY . $uuid;
        FileManager::changeDirectoryFolder($sourcePath, $outputFolder);
    }

    public function deleteFile(String $fileId)
    {
        $this->delete($fileId);
        FileManager::deleteFolderWithContent(FILES_UPLOAD_DIRECTORY . $fileId);
    }
}
