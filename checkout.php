<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
                        <a class="nav-link" href="checkout.php"><i class="fa-solid fa-cart-shopping text-white"></i> <sup id="count" class="text-danger fs-6 fw-bold"></sup></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-9 mx-auto">
                <table class="table table-dark table-stripted">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Photo</th>
                            <th>Prodcut Price</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <button class="btn btn-dark order">Order</button>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            getdata();
            function getdata() {
                let productStr = localStorage.getItem("products")
                if (productStr) {
                    let productArr = JSON.parse(productStr);
                    let data = '';
                    let total = 0;
                    $.each(productArr, function(i, v) {
                        let id = v.id;
                        let price = v.price;
                        let qty = v.qty;
                        let image = v.image;
                        // console.log(id,price,qty);
                        data += `
                        <tr>
                            <td>${id}</td>
                            <td><img src="${image}" width="50" height="50" /></td>
                            <td>$${price}</td>
                            <td><button class="btn btn-primary min" data-i="${i}">-</button>
                                ${qty}
                                <button class="btn btn-primary max" data-i="${i}">+</button>
                            </td>
                            <td>$${price*qty}</td>
                        </tr>
                        
                        `;

                        total += price * qty;
                    })
                    data += `
                        <tr>
                            <td colspan="4">Total</td>
                            <td>$${total}</td>
                        </tr>
                    `;
                    $("tbody").html(data);
                }
            }

            $("tbody").on("click", ".max", function() {
                let product_i = $(this).data('i');
                // console.log(product_i);
                let productStr = localStorage.getItem("products");
                let productArr = JSON.parse(productStr);
                $.each(productArr, function(i, v) {
                    if (product_i == i) {
                        v.qty++;
                    }
                    let data = JSON.stringify(productArr);
                    localStorage.setItem("products", data);
                    getdata();
                })

            });

            $("tbody").on("click", ".min", function() {
                let product_i = $(this).data("i");
                // console.log(product_i);
                let productStr = localStorage.getItem("products");
                let productArr = JSON.parse(productStr);
                $.each(productArr, function(i, v) {
                    if (product_i == i) {
                        v.qty--;
                        if (v.qty == 0) {
                            productArr.splice(product_i, 1);
                        }
                    }
                    let data = JSON.stringify(productArr);
                    localStorage.setItem("products", data);
                    getdata();
                })
            });

            $(".order").click(function() {
                let ans = confirm("Are You Sure Order?");
                if (ans) {
                    localStorage.clear();
                    getdata();
                }
            });
        })
    </script>
</body>

</html>