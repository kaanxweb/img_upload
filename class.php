<?php
class image_upload
{
    public $file;
    public $target_dir = 'uploads/'; //Where will it be saved? //Default: "uploads/"
    public $max_size = 10000000; //Max size //Default: 10000000

    //Do not assign a value here ------------------------------------------------
    public $image; // = $target_dir variable. Need for insert target_file database
    //---------------------------------------------------------------------------

    public $file_list = [];


    public function single_upload() //Start single upload function
    {
        if ( // Check if image file is a actual image or fake image
            $this->file['type'] == "image/png" || $this->file['type'] == "image/jpeg" ||
            $this->file['type'] == "image/jpg" || $this->file['type'] == "image/webp"
        ) {
            $target_dir = $this->target_dir;
            $max_size = $this->max_size;
            if ($this->file['size'] > $max_size) {
                return ['status' => FALSE, 'error_message' => 'Image cannot be larger than 10 MB!'];
            } else { //FILES < max_size
                $image_name = explode(".", $this->file['name']); //Explode & just take image name
                $image_name = md5($image_name[0] . rand(0, 500) . rand(500, 1000)); //Hash image name
                $image_extension = explode("/", $this->file['type']); //Explode & just take image file extention
                $target_file = $target_dir . $image_name . "." . $image_extension[1]; //Combining
                $this->image = $image_name . "." . $image_extension[1]; //Send to class
                if (!file_exists($target_file)) { //File already exists control
                    if (move_uploaded_file($this->file["tmp_name"], $target_file)) { //Upload File
                        return ['status' => TRUE, 'img_name' => $image_name.'.'.$image_extension[1]]; //SUCCESS RESULT
                    } else {
                        //echo data_message('error_message','blog.php?blog_type=blog_list','Resim kaydedilemedi!'); //ERROR Message
                        return ['status' => FALSE]; //ERROR RESULT
                    }
                } else {
                    //echo data_message('error_message','blog.php?blog_type=blog_list','HATA! Lütfen tekrar deneyin.'); //File already exists - error message.
                    return ['status' => FALSE]; //ERROR RESULT
                }
            }
        } else {
            return ['status' => FALSE, 'error_message' => 'Image not found!'];
        }
    } //END Single upload function

    public function multi_upload() //Start multi upload function
    {
        for ($i = 0; $i < count($this->file['name']); $i++) {
            if ( // Check if image file is a actual image or fake image
                $this->file['type'][$i] == "image/png" || $this->file['type'][$i] == "image/jpeg" ||
                $this->file['type'][$i] == "image/jpg" || $this->file['type'][$i] == "image/webp"
            ) {
                $target_dir = $this->target_dir;
                $max_size = $this->max_size;
                if ($this->file['size'][$i] > $max_size) {
                    return ['status' => FALSE, 'error_message' => 'Image cannot be larger than 10 MB!'];
                } else { //FILES < max_size
                    $image_name = explode(".", $this->file['name'][$i]); //Explode & just take image name
                    $image_name = md5($image_name[0] . rand(0, 500) . rand(500, 1000)); //Hash image name
                    $image_extension = explode("/", $this->file['type'][$i]); //Explode & just take image file extention
                    $target_file = $target_dir . $image_name . "." . $image_extension[1]; //Combining
                    $this->image = $image_name . "." . $image_extension[1]; //Send to class
                    if (!file_exists($target_file)) { //File already exists control
                        if (move_uploaded_file($this->file["tmp_name"][$i], $target_file)) { //Upload File
                            array_push($this->file_list,$image_name . '.' . $image_extension[1]); //SUCCESS PUSH
                        } else {
                            return ['status' => FALSE]; //ERROR RESULT
                        }
                    } else {
                        return ['status' => FALSE]; //ERROR RESULT
                    }
                }
            }
            else {
                return ['status' => FALSE, 'error_message' => 'Image not found!'];
            }
        }//END LOOP
        return ['status' => TRUE, 'img_name' => json_encode($this->file_list)]; //SUCCESS RESULT
    } //END multi upload function


} //END image upload CLASS
?>