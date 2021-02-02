<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;

class UploadController extends Controller {
    public function __construct()
    {
        $this->Upload = base_path('/public/image/');
        $this->imagesize = 50000000;
    }
    public function UploadImage(Request $request)
    {
        $id = $request->get('eleid');
        $file = $_FILES;
        $target_file = $this->Upload . basename($file['file']['name']);
        $imageFIletype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($file["file"]["tmp_name"]);
        if ($check !== false) {
            $this->chkExistsFile($target_file);
            $this->chkSizeFile($file['file']['size']);
            if ($this->Upload) {
                $this->CompleteUpload($file['file']['tmp_name'], $target_file);
                echo json_encode([$this->res, 'storageImage' => $target_file]);
            } else {
                echo json_encode(['error' => true, $this->res]);
            }
            
        } else {
            $upload = false;
            $this->res[] = 'this file is not image.';
        }
    }
    function chkExistsFile($file)
    {
        if (file_exists($file)) {
            $this->Upload = false;
            $this->res[] = "this file is already Exists.";
        } else {
            $this->Upload = true;
        }
    }
    function chkSizeFile($size, $def_size = 0)
    {
        if ($def_size == 0) {
            $def_size = $this->imagesize;
        }
        if ($def_size >= $size) {
            $this->Upload = true;
        } else {
            $this->Upload = false;
            $this->res[] = "sorry, file size is over 500 kb.";
        }
    }
    function CompleteUpload($tmpname, $target_file)
    {
        if (move_uploaded_file($tmpname, $target_file)) {
            $this->res = "file is uploaded.";
        } else {
            $this->res[] = "can't Upload file. please try again.";
        }
    }
}