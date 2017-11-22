<?php

require_once 'Database.php';
require_once 'Session.php';
require_once 'Cookie.php';

class User
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addUser($name, $email, $password, $mobile, $college_name, $degree, $branch, $city, $gender)
    {
        if ($name && $email && $password && $mobile) {
            $query = "INSERT INTO user (NAME,EMAIL,PASSWORD,MOBILE,COLLEGE_NAME,DEGREE,BRANCH,CITY,GENDER)
                    VALUES('$name', '$email', '$password', '$mobile', '$college_name', '$degree', '$branch', '$city', '$gender')";
            return $this->db->insert($query);
        }

        return $this->showError('fields are missing');
    }

    public function addAdmin($name, $email, $password, $mobile)
    {
        if ($name && $email && $name && $mobile) {
            $query = "INSERT INTO uadmin (NAME,EMAIL,PASSWORD,MOBILE) VALUES ('$name','$email','$password','$mobile')";
            return $this->db->insert($query);
        }
    }

    private function showError($error_msg)
    {
        return $error_msg;
    }

    public function login($email_login, $password_login, $rem = false)
    {
        if ($email_login && $password_login) {
            $query = "SELECT * FROM user WHERE EMAIL ='$email_login' AND PASSWORD = '$password_login'";
            $result = $this->db->get($query);
            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_assoc($result);
                Session::put('user', $row);
                Session::put('login_status', true);

                if ($rem) {
                    $this->rememberUser($email_login);
                }
                return true;
            } else {
                return $this->showError('invalid credentials');
            }
        }
        return $this->showError('please provide email and password');

    }

    public function loginAdmin($email_login, $password_login, $rem = false)
    {
        if ($email_login && $password_login) {
            $query = "SELECT * FROM uadmin WHERE EMAIL ='$email_login' AND PASSWORD = '$password_login'";
            $result = $this->db->get($query);
            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_assoc($result);
                Session::put('user', $row);
                Session::put('login_status', true);

                if ($rem) {
                    $this->rememberUser($email_login);
                }
                return true;
            } else {
                return $this->showError('invalid credentials');
            }
        }
        return $this->showError('please provide email and password');

    }

    public function rememberUser($email)
    {
        Cookie::put('user_email', $email);
        Cookie::put('user_login_status', true);

    }

    public function autoLogin($status)
    {
        if ($status) {
            $email = Cookie::get('user_email');
            $query = "SELECT USER_ID,NAME,EMAIL FROM user WHERE EMAIL ='$email'";
            $result = $this->db->get($query);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                Session::put('user', $row);
                Session::put('login_status', true);
                return true;
            }
        }
        return false;
    }

    public function logout()
    {
        Session::delete('user');
        Session::delete('login_status');
        Cookie::delete('user_email');
        Cookie::delete('user_login_status');
        return true;
    }

    public function deleteUser($id = '')
    {
        return $this->db->delete("DELETE FROM user WHERE id = " . $id);
    }

    public function deleteAllUsers()
    {
        return $this->db->delete("DELETE FROM user");
    }

    public function getProfileDetails($colname, $value)
    {
        if ($colname && $value) {
            return $this->db->getByValue('user', $colname, $value);
        }
        return $this->showError('user not found');
    }

    public function getEveryUsers()
    {
        return $this->db->getAll('user');
    }


    public function forgotPassword($email = '')
    {
        if ($email) {
            $result = $this->db->getByValue('user', 'EMAIL', $email);
            if (is_resource($result)) {
                $row = mysqli_fetch_assoc($result);
                Session::put('temp_session', $row);
                return true;
            } else {
                $this->showError('could not found any users');
            }
        }
        return $this->showError('please provide your email');

    }

    public function isUserLoggedIn()
    {
        return Session::get('login_status');
    }

}