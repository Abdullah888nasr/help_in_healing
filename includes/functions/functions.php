<?php function tableSearch($conn, $sql){
    $result = mysqli_query($conn, $sql);
    $output = "
    <table>
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Department</th>
            <th>Action</th>
        </tr>";
    if($result):
        if(mysqli_num_rows($result) > 0):
            while($row = mysqli_fetch_array($result)):
                $output .= '<tr>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['city'] . '</td>
                                <td>' . $row['address'] . '</td>
                                <td>' . $row['phone'] . '</td>
                                <td>' . $row['department'] . '</td>
                                <td>
                                    <a href="index.php?action=edit&doctorId='.$row['doctorId'].'" class="editDoctor">*</a>
                                    <a href="index.php?action=delete&doctorId='.$row['doctorId'].'"  class="deleteDoctor confirm">x</a>
                                </td>
                            </tr>';
            endwhile;
        else:
            $output .= '<tr>
                            <td colspan="6">No doctor found</td>
                        </tr>';
        endif;
    endif;
    $output .= '</table>';
    echo $output;
}
function ver($s){
    $str = strip_tags($s);
    $str = filter_var(trim($s), FILTER_SANITIZE_STRING);
    return $str;
}

function selectForm($select1, $select2){
    if($select1 === $select2):
        echo 'selected';
    endif;
}