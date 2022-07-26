<?php
    // create constants
    // because working on a local host, the DB info will be included here.
    // Normally, for security reasons, you would set a .env if working on a live database web server like Linode, Heroku or Firebase
    define('DB_HOST', 'localhost');
    define('DB_USER', 'php_master');
    define('DB_PASS', '123456');
    define('DB_NAME', 'products_crud');

    $options = [
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_OBJ,
        // PDO::ATTR_EMULATE_PREPARES      => TRUE
    ];

    // set the DSN (Data Source Name)
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

    // set-up form variables
    $title = $_POST['productTitle'] ?? "";
    $description = $_POST['productDesc'] ?? "";
    $price = $_POST['productPrice'] ?? "";
    $date = date('Y-m-d H:i:s') ?? "";
    
    // set-up errors array
    $errors = [];

    // $title = $description = $price = "";

    if(isset($_POST['submit'])){
        // another 'if' option without needing
        // to attach name='submit' to 
        // submit button:
        // if($_SERVER['REQUEST_METHOD'] === 'POST')

        echo 'submitted' . '</br>';

        // set-up form variables
        // $title = $_POST['productTitle'];
        // $description = $_POST['productDesc'];
        // $price = $_POST['productPrice'];
        // $date = date('Y-m-d H:i:s');

        // validation
        if(!$title){
            $errors[] = "Product title is required";
        }
        if(!$price){
            $errors[] = "Product price is required";
        }

        if(empty($errors)){
            echo 'all fields filled out';
            try{
                // create a PDO / connection instance
                // including $options is an alternative to 'setAttribute'
                $conn = new PDO($dsn, DB_USER, DB_PASS,$options);
        
                //set-up query
                // do NOT insert the variables
                // for security, insert 'prepared statements'
                // for PDO, use 'named characters' as ref for the variables
                $query = "INSERT INTO products (title, description, image, price, create_date) VALUES (:title, :desc, :img, :price, :date)";
        
                // using the established connection, prepare the query and save it in a stmt variable
                $stmt = $conn->prepare($query);
        
                // bind the variable key to the named character to use implicit binding
                $bindData = [
                    ':title'    => $title,
                    ':desc'     => $description,
                    ':img'      => '',
                    ':price'    => $price,
                    ':date'     => $date
                ];
    
                // explicit binding
                // if use explicit, then use 'bindValue' over 'bindParam'
                // better to use explicit if complex queries
                // peculiar column types that require an exact type operand
                // see: https://phpdelusions.net/pdo
    
                /**
                 * $stmt->bindValue(':title', $title, PDO::PARAM_STR);
                 * $stmt->bindValue(':img', '');
                 * $stmt->bindValue(':desc', $description, PDO::PARAM_STR);
                 * $stmt->bindValue(':price', $price);
                 * $stmt->bindValue(':date', $date);
                 * 
                 * $stmt->execute();
                 *  
                 * */ 
        
                // implicit binding and not needing to use 
                // 'bindValue' or 'bindParam'
                // implicit default to PDO::PARAM_STR
                $stmt->execute($bindData);

                // clear fields
                $title = $description = $price = "";
        
            } catch(PDOException $e){
                echo 'Connection failed: ' . $e->getMessage();
                exit;
            }
        }     
    }
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
    <h1>Create new product</h1>

    <!-- error message handling -->
    <?php if(!empty($errors)) {
            foreach($errors as $error){
                echo "<div class='alert alert-danger'>";
                  echo "<p class='m-0'> {$error} </p>";
                echo "</div>";
            }
        }
    ?>

    <form action="create.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="productImage" class="form-label mt-3">Product image</label>
            <input type="file" class="form-control" id="productImage" name="productImage"
                aria-describedby="productImage">
        </div>
        <div class="mb-3">
            <label for="productTitle" class="form-label">Product title</label>
            <input type="text" class="form-control" id="productTitle" name="productTitle" value="<?php echo $title; ?>"
                aria-describedby="productTitle">
        </div>
        <div class="mb-3">
            <label for="productDesc" class="form-label">Product description</label>
            <textarea class="form-control" id="productDesc" name="productDesc"
                aria-describedby="productDesc"><?php echo $description; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Product price</label>
            <input type="number" step="0.01" class="form-control" id="productPrice" name="productPrice"
                value="<?php echo $price; ?>" aria-describedby="productPrice">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- <script>
    const form = document.querySelector('form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        console.log('submitted');
    })
    </script> -->

</body>

</html>