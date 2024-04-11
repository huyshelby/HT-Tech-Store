<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_page ?></title>
    <style>
        body{
            margin: 0;
            /* min-height: 100vh; */
        }
        #container {
            /* width: 1200px; */
            margin: auto;
        }

        /* #container>header {
            height: 150px;
            background-color: darkcyan;
        } */

        #container>nav {
            height: 60px;
            background-color: orange;
        }

        #container>main {
            min-height: 300px;
            display: flex;
        }

        #container>main>article {
            width: 75%;
            background-color: lightblue;
        }

        #container>main>aside {
            width: 25%;
            background-color: lightgray;
        }

        /* #container>footer {
            height: 90px;
            background-color: darkcyan
        } */
    </style>
</head>

<body>
    <div id="container">
        <header> <?php require_once "header.php" ?></header>
        <nav> <?php require_once "menu.php" ?> </nav>
        <main>
            <article><?php include $view_content ?></article>
            <aside><?php require "aside.php" ?></aside>
        </main>
        <footer><?php require "footer.php" ?></footer>
    </div>
</body>

</html>