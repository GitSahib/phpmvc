<?php 
/**
* Image upload
*/
class ImageUpload
{
    var $dest_path;
    var $file_name;
    function __construct()
    {
        # code...
    }
    function dest_path($path){
        $this->dest_path = $path;
        return $this;
    }
    function file_name($name=array()){
        $this->file_name = $name;
        return $this;
    }
    function process(){
        try {
   
            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            
            if (
                !isset($_FILES[$this->file_name]['error']) ||
                is_array($_FILES[$this->file_name]['error'])
            ) {
                throw new RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($_FILES[$this->file_name]['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }
            foreach ($_FILES as $key => $file) {
                // You should also check filesize here.
                if ($file['size'] > 1000000) {
                    throw new RuntimeException('Exceeded filesize limit.');
                }

                // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
                // Check MIME Type by yourself.
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                    $finfo->file($file['tmp_name']),
                    array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                    ),
                    true
                )) {
                    throw new RuntimeException('Invalid file format.');
                }

                // You should name it uniquely.
                // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
                // On this example, obtain safe unique name from its binary data.
                $file_name = sprintf($this->dest_path.'/%s.%s',sha1_file($file['tmp_name']));
                if (!move_uploaded_file(
                    $file['tmp_name'],
                    $file_name,
                        $ext
                    )){
                    throw new RuntimeException('Failed to move uploaded file.');
                }
            }
            

            return array('result'=> 1,'file_name','message'=>sprintf('File%s is uploaded successfully.',is_array($this->file_name)?'s':''));

        } catch (RuntimeException $e) {

            return array('result'=> 0,'message'=>$e->getMessage());

        }
    }
}
