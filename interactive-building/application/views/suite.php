<!DOCTYPE html>
<?php
$username = "torque";
$password = "k9arf";
$nonsense = "supercalifragilisticexpialidocious";

if (isset($_COOKIE['PrivatePageLogin'])) {
    if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
?>

<head>
    <meta charset="utf-8" />
    <?php
    foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <style type='text/css'>
        body
        {
            font-family: Arial;
            font-size: 14px;
        }
        a {
            color: blue;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover
        {
            text-decoration: underline;
        }
    </style>
</head>

<body>
	<div>

 		<a href='<?php echo site_url('/suites/suites_management')?>'>Manage All Suites</a>
<!--     <a href='http://localhost:8888/Stacking-Plan/index.php/suites/suites_management'>Manage All Suites</a> -->
	</div>
	<div style='height:20px;'></div>
<div>
    <?php echo $output; ?>
</div>
</body>

        <?php
        exit;
    } else {
        echo "Bad Cookie.";
        exit;
    }
}

if (isset($_GET['p']) && $_GET['p'] == "login") {
    if ($_POST['user'] != $username) {
        echo "Sorry, that username does not match.";
        exit;
    } else if ($_POST['keypass'] != $password) {
        echo "Sorry, that password does not match.";
        exit;
    } else if ($_POST['user'] == $username && $_POST['keypass'] == $password) {
        setcookie('PrivatePageLogin', md5($_POST['keypass'].$nonsense));
        header("Location: $_SERVER[PHP_SELF]");
    } else {
        echo "Sorry, you could not be logged in at this time.";
    }
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <?php
    foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <style type='text/css'>
        body
        {
            font-family: Arial;
            font-size: 14px;
        }
        a {
            color: blue;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover
        {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post">
    <label><input type="text" name="user" id="user" /> Name</label><br />
    <label><input type="password" name="keypass" id="keypass" /> Password</label><br />
    <input type="submit" id="submit" value="Login" />
</form>
</body>
</html>
