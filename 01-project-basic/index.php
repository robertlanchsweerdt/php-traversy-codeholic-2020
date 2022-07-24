<?php
    // create constants
    // because working on a local host, the DB info will be included here.
    // Normally, for security reasons, you would set a .env if working on a live database web server like Linode, Heroku or Firebase
    define('DB_HOST', 'localhost');
    define('DB_USER', 'php_master');
    define('DB_PASS', '123456');
    define('DB_NAME', 'products_crud');

    $options = [
        PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES  => FALSE
    ];

    // set the DSN (Data Source Name)
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

    // create a PDO / connection instance
    // including $options is an alternative to 'setAttribute'
    $conn = new PDO($dsn, DB_USER, DB_PASS, $options);

    // set-up sql query
    $sql = 'SELECT * FROM products ORDER BY price ASC';

    // when wanting to run a query, then use 'prepare' stmts
    $stmt = $conn->prepare($sql);

    // execute the query
    // 'execute' syntax is better to use if making changes to the database schema
    $stmt->execute();

    // fetch all instances and HOW you'd like to fetch it
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles.css">

    <title>Products CRUD</title>

</head>

<body>
    <h1>Products CRUD</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Created Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product){
        echo "    
            <tr>
                <th scope='row'>{$product['id']}</th>
                <td>{$product['title']}</td>
                <td>{$product['description']}</td>
                <td>{$product['image']}</td>
                <td>{$product['price']}</td>
                <td>{$product['create_date']}</td>
                <td class='d-flex gap-2'>
                <button type='button' class='btn btn-primary'>Edit</button>
<button type='button' class='btn btn-danger'>Delete</button></td>
            </tr>";
        }?>
        </tbody>
    </table>

</body>

</html>