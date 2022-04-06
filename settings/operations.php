<?php
session_start();



require_once 'crud.php';

/*------------------------------------------------------------------------------------------------------------------------------------------------*/

if (isset($_SESSION['admin']['username'])){


    //Edit Company Info
    if ($_GET['operation'] == 'company_info'){
        $crud = new crud();
            $response = $crud->company_info($_POST['company_url'],$_POST['company_title'],$_POST['company_description'],
            $_POST['company_keywords'], $_POST['company_phone'], $_POST['company_mail'],
                $_POST['company_facebook'], $_POST['company_twitter'], $_POST['company_instagram'],
                $_POST['company_linkedin'], $_POST['company_video']);
            if ($response == TRUE){
                echo data_message('success');
                die();
            }
            else{
                echo data_message('error');
                die();
            }
    }


    if ($_GET['operation'] == 'edit_user_details'){
        $crud = new crud();
        $response = $crud->edit_user_details(htmlspecialchars($_POST['name']),htmlspecialchars($_POST['surname']),htmlspecialchars($_POST['password']));
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }










    //Edit Home Screen
    if ($_GET['operation'] == 'edit_home_screen'){
        $crud = new crud();
        if ($_FILES['my_file']['size'] > 0){
            $response = $crud->edit_home_screen($_FILES['my_file'],$_POST['title'],$_POST['content']);
            if ($response['status'] == TRUE){
                echo data_message('success','index.php?page=home_bg');
                die();
            }
            else{
                echo data_message('error_message','index.php?page=home_bg',$response['error_message']);
                die();
            }
        }
        else{
            $response = $crud->edit_home_screen(NULL,$_POST['title'],$_POST['content']);
            if ($response['status'] == TRUE){
                echo data_message('success','index.php?page=home_bg');
                die();
            }
            else{
                echo data_message('error','index.php?page=home_bg');
                die();
            }
        }
    }



    //Edit Index Short About
    if ($_GET['operation'] == 'index_short_about'){
        $crud = new crud();
        if ($_FILES['my_file']['size'] > 0){
            $response = $crud->index_short_about($_FILES['my_file'],$_POST['title'], $_POST['sub_title'], $_POST['content']);
            if ($response == TRUE){
                echo data_message('success');
                die();
            }
            else{
                echo data_message('error');
                die();
            }
        }
        else{
            $response = $crud->index_short_about(NULL,$_POST['title'],$_POST['sub_title'], $_POST['content']);
            if ($response == TRUE){
                echo data_message('success');
                die();
            }
            else{
                echo data_message('error');
                die();
            }
        }
    }


    if ($_GET['operation'] == 'create_work_stats'){
        $crud = new crud();
        $response = $crud->create_stats(htmlspecialchars($_POST['icon']),$_POST['number'],htmlspecialchars($_POST['content']));
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }


    if ($_GET['operation'] == 'edit_work_stats'){
        $crud = new crud();
        $response = $crud->edit_stats(htmlspecialchars($_POST['icon']),$_POST['number'],htmlspecialchars($_POST['content']),$_POST['id']);
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }

    if ($_GET['operation'] == 'delete_work_stats' && isset($_POST['data_id'])){
        $crud = new crud();
        $response = $crud->delete_stats($_POST['data_id']);
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }



    if($_GET['operation'] == 'create_why_us'){
        $crud = new crud();
        $response = $crud->create_why_us(htmlspecialchars($_POST['title']),htmlspecialchars($_POST['content']));
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }



    if($_GET['operation'] == 'edit_why_us'){
        $crud = new crud();
        $response = $crud->edit_why_us(htmlspecialchars($_POST['title']),htmlspecialchars($_POST['content']),$_POST['id']);
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }


    if($_GET['operation'] == 'delete_why_us'){
        $crud = new crud();
        $response = $crud->delete_why_us($_POST['data_id']);
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }


    if ($_GET['operation'] == 'create_what_we_do'){
        $crud = new crud();
        $response = $crud->create_what_we_do(htmlspecialchars($_POST['icon']),htmlspecialchars($_POST['title']),htmlspecialchars($_POST['content']));
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }


    if ($_GET['operation'] == 'edit_what_we_do' && isset($_GET['id'])){
        $crud = new crud();
        $response = $crud->edit_what_we_do(htmlspecialchars($_POST['icon']),htmlspecialchars($_POST['title']),htmlspecialchars($_POST['content']),$_GET['id']);
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }

    if ($_GET['operation'] == 'delete_what_we_do' && isset($_POST['data_id'])){
        $crud = new crud();
        $response = $crud->delete_what_we_do($_POST['data_id']);
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }


    //About Page
    if ($_GET['operation'] == 'about'){
        $crud = new crud();
        $response = $crud->about($_POST['title'],$_POST['content']);
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }


    //For Business Partners
    if ($_GET['operation'] == 'create_business_partners'){
        $crud = new crud();
        if ($_FILES['my_file']['size'] > 0){
            $response = $crud->create_business_partners($_FILES['my_file'],$_POST['alt']);
            if ($response == TRUE){
                echo data_message('success');
                die();
            }
            else{
                echo data_message('error');
                die();
            }
        }
        else{
            $response = $crud->create_business_partners(NULL,$_POST['alt']);
            if ($response == TRUE){
                echo data_message('success');
                die();
            }
            else{
                echo data_message('error');
                die();
            }
        }
    }

    if ($_GET['operation'] == 'edit_business_partners'){
        $crud = new crud();
        if ($_FILES['my_file']['size'] > 0){
            $response = $crud->edit_business_partners($_FILES['my_file'],$_POST['alt'],$_GET['id']);
            if ($response == TRUE){
                echo data_message('success');
                die();
            }
            else{
                echo data_message('error');
                die();
            }
        }
        else{
            $response = $crud->edit_business_partners(NULL,$_POST['alt'],$_GET['id']);
            if ($response == TRUE){
                echo data_message('success');
                die();
            }
            else{
                echo data_message('error');
                die();
            }
        }
    }



    //For Business Partners
    if ($_GET['operation'] == 'delete_business_partners'){
        $crud = new crud();

            $response = $crud->delete_business_partners($_POST['data_id']);
            if ($response == TRUE){
                echo data_message('success');
                die();
            }
            else{
                echo data_message('error');
                die();
            }
        }


    //For Blog
    if ($_GET['operation'] == 'create_blog'){
        $crud = new crud();
        if ($_FILES['my_file']['size'] > 0) {
            $response = $crud->create_blog($_FILES['my_file'], $_POST['title'], $_POST['content'], $_POST['meta_description'], $_POST['meta_keywords']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
        }
        else{
            $response = $crud->create_blog(NULL, $_POST['title'], $_POST['content'], $_POST['meta_description'], $_POST['meta_keywords']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
        }
    }



    //For Blog
    if ($_GET['operation'] == 'edit_blog'){
        $crud = new crud();
        if ($_FILES['my_file']['size'] > 0) {
            $response = $crud->edit_blog($_FILES['my_file'], $_POST['title'], $_POST['content'], $_POST['meta_description'], $_POST['meta_keywords'],$_GET['id']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
        }
        else{
            $response = $crud->edit_blog(NULL, $_POST['title'], $_POST['content'], $_POST['meta_description'], $_POST['meta_keywords'],$_GET['id']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
        }
    }

    //For Business Partners
    if ($_GET['operation'] == 'delete_blog'){
        $crud = new crud();
        $response = $crud->delete_blog($_POST['data_id']);
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }



    //For fileds_of_activity
    if ($_GET['operation'] == 'create_fileds_of_activity'){
        $crud = new crud();
            $response = $crud->create_fileds_of_activity($_POST['title'], $_POST['content']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
    }

    if ($_GET['operation'] == 'edit_fileds_of_activity'){
        $crud = new crud();
        $response = $crud->edit_fileds_of_activity($_POST['title'], $_POST['content'],$_GET['id']);
        if ($response == TRUE) {
            echo data_message('success');
            die();
        } else {
            echo data_message('error');
            die();
        }
    }


    if ($_GET['operation'] == 'delete_fileds_of_activity'){
        $crud = new crud();
        $response = $crud->delete_fileds_of_activity($_POST['data_id']);
        if ($response == TRUE) {
            echo data_message('success');
            die();
        } else {
            echo data_message('error');
            die();
        }
    }


    //For Project
    if ($_GET['operation'] == 'create_project'){
        $crud = new crud();
        if ($_FILES['my_file']['size'] > 0) {
            $response = $crud->create_project($_FILES['my_file'], $_POST['title'], $_POST['time'], $_POST['content'], $_POST['status']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
        }
        else{
            $response = $crud->create_project(NULL, $_POST['title'], $_POST['time'], $_POST['content'],$_POST['status']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
        }
    }

    if ($_GET['operation'] == 'edit_project' && isset($_GET['id'])){
        $crud = new crud();
        if ($_FILES['my_file']['size'][0] > 0) {
            $response = $crud->edit_project($_FILES['my_file'],$_POST['title'], $_POST['time'], $_POST['content'], $_POST['status'], $_GET['id']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
        }
        else{
            $response = $crud->edit_project(NULL, $_POST['title'], $_POST['time'], $_POST['content'], $_POST['status'], $_GET['id']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                var_dump($response);
                die();
                echo data_message('error');
                die();
            }
        }
    }


    if ($_GET['operation'] == 'delete_project' && isset($_POST['data_id'])){
        $crud = new crud();
            $response = $crud->delete_project($_POST['data_id']);
            if ($response == TRUE) {
                echo data_message('success');
                die();
            } else {
                echo data_message('error');
                die();
            }
    }





    //Contact Form

    if ($_GET['operation'] == 'create_contact_form'){
        $crud = new crud();
        $response = $crud->create_contact_form(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['surname']), htmlspecialchars($_POST['mail']),
            htmlspecialchars($_POST['phone']), htmlspecialchars($_POST['message']));
        if ($response == TRUE){
            echo data_message('success');
            die();
        }
        else{
            echo data_message('error');
            die();
        }
    }



    if ($_GET['operation'] == 'delete_contact_form' && isset($_POST['data_id'])){
        $crud = new crud();
        $response = $crud->delete_contact_form($_POST['data_id']);
        if ($response == TRUE) {
            echo data_message('success');
            die();
        } else {
            echo data_message('error');
            die();
        }
    }









}
?>