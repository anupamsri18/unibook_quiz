<?php
if (isset($_POST['submit'])) {
    $choice = $_POST['choice'];
    $choicearr = implode(',', $choice);
    echo $choicearr;
    if ($choice === $data['CORRECT_ANSWER']) {
        $user_marks = $user_marks + 1;
        echo $time;

        $put = $user->insertIntoTable('user_answers', 'USER_MARKS', $user_marks);
        $put = $user->insertIntoTable('user_answers', 'USER_ANSWERS', $choicearr);
        $put = $user->insertIntoTable('user_answers', 'USER_ID', Session::get('user')['USER_ID']);
//  $put = $user->insertIntoTable('user_answers', 'TEST_ID', $data['TEST_ID']);
    } else {

    }
}
?>