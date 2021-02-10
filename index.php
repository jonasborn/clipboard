<?php

require_once __DIR__ . "/IdGenerator.php";
$dir = __DIR__ . "/pastes";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "write.php";
    exit();
} else {
    if (isset($_GET["id"])) {
        require_once "read.php";
        exit();
    }
}

?>


<html>
<head>
    <title>Sign Up Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<form action="" method="get">
    <label>
        Id
        <br>
        <input id="id" name="id">
    </label>
    <br>
    <input type="submit" value="Open" id="submit">
</form>
<br><br>

<form action="" enctype="multipart/form-data" method="post">
    <label>
        Text
        <br>
        <textarea name="text"></textarea>
    </label>
    <br>
    <label>
        File
        <br>
        <input type="file" name="file">
    </label>
    <br>
    <input type="submit" value="Save" id="submit">
</form>

<script>
    document.getElementById("id").focus();
</script>

</body>
</html>