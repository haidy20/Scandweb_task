<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Product List</title>

    <style type="text/css">
        body {
            background: #f8f9fa;
        }
        .product-card {
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .product-card .card {
            border: none;
            border-radius: 10px;
        }
        .product-card .card-body {
            padding: 1.25rem;
            text-align: center;
        }
        .product-card .delete-checkbox {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        footer {
            bottom: 0;
            position: absolute;
            left: 0;
        }
    </style>
  </head>
  <body class="h-100">
    <div class="container h-100 position-relative">
        <div class="pt-5 mb-2">
            <div class="row">
                <h2 class="col">Product List</h2>
                <div class="ml-auto">
                    <a class="btn btn-primary" href="/add-product">ADD</a>
                    <button type="button" class="btn btn-danger" id="delete-product-btn" onclick="massDelete()">MASS DELETE</button>
                </div>
            </div>
        </div>

        <hr>

        <div class="my-5">
            <?php if ($products) { ?>
                <form id="product_form" action="/delete-product" method="POST">
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <div class="col-md-3 col-sm-6 product-card">
                                <div class="card position-relative">
                                    <input type="checkbox" name="delete-products[]" value="<?= $product['id'] ?>" class="delete-checkbox">
                                    <div class="card-body">
                                        <div class="card-title"><?= $product['SKU'] ?></div>
                                        <div class="card-text"><?= $product['name'] ?></div>
                                        <div class="card-text"><?= number_format($product['price'], 2) ?> $</div>
                                        <?php if ($product['type'] == 'DVD') { ?>
                                            <div class="card-text">Size: <?= $product['size'] ?>MB</div>
                                        <?php } else if ($product['type'] == 'furniture') { ?>
                                            <div class="card-text">Dimensions: <?= $product['height'] . 'x' . $product['width'] . 'x' . $product['length'] ?></div>
                                        <?php } else if ($product['type'] == 'book') { ?>
                                            <div class="card-text">Weight: <?= $product['weight'] ?>KG</div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            <?php } ?>
        </div>

        <footer class="pb-4 text-center w-100">
            <hr>
            <center>Scandiweb Test Assignment</center>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7H4UibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        function massDelete() {
            var form = new FormData($('#product_form')[0]);
            if (form.get('delete-products[]')) {
                $('#product_form').submit();
            }
        }
    </script>
  </body>
</html>
