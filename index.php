<?php
class Interview
{
    public $title = 'Interview test';
}
$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';
$people = array(
    array('id' => 1, 'first_name' => 'John', 'last_name' => 'Smith', 'email' => 'john.smith@hotmail.com'),
    array('id' => 2, 'first_name' => 'Paul', 'last_name' => 'Allen', 'email' => 'paul.allen@microsoft.com'),
    array('id' => 3, 'first_name' => 'James', 'last_name' => 'Johnston', 'email' => 'james.johnston@gmail.com'),
    array('id' => 4, 'first_name' => 'Steve', 'last_name' => 'Buscemi', 'email' => 'steve.buscemi@yahoo.com'),
    array('id' => 5, 'first_name' => 'Doug', 'last_name' => 'Simons', 'email' => 'doug.simons@hotmail.com')
);
// older versions of php can't find person index
$person = isset($_POST['person']) ? $_POST['person'] : null;
// created instance of interview to access property
$interview = new Interview;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Interview test</title>
    <style>
        body {
            font: normal 14px/1.5 sans-serif;
        }
    </style>
</head>

<body>
    <!-- called public property instead of static-->
    <h1><?php echo $interview->title; ?></h1>

    <?php
    // Print 10 times
    // fixed counter
    for ($i = 0; $i < 10; $i++) {
        // fixed concatenation
        echo '<p>' . $lipsum . '</p>';
    }
    ?>

    <hr>

    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
        <p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
        <p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
        <p><input type="submit" value="Submit" /></p>
    </form>

    <?php if ($person) : ?>
    <p><strong>Person</strong> <?php echo $person['first_name']; ?>, <?php echo $person['last_name']; ?>, <?php echo $person['email']; ?></p>
    <?php endif; ?>

    <hr>

    <table>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person) : ?>
            <!-- fixed person calling object properties-->
            <tr>
                <td><?php echo $person['first_name']; ?></td>
                <td><?php echo $person['last_name']; ?></td>
                <td><?php echo $person['email']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html> 