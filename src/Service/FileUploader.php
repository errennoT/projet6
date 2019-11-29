<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        if ($file->guessExtension() == 'jpg') {
            $file->guessExtension() == 'jpeg';
        }
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }

    public function removeFile($oldFileName)
    {
        try {
            unlink($this->getTargetDirectory() . '/' . $oldFileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}
