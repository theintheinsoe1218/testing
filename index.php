<?php
$api_url = 'https://fakestoreapi.com/products';
$json_data = file_get_contents($api_url);
$response_data = json_decode($json_data);
// $user_data = $response_data->data;


// print_r($response_data[0]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item float-end">
                        <a class="nav-link" href="checkout.php"><i class="fa-solid fa-cart-shopping text-white"></i><sup id="count" class="text-danger fs-6 fw-bold"></sup></a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-center mt-3 ">All Products</h1>
    
    <div class="container mt-3">
        <div class="row mx-auto">
            <?php
            foreach($response_data as $product){
            ?>
            
            <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $product->image ?>" class="card-img-top" height="250" alt=""/>
                        <div class="card-body">
                            <!-- <h5 class="card-title"><?= $product->title ?></h5> -->
                            <p class="card-text"><?=  "$".$product->price ?></p>
                            <button data-id="<?= $product->id ?>" data-price="<?= $product->price ?>" data-image="<?= $product->image ?>"  class="btn btn-primary cart">Add To Cart</button>
                        </div>
                    </div>
                </div>
            <?php
        }
        ?> 
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/script.js" type="text/javascript"></script>
    
</body>

</html>