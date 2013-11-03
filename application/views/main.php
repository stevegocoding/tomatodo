<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tomatodo Application</title>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"/>
</head>
<body>


<?php echo $username ?>


<section id="tomatodo-app">

    <header id="header">

        <input id="new-todo" placeholder="What needs to be done?" autofocus>

    </header>


    <section id="main">

        <ul id="todo-list"></ul>

    </section>


    <footer id="footer">

    </footer>


</section>



<script data-main="<?php echo base_url();?>js/main.js" src="<?php echo base_url();?>js/require.js"></script>
</body>
</html>
