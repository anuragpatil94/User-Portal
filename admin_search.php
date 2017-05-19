<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/31/2017
 * Time: 8:10 PM
 */
//----------------------------------------------------------------------------------------------------------Admin Search
//------------------------------------------------------------------------------------------------------------REGEX USED
$output = '';
if (isset($_POST['search'])) {
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
    $query = mysqli_query($con, "SELECT * FROM users WHERE first_name LIKE '%$searchq%' OR  users.last_name LIKE '%$searchq%'");
    $count = mysqli_num_rows($query);
    if ($count == 0) {
        $output = 'There were no search results!';
    } else {
        while ($row = mysqli_fetch_array($query)) {
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            if ($fname === 'admin' and $lname == 'admin') {
                continue;
            }
            $id = $row['user_id'];
            $output .= '<div> ' . ucfirst($fname) . ' ' . ucfirst($lname) . '</div>';

        }
    }
}
?>
    <form action="admin.php" method="post">
        <input type="text" name="search" placeholder="Search for users">
        <input type="submit" class="button" value="Search">
    </form>
<?php
print ($output);
?>