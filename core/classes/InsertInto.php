<?php
require_once 'Database.php';
require_once 'Session.php';
require_once 'Cookie.php';

class InsertInto
{
    public $db;


    public function __construct()
    {
        $this->db = new Database();
    }


    public function testTaken($user_id, $user_name, $test_taken, $user_marks)
    {
        if ($user_id && $test_taken && $user_marks) {
            $query = "INSERT INTO test_taken (USER_ID,USER_NAME,TEST_TAKEN,USER_MARKS)
                      VALUES('$user_id','$user_name','$test_taken','$user_marks')";
            return $this->db->insert($query);
        }

        return $this->showError('fields are missing');
    }

    public function addFeedback($user_id, $user_name, $feedback)
    {
        if ($user_id && $user_name && $feedback) {
            $query = "INSERT INTO feedback (USER_ID,NAME,FEEDBACK)
                    VALUES('$user_id','$user_name','$feedback')";
            return $this->db->insert($query);
        }

        return $this->showError('fields are missing');
    }

    public function addHistory($user_id, $user_name, $user_email, $current_login_time)
    {
        if ($user_id && $user_name && $user_email && $current_login_time) {
            $sql = $this->db->get("SELECT USER_ID FROM history WHERE USER_ID='$user_id'");
            $row = mysqli_num_rows($sql);
            if ($row >= 1) {
                $query = ("UPDATE history SET LAST_LOGIN_TIME='$current_login_time' WHERE USER_ID='$user_id' ");
                return $this->db->update($query);
            } else {
                $query = "INSERT INTO history (USER_ID,NAME,EMAIL,LAST_LOGIN_TIME)
                    VALUES('$user_id','$user_name','$user_email','$current_login_time')";
                return $this->db->insert($query);
            }
        }
    }

    public function updateUserDetails($user_id, $user_name, $user_email, $user_password, $user_mobile, $user_college_name, $user_degree, $user_branch, $user_city, $user_gender)
    {
        if ($user_id) {
            $sql = $this->db->get("SELECT USER_ID FROM user WHERE USER_ID='$user_id'");
            $row = mysqli_num_rows($sql);
            $count = 0;
            if ($row >= 1 && $user_name) {
                $query = ("UPDATE user SET NAME='$user_name' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            if ($row >= 1 && $user_email) {
                $query = ("UPDATE user SET EMAIL='$user_email' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            if ($row >= 1 && $user_mobile) {
                $query = ("UPDATE user SET EMAIL='$user_email' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            if ($row >= 1 && $user_password) {
                $query = ("UPDATE user SET EMAIL='$user_email' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            if ($row >= 1 && $user_college_name) {
                $query = ("UPDATE user SET COLLEGE_NAME='$user_college_name' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            if ($row >= 1 && $user_degree) {
                $query = ("UPDATE user SET DEGREE='$user_degree' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            if ($row >= 1 && $user_branch) {
                $query = ("UPDATE user SET BRANCH='$user_branch' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            if ($row >= 1 && $user_city) {
                $query = ("UPDATE user SET CITY='$user_city' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            if ($row >= 1 && $user_gender) {
                $query = ("UPDATE user SET GENDER='$user_gender' WHERE USER_ID='$user_id' ");
                $this->db->update($query);
                $count++;
            }
            $result = $this->db->get("SELECT * FROM user WHERE USER_ID='$user_id'");
            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_assoc($result);
                Session::put('user', $row);
                Session::put('login_status', true);

            }
            return $count;
        }
    }


    public function insertIntoTable($tablename, $colname, $value)
    {
        if ($tablename && $colname && $value) {
            $query = "INSERT INTO " . $tablename . "(" . $colname . ") VALUE( '" . $value . "')";
            return $this->db->insert($query);
        }
        return $this->showError('Table not found');
    }

    public function addQuestion($tablename, $question, $question_img, $a, $option_a_img, $b, $option_b_img, $c, $option_c_img, $d, $option_d_img, $correct_answer , $sn , $title,$u_id)
    {
        if ($tablename|| $question_img || $a || $option_a_img || $b|| $option_b_img || $c|| $option_c_img || $d|| $option_d_img || $correct_answer) {
            $query = "INSERT INTO " . $tablename . "(QUESTION,ques_img,A,img_a,B,img_b,C,img_c,D,img_d,CORRECT_ANSWER,sn,title,unique_id) VALUE( '" . $question . "','" . $question_img . "','" . $a . "','" . $option_a_img . "','" . $b . "','" . $option_b_img . "','" . $c . "','" . $option_c_img . "','" . $d . "','" . $option_d_img . "','" . $correct_answer . "' ,'".$sn."', '".$title."', '".$u_id."')";
            return $this->db->insert($query);
        }
        return $this->showError('Table not found');
    }

    private function showError($error_msg)
    {
        return $error_msg;
    }
}