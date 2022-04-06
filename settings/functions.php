<?php
require_once 'crud.php';

function divide($word, $limit ) {
//Number of characters of text
    $length = strlen($word);
//When the end of the text is reached, add ... to the end
    if ($length > $limit) {
        $details = substr($word,0,$limit) . "...";
    }
    else{
        $details = $word;
    }
    return $details;
}

function take_page(){
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = "index";
    }
    return $page;
}


function data_message($status, $location = "index.php", $message = NULL)
    {
        switch ($status) {
            case 'success':
                $data["title"] = "Başarılı";
                $data["status"] = "success";
                $data["message"] = "İşlem Başarılı";
                $data["link"] = $location;
                return json_encode($data, true);
                break;

            case 'success_message':
                $data["title"] = "Başarılı";
                $data["status"] = "success";
                $data["message"] = $message;
                $data["link"] = $location;
                return json_encode($data, true);
                break;

            case 'error':
                $data["title"] = "Başarısız";
                $data["status"] = "error";
                $data["message"] = "İşlem Başarısız";
                $data["link"] = $location;
                return json_encode($data); //Return attıktan sonra aşağıya break bırakmak? Güvensizliğin sonuncu seviyesi.
                break;

            case 'error_message':
                $data["title"] = "Başarısız";
                $data["status"] = "error";
                $data["message"] = $message;
                $data["link"] = $location;
                return json_encode($data);
                break;

            case 'password_error':
                $data["title"] = "Başarısız";
                $data["status"] = "error";
                $data["message"] = "İşlem Başarısız, Şifreniz Yanlış!";
                $data["link"] = $location;
                return json_encode($data);
                break;
        }
    }



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
                return ['status' => FALSE, 'error_message' => 'Resim 10 MB\'dan büyük olamaz!'];
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
            return ['status' => FALSE, 'error_message' => 'Resim bulunamadı!'];
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
                    return ['status' => FALSE, 'error_message' => 'Resim 10 MB\'dan büyük olamaz!'];
                } else { //FILES < max_size
                    $image_name = explode(".", $this->file['name'][$i]); //Explode & just take image name
                    $image_name = md5($image_name[0] . rand(0, 500) . rand(500, 1000)); //Hash image name
                    $image_extension = explode("/", $this->file['type'][$i]); //Explode & just take image file extention
                    $target_file = $target_dir . $image_name . "." . $image_extension[1]; //Combining
                    $this->image = $image_name . "." . $image_extension[1]; //Send to class
                    if (!file_exists($target_file)) { //File already exists control
                        if (move_uploaded_file($this->file["tmp_name"][$i], $target_file)) { //Upload File
                            array_push($this->file_list,$image_name . '.' . $image_extension[1]); //SUCCESS RESULT
                        } else {
                            return ['status' => FALSE]; //ERROR RESULT
                        }
                    } else {
                        return ['status' => FALSE]; //ERROR RESULT
                    }
                }
            }
            else {
                return ['status' => FALSE, 'error_message' => 'Resim bulunamadı!'];
            }
        }//END LOOP
        return ['status' => TRUE, 'img_name' => json_encode($this->file_list)]; //ERROR RESULT
    } //END multi upload function


} //END image upload CLASS




function take_link($show_ssl = 1,$show_url = 1){
    if ($show_ssl == 1){
        if (isset($_SERVER['HTTPS']))
        {
            $ssl = 'https://';
        }
        else
        {
            $ssl = 'http://';
        }
    }
    if ($show_url == 1){
        $url = $_SERVER['HTTP_HOST'].'/'.'berke_insaat';
    }

    if ($show_ssl == 1 && $show_url == 1){
        return $ssl.$url;
    }
    else if ($show_ssl == 1 && $show_url == 0){
        return $ssl;
    }
    else if ($show_ssl == 0 && $show_url == 1){
        return $url;
    }
}








?>