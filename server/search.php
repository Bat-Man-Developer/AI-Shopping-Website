<?php
// Establish database connection
$conn = new PDO("mysql:host=localhost;dbname=newstuffsa_database", 'root', '');

if (isset($_POST["searchButton"])) {
    $str = $_POST["searchInput"];

    // Prepare SQL query with placeholders to prevent SQL injection
    $sth = $conn->prepare("SELECT * FROM newstuffsa_table WHERE fldproductname = :str");
    $sth->bindParam(':str', $str); // Bind parameter to avoid SQL injection
    $sth->execute();

    if ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
        <br><br><br>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><?php echo $row['fldproductname']; ?></td>
                <td><?php echo $row['fldproductdescription']; ?></td>
            </tr>
        </table>
    <?php } else {
        echo "Product not found";
    }
}
?>