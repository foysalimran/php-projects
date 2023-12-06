<?php

include_once 'lib/Database.php';

class Register
{

    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addRegister($data, $file)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];

        $permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['photo']['name'];
        $file_size = $file['photo']['size'];
        $file_temp  = $file['photo']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "upload/" . $unique_image;

        if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($file_name)) {
            $msg = "Filds Must Not Be Empty";
            return $msg;
        } elseif ($file_size > 1048567) {
            $msg = "File size must be less than 1MB";
            return $msg;
        } elseif (in_array($file_ext, $permitted) == false) {
            $msg = "You can upload only " . implode(', ', $permitted);
            return $msg;
        } else {
            move_uploaded_file($file_temp, $upload_image);

            $query = "INSERT INTO `tbl_register`( `name`, `email`, `phone`, `photo`, `address`) VALUES ('$name', '$email', '$phone', '$upload_image', '$address')";

            $result = $this->db->insert($query);

            if ($result) {
                $msg = "Registration Successful";
                return $msg;
            } else {
                $msg = "Registration Failed";
                return $msg;
            }
        }
    }

    public function allStudent()
    {
        $query = "SELECT * FROM tbl_register ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getStdById($id)
    {
        $query = "SELECT * FROM tbl_register WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    // Update student
    public function udpdateStudent($data, $file, $id)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];

        $permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['photo']['name'];
        $file_size = $file['photo']['size'];
        $file_temp  = $file['photo']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "upload/" . $unique_image;

        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $msg = "Filds Must Not Be Empty";
            return $msg;
        }
        if (!empty($file_name)) {

            if ($file_size > 1048567) {
                $msg = "File size must be less than 1MB";
                return $msg;
            } elseif (in_array($file_ext, $permitted) == false) {
                $msg = "You can upload only " . implode(', ', $permitted);
                return $msg;
            } else {

                $img_query = "SELECT * FROM tbl_register WHERE id = '$id'";
                $img_res = $this->db->select($img_query);

                if($img_res){
                    while($row = mysqli_fetch_assoc($img_res)){
                        $photo = $row['photo'];
                        unlink($photo);
                    }
                }

                move_uploaded_file($file_temp, $upload_image);


                $query = "UPDATE tbl_register SET name='$name', email='$email', phone='$phone', photo='$upload_image', address='$address' WHERE id = '$id'";

                $result = $this->db->update($query);

                if ($result) {
                    $msg = "Student Update Successful";
                    return $msg;
                } else {
                    $msg = "Update Failed";
                    return $msg;
                }
            }
        } else {
            $query = "UPDATE tbl_register SET name='$name', email='$email', phone='$phone', address='$address' WHERE id = '$id'";

            $result = $this->db->update($query);

            if ($result) {
                $msg = "Student Update Successful";
                return $msg;
            } else {
                $msg = "Update Failed";
                return $msg;
            }
        }
    }
}
