<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Working with Files</title>

    <!-- link to Bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>

    <div id="site-wrapper">
        <div class="container">

            <?php include_once('./partials/header.php'); ?>

            <main>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Home Page</h1>
                        <p class="lead">This is the mock home page.</p>
                    </div>
                </div>

                <?php
                    $contents = file_get_contents('https://jsonplaceholder.typicode.com/posts') ;

                    print_r($contents);
                ?>
            </main>

            <?php include_once('./partials/footer.php'); ?>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

</body>


</body>

</html>