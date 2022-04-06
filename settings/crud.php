<?php
require_once 'system.php';
require_once 'functions.php';




class crud{
    private $db;
    private $db_host = DBHOST;
    private $db_name = DBNAME;
    private $db_user = DBUSER;
    private $db_pass = DBPASSWORD;
    public $target;

    function __construct(){
        try{
            $this->db = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;charset=utf8",$this->db_user,$this->db_pass);
        }
        catch (PDOException $e){
            echo "Database Bağlantısı Başarısız!";
            //echo $e->getMessage();
            //echo "<hr>";
            //echo "HATA!";
        }

        if (isset($_SESSION['admin'])){
            $login_control = $this->db->prepare("SELECT * FROM admin WHERE username=:username AND active=:active");
            $login_control->execute(array(
                ':username' => $_SESSION['admin']['username'],
                ':active' => 1
            ));

            if ($login_control->rowCount() <= 0){
                if (session_status() == PHP_SESSION_NONE){
                    session_start();
                }
                session_destroy();
                header("location:login.php");
            }
        }
    }


    public function login_control($username,$password){
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE username=:username AND password=:password AND active=:active");
        $stmt->execute(array(
            ':username' => $username,
            ':password' => md5($password.HASH_PASSWORD),
            ':active' => 1
        ));

        if ($stmt->rowCount() > 0){
            $take_info = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['admin']['name'] = $take_info['name'];
            $_SESSION['admin']['surname'] = $take_info['surname'];
            $_SESSION['admin']['username'] = $take_info['username'];
            $_SESSION['admin']['id'] = $take_info['id'];
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function company_info($url = NULL,$company_name = NULL, $description = NULL, $keywords = NULL, $phone = NULL, $mail = NULL,
    $facebook = NULL, $twitter = NULL, $instagram = NULL, $linkedin = NULL, $video = NULL){
        $stmt = $this->db->prepare("UPDATE company_info SET url=:url, company_name=:company_name, description=:description, keywords=:keywords,
        phone=:phone, mail=:mail, facebook=:facebook, twitter=:twitter, instagram=:instagram, linkedin=:linkedin, video=:video ");
        $stmt->execute(array(
            ':url' => $url,
            ':company_name' => $company_name,
            ':description' => $description,
            ':keywords' => $keywords,
            ':phone' => $phone,
            ':mail' => $mail,
            ':facebook' => $facebook,
            ':twitter' => $twitter,
            ':instagram' => $instagram,
            ':linkedin' => $linkedin,
            ':video' => $video
        ));

        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }


    }


    public function edit_user_details($name,$surname,$password){
        if (!empty($password)){
            $stmt = $this->db->prepare("UPDATE admin SET name=:name, surname=:surname, password=:password WHERE id=:id");
            $stmt->execute(array(
                ':name' => $name,
                ':surname' => $surname,
                ':password' => md5($password.HASH_PASSWORD),
                ':id' => $_SESSION['admin']['id']
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        else{
            $stmt = $this->db->prepare("UPDATE admin SET name=:name, surname=:surname WHERE id=:id");
            $stmt->execute(array(
                ':name' => $name,
                ':surname' => $surname,
                ':id' => $_SESSION['admin']['id']
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

    }


    public function read($table){
        $query = $this->db->query("SELECT * FROM $table");
        return $query;
    }

    public function read_with_id($table,$id){
        $query = $this->db->prepare("SELECT * FROM $table WHERE id=:id");
        $query->execute(array(
            ':id' => $id
        ));
        return $query;
    }

    public function read_three($table){
        $query = $this->db->query("SELECT * FROM $table ORDER BY id DESC LIMIT 3");
        return $query;
    }




    public function edit_home_screen($img,$title,$content){ //Home first screen edit function

            if ($img != NULL){
            $img_upload = new image_upload();
            $img_upload->file = $img;
            $img_upload->target_dir = "../assets/images/uploads/home_screen/";
            $response = $img_upload->single_upload();

            if ($response['status'] == TRUE){
                $stmt = $this->db->prepare("UPDATE home_opening_screen SET photo=:photo, title=:title, content=:content");
                $stmt->execute(array(
                    ':photo' => $response['img_name'],
                    ':title' => $title,
                    ':content' => $content
                ));
                if ($stmt->rowCount() > 0){
                    return ['status' => TRUE];
                }
                else{
                    return ['status' => FALSE, 'error_message' => $response['error_message']];
                }
            }
            else if ($response['status'] == FALSE){
                return ['status' => FALSE, 'error_message' => $response['error_message']];
            }
        }
        else{
            $stmt = $this->db->prepare("UPDATE home_opening_screen SET title=:title, content=:content");
            $stmt->execute(array(
                ':title' => $title,
                ':content' => $content
            ));
            if ($stmt->rowCount() > 0){
                return ['status' => TRUE];
            }
            else{
                return ['status' => FALSE];
            }
        }
    }


    public function index_short_about($img,$title,$sub_title, $content){
        if ($img != NULL){
            $img_upload = new image_upload();
            $img_upload->file = $img;
            $img_upload->target_dir = "../assets/images/uploads/index_short_about/";
            $response = $img_upload->single_upload();
            if ($response['status'] == TRUE){
                $stmt = $this->db->prepare("UPDATE index_short_about SET photo=:photo, title=:title, sub_title=:sub_title, content=:content");
                $stmt->execute(array(
                    ':photo' => $response['img_name'],
                    ':title' => $title,
                    ':sub_title' => $sub_title,
                    ':content' => $content,
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        else{
            $stmt = $this->db->prepare("UPDATE index_short_about SET title=:title, sub_title=:sub_title, content=:content");
            $stmt->execute(array(
                ':title' => $title,
                ':sub_title' => $sub_title,
                ':content' => $content,
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }



    public function create_stats($icon,$number,$content){
                $stmt = $this->db->prepare("INSERT INTO work_stats SET icon=:icon, number=:number, content=:content");
                $stmt->execute(array(
                    ':icon' => $icon,
                    ':number' => $number,
                    ':content' => $content
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
    }


    public function edit_stats($icon,$number,$content,$id){
        $stmt = $this->db->prepare("UPDATE work_stats SET icon=:icon, number=:number, content=:content WHERE id=:id");
        $stmt->execute(array(
            ':icon' => $icon,
            ':number' => $number,
            ':content' => $content,
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function delete_stats($id){
        $stmt = $this->db->prepare("DELETE FROM work_stats WHERE id=:id");
        $stmt->execute(array(
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }



    public function create_why_us($title,$content){
        $stmt = $this->db->prepare("INSERT INTO why_us SET title=:title, content=:content");
        $stmt->execute(array(
            ':title' => $title,
            ':content' => $content
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


    public function edit_why_us($title,$content,$id){
        $stmt = $this->db->prepare("UPDATE why_us SET title=:title, content=:content WHERE id=:id");
        $stmt->execute(array(
            ':title' => $title,
            ':content' => $content,
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


    public function delete_why_us($id){
        $stmt = $this->db->prepare("DELETE FROM why_us WHERE id=:id");
        $stmt->execute(array(
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }



    public function create_what_we_do($icon,$title,$content){
        $stmt = $this->db->prepare("INSERT INTO what_we_do SET icon=:icon, title=:title, content=:content");
        $stmt->execute(array(
            ':icon' => $icon,
            ':title' => $title,
            ':content' => $content
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function edit_what_we_do($icon,$title,$content,$id){
        $stmt = $this->db->prepare("UPDATE what_we_do SET icon=:icon, title=:title, content=:content WHERE id=:id");
        $stmt->execute(array(
            ':icon' => $icon,
            ':title' => $title,
            ':content' => $content,
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function delete_what_we_do($id){
        $stmt = $this->db->prepare("DELETE FROM what_we_do WHERE id=:id");
        $stmt->execute(array(
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }



    //For About Page
    public function about($title,$content){
        $stmt = $this->db->prepare("UPDATE about SET title=:title, content=:content");
        $stmt->execute(array(
            ':title' => $title,
            ':content' => $content
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


    //For Business Partners
    public function create_business_partners($img,$alt){
        if ($img != NULL){
            $img_upload = new image_upload();
            $img_upload->file = $img;
            $img_upload->target_dir = "../assets/images/uploads/partners/";
            $response = $img_upload->single_upload();
            if ($response['status'] == TRUE){
                $stmt = $this->db->prepare("INSERT INTO business_partners SET photo=:photo, alt=:alt");
                $stmt->execute(array(
                    ':photo' => $response['img_name'],
                    ':alt' => $alt
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        else{
            return FALSE;
        }
    }
    public function edit_business_partners($img,$alt,$id){
        if ($img != NULL){
            $img_upload = new image_upload();
            $img_upload->file = $img;
            $img_upload->target_dir = "../assets/images/uploads/partners/";
            $response = $img_upload->single_upload();
            if ($response['status'] == TRUE){
                $stmt = $this->db->prepare("UPDATE business_partners SET photo=:photo, alt=:alt WHERE id=:id");
                $stmt->execute(array(
                    ':photo' => $response['img_name'],
                    ':alt' => $alt,
                    ':id' => $id
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        else{
            $stmt = $this->db->prepare("UPDATE business_partners SET alt=:alt WHERE id=:id");
            $stmt->execute(array(
                ':alt' => $alt,
                ':id' => $id
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }
    public function delete_business_partners($id){
                $stmt = $this->db->prepare("DELETE FROM business_partners WHERE id=:id");
                $stmt->execute(array(
                    ':id' => $id
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
    }



    //For Blog
    public function create_blog($img,$title,$content,$meta_description,$meta_keywords){
        if ($img != NULL){
            $img_upload = new image_upload();
            $img_upload->file = $img;
            $img_upload->target_dir = "../assets/images/uploads/blog/";
            $response = $img_upload->single_upload();
            if ($response['status'] == TRUE){
                $stmt = $this->db->prepare("INSERT INTO blog SET photo=:photo, title=:title, content=:content,
                meta_description=:meta_description, meta_keywords=:meta_keywords");
                $stmt->execute(array(
                    ':photo' => $response['img_name'],
                    ':title' => $title,
                    ':content' => $content,
                    ':meta_description' => $meta_description,
                    ':meta_keywords' => $meta_keywords
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        else{
            $stmt = $this->db->prepare("INSERT INTO blog SET title=:title, content=:content,
                meta_description=:meta_description, meta_keywords=:meta_keywords");
            $stmt->execute(array(
                ':title' => $title,
                ':content' => $content,
                ':meta_description' => $meta_description,
                ':meta_keywords' => $meta_keywords
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }
    public function edit_blog($img,$title,$content,$meta_description,$meta_keywords,$id){
        if ($img != NULL){
            $img_upload = new image_upload();
            $img_upload->file = $img;
            $img_upload->target_dir = "../assets/images/uploads/blog/";
            $response = $img_upload->single_upload();
            if ($response['status'] == TRUE){
                $stmt = $this->db->prepare("UPDATE blog SET photo=:photo, title=:title, content=:content,
                meta_description=:meta_description, meta_keywords=:meta_keywords WHERE id=:id");
                $stmt->execute(array(
                    ':photo' => $response['img_name'],
                    ':title' => $title,
                    ':content' => $content,
                    ':meta_description' => $meta_description,
                    ':meta_keywords' => $meta_keywords,
                    ':id' => $id
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        else{
            $stmt = $this->db->prepare("UPDATE blog SET title=:title, content=:content,
                meta_description=:meta_description, meta_keywords=:meta_keywords WHERE id=:id");
            $stmt->execute(array(
                ':title' => $title,
                ':content' => $content,
                ':meta_description' => $meta_description,
                ':meta_keywords' => $meta_keywords,
                ':id' => $id
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }
    public function delete_blog($id){
        $stmt = $this->db->prepare("DELETE FROM blog WHERE id=:id");
        $stmt->execute(array(
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }




    //For fileds_of_activity

    public function create_fileds_of_activity($title,$content){
            $stmt = $this->db->prepare("INSERT INTO fileds_of_activity SET title=:title, content=:content");
            $stmt->execute(array(
                ':title' => $title,
                ':content' => $content,
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
    }

    public function edit_fileds_of_activity($title,$content,$id){
        $stmt = $this->db->prepare("UPDATE fileds_of_activity SET title=:title, content=:content WHERE id=:id");
        $stmt->execute(array(
            ':title' => $title,
            ':content' => $content,
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function delete_fileds_of_activity($id){
        $stmt = $this->db->prepare("DELETE FROM fileds_of_activity WHERE id=:id");
        $stmt->execute(array(
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }






    //For Project

    public function create_project($img,$name,$project_time,$content,$status){
        if ($img != NULL){
            $img_upload = new image_upload();
            $img_upload->file = $img;
            $img_upload->target_dir = "../assets/images/uploads/projects/";
            $response = $img_upload->multi_upload();
            if ($response['status'] == TRUE){
                $stmt = $this->db->prepare("INSERT INTO project SET photo=:photo, name=:name, time=:project_time ,content=:content, status=:status");
                $stmt->execute(array(
                    ':photo' => $response['img_name'],
                    ':name' => $name,
                    ':project_time' => $project_time,
                    ':content' => $content,
                    ':status' => $status
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        else{
            $stmt = $this->db->prepare("INSERT INTO project SET name=:name, time=:project_time, content=:content, status=:status");
            $stmt->execute(array(
                ':name' => $name,
                ':project_time' => $project_time,
                ':content' => $content,
                ':status' => $status
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }

    public function edit_project($img,$name,$project_time,$content,$status,$id){
        if ($img != NULL){
            $img_upload = new image_upload();
            $img_upload->file = $img;
            $img_upload->target_dir = "../assets/images/uploads/projects/";
            $response = $img_upload->multi_upload();
            if ($response['status'] == TRUE){
                $stmt = $this->db->prepare("UPDATE project SET photo=:photo, name=:name, time=:project_time ,content=:content, status=:status WHERE id=:id");
                $stmt->execute(array(
                    ':photo' => $response['img_name'],
                    ':name' => $name,
                    ':project_time' => $project_time,
                    ':content' => $content,
                    ':status' => $status,
                    ':id' => $id
                ));
                if ($stmt->rowCount() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        else{
            $stmt = $this->db->prepare("UPDATE project SET name=:name, time=:project_time, content=:content, status=:status WHERE id=:id");
            $stmt->execute(array(
                ':name' => $name,
                ':project_time' => $project_time,
                ':content' => $content,
                ':status' => $status,
                ':id' => $id
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return $stmt->errorInfo();
                return FALSE;
            }
        }
    }

    public function delete_project($id){
            $stmt = $this->db->prepare("DELETE FROM project WHERE id=:id");
            $stmt->execute(array(
                ':id' => $id
            ));
            if ($stmt->rowCount() > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
    }





    //For Contact Form

    public function create_contact_form($name,$surname,$mail,$phone,$message){
        $stmt = $this->db->prepare("INSERT INTO contact_form SET name=:name, surname=:surname, mail=:mail, phone=:phone, message=:message");
        $stmt->execute(array(
            ':name' => $name,
            ':surname' => $surname,
            ':mail' => $mail,
            ':phone' => $phone,
            ':message' => $message
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


    public function delete_contact_form($id){
        $stmt = $this->db->prepare("DELETE FROM contact_form WHERE id=:id");
        $stmt->execute(array(
            ':id' => $id
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }





    //For subscribe

    //For Contact Form

    public function subscribe_form($mail){
        $stmt = $this->db->prepare("INSERT INTO subscribe_list SET mail=:mail");
        $stmt->execute(array(
            ':mail' => $mail,
        ));
        if ($stmt->rowCount() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }











}







?>