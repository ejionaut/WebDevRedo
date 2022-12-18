<?php

 include "config.php";
$sort_column = $_POST['dropdown'];

$sql = "SELECT * FROM 'quiz_list'";


if ($sort_column == 'dateCreated') {
    $sql .= " ORDER BY `quiz_list`.`start_quiz` ASC";

} elseif ($sort_column == 'listed') {
    $sql .= " WHERE `q_display_setting` = 'listed'";

} elseif ($sort_column == 'unlisted'){
    $sql .= " WHERE `q_display_setting` = 'unlisted'";

} elseif ($sort_column == 'subjectNum'){
    $sql .= " WHERE `subject_code` = 'nm'";

} elseif ($sort_column == 'subjectTech'){
    $sql .= " WHERE `subject_code` = 'tp'";

} elseif ($sort_column == 'subjectPer'){
    $sql .= " WHERE `subject_code` = 'pd'";

} elseif ($sort_column == 'subjectApp'){
    $sql .= " WHERE `subject_code` = 'ad'";

} elseif ($sort_column == 'subjectWeb'){
    $sql .= " WHERE subject_code` = 'wd'";

} elseif ($sort_column == 'subjectSoft'){
    $sql .= " WHERE `subject_code` = 'se'";

} else {
    $sql == " ORDER by `subject_code` ASC";

}

$result = mysqli_query($sql);

if(!$result){
    die("Query failed: " . mysqli_error($conn));
}

while($row = mysqli_fetch_assoc($result)){
    //process the data
}

?>