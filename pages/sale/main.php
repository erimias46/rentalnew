<?php
$redirect_link = "../../";
$side_link = "../../";
include $redirect_link . 'partials/main.php';
include_once $redirect_link . 'include/db.php';
$current_date = date('Y-m-d');
?>

<head>
    <?php
    $title = 'Main Dashboard';
    include $redirect_link . 'partials/title-meta.php'; ?>

    <?php include $redirect_link . 'partials/head-css.php'; ?>
</head>

<body>

    <!-- Begin page -->
    <div class="flex wrapper">

        <?php include $redirect_link . 'partials/menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <?php include $redirect_link . 'partials/topbar.php'; ?>

            <main class="flex-grow p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
                    <a href="add/add_shoes.php" class="block">
                        <div class="card">
                            <div class="flex justify-between items-center w-full bg-blue-600 p-4 rounded-xl">
                                <div>
                                    <h3 class="text-2xl text-white font-bold mb-1">Add Product</h3>
                                    <p class="text-blue-100 text-sm">Add Products</p>
                                </div>

                            </div>
                        </div>
                    </a>
                    <a href="multi.php" class="block">
                        <div class="card">
                            <div class="flex justify-between items-center w-full bg-slate-900 p-4 rounded-xl">
                                <div>
                                    <h3 class="text-2xl text-grey font-bold mb-1">Sale</h3>
                                    <p class="text-gray-400 text-sm">Go to sale details</p>
                                </div>

                            </div>
                        </div>
                    </a>

                    <a href="all_sales.php" class="block">
                        <div class="card">
                            <div class="flex justify-between items-center w-full bg-blue-600 p-4 rounded-xl">
                                <div>
                                    <h3 class="text-2xl text-white font-bold mb-1">All Sales</h3>
                                    <p class="text-blue-100 text-sm">View all sales history</p>
                                </div>

                            </div>
                        </div>
                    </a>

                    <a href="search.php" class="block">
                        <div class="card">
                            <div class="flex justify-between items-center w-full bg-blue-600 p-4 rounded-xl">
                                <div>
                                    <h3 class="text-2xl text-white font-bold mb-1">Search Product</h3>
                                    <p class="text-blue-100 text-sm">Find specific products</p>
                                </div>

                            </div>
                        </div>
                    </a>

                    <a href="search_multi.php" class="block">
                        <div class="card">
                            <div class="flex justify-between items-center w-full bg-slate-900 p-4 rounded-xl">
                                <div>
                                    <h3 class="text-2xl text-grey font-bold mb-1">Multi Search</h3>
                                    <p class="text-gray-400 text-sm">Advanced search options</p>
                                </div>

                            </div>
                        </div>
                    </a>


                    <a href="delivery.php" class="block   ">
                        <div class="card flex items-center justify-center ">
                            <div class="flex justify-between items-center w-full bg-blue-600 p-4 rounded-xl">
                                <div class="text-center">
                                    <h3 class="text-2xl text-white font-bold mb-1">Delivery</h3>
                                    <p class="text-blue-100 text-sm">Manage deliveries</p>
                                </div>
                            </div>
                        </div>
                    </a>





                </div>


                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-full  mt-5">
                    <!-- Shopify Order Breakdown -->
                    <div class=" card bg-slate-900 rounded-lg overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-xl text-grey font-semibold text-center">Daily Sales</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-slate-700 text-gray-300">
                                    <tr>
                                        <th class="p-3 text-left">PRODUCT NAME</th>
                                        <th class="p-3 text-left">SIZE</th>
                                        <th class="p-3 text-left">PRICE</th>
                                        <th class="p-3 text-left">CASH</th>
                                        <th class="p-3 text-left">BANK</th>
                                        <th class="p-3 text-left">METHOD</th>
                                        <th class="p-3 text-left">SOURCE</th>
                                    </tr>


                                </thead>
                                <tbody class="bg-white">

                                    <?php
                                    $current_date = date('Y-m-d');

                                    $sql = "SELECT 'shoes' AS source, sales_id, shoes_name AS Name, sales_date, price, size,cash,bank,method
FROM shoes_sales Where sales_date = '$current_date'


";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $product_name = $row['Name'];
                                        $size = $row['size'];
                                        $price = $row['price'];
                                        $cash = $row['cash'];
                                        $bank = $row['bank'];
                                        $method = $row['method'];
                                        $source = $row['source'];

                                    ?>
                                        <tr class="border-b">
                                            <td class="p-3"><?php echo $product_name; ?></td>
                                            <td class="p-3"><?php echo $size; ?></td>
                                            <td class="p-3"><?php echo $price; ?></td>
                                            <td class="p-3"><?php echo $cash; ?></td>
                                            <td class="p-3"><?php echo $bank; ?></td>
                                            <td class="p-3"><?php echo ucfirst($method); ?></td>
                                            <td class="p-3"><?php echo ucfirst($source); ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>




                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Ecommerce Advertising Breakdown -->
                    <div class=" card bg-slate-800 rounded-lg overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-xl text-grey font-semibold text-center">Summary Information</h2>
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4">
                            <!-- Google Stats -->
                            <div class="bg-white p-4 rounded-lg text-center">
                                <?php


                                
                               


                                ?>


                                <div class="text-2xl font-bold"> $
                                    <?php echo isset($total_price2) ? $total_price2 : 0; ?>
                                </div>
                                <div class="text-gray-500 text-sm">Daily Sales Amount</div>
                                <div class="mt-4 text-2xl font-bold"></div>
                                <div class="text-gray-500 text-sm">Number of Sales</div>
                            </div>

                            <!-- FB Stats -->
                            <div class="bg-blue-600 p-4 rounded-lg text-center text-white">
                                <div class="text-2xl font-bold"><?php echo  isset($total_bank2) ? $total_bank2 : 0; ?> Birr</div>
                                <div class="text-blue-100 text-sm">Bank</div>
                                <div class="mt-4 text-2xl font-bold"><?php echo  isset($total_cash2) ? $total_cash2 : 0; ?> Birr</div>
                                <div class="text-blue-100 text-sm">Cash</div>
                            </div>

                            <!-- Snapchat Stats -->
                            <!-- <div class="bg-white p-4 rounded-lg text-center">
                                <div class="text-2xl font-bold">$40.99</div>
                                <div class="text-gray-500 text-sm">Snapchat Ads Purchases Value</div>
                                <div class="mt-4 text-2xl font-bold">12</div>
                                <div class="text-gray-500 text-sm">Snapchat Ads Purchases</div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </main>

            <?php include $redirect_link . 'partials/footer.php'; ?>

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>

    <?php include $redirect_link . 'partials/customizer.php'; ?>

    <?php include $redirect_link . 'partials/footer-scripts.php'; ?>

</body>

</html>