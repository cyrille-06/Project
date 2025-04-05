<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Art Gallery Administration </title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        body {
    font-family: 'Lato', sans-serif;
    background-color: #FFFFFF;
    color: #4E598C;
    text-align: center;
    margin: 0;
    padding: 0;
}

h1 {
    font-weight: 700;
    margin: 20px 0;
}

a {
    display: inline-block;
    margin: 10px;
    padding: 12px 20px;
    text-decoration: none;
    background-color: #4E598C;
    color: #FFFFFF;
    border-radius: 8px;
}

a:hover {
    background-color: #4E598C;
}
footer{
    margin-top: auto;
    padding:20px;
    background-color: #FFFFFF;
    color: #4E598C;
    font-size:14px;
}


    </style>
    <script>
        // j'ai encore rien codé ici
        </script>
</head>
<body>
    <h1>Welcome to Art Gallery Admin</h1>
    <a href="paintings.php">Manage Paintings</a>
    <a href="warehouses.php">Manage Warehouses</a>

</body>
<footer>
    &copy; <?= date("Y") ?> Art Gallery Admin. All rights reserved.
</footer>
</html>
