<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['btn-delete'])){
            $deletedrecord = $cart->deleteCart($_POST['item_id']);
        }
    }
?>
    <section id="cart py-3">
        <div class="container my-3">
            <h2 class="my-3">Shopping Cart</h2>
                <div class="row py-2 my-2">
                    <div class="col-md-8">
                        <?php
                            foreach ($product->getData('cart') as $item):
                                $Cart = $product->getCartProduct($item['item_id']);
                                $subTotal[] = array_map(function($item){
                        ?>
                            <div class="row border-top py-3">
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo $item['item_image'] ?? "./images/phone3.jpeg" ?>" style="height: 120px;" alt="cart" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <h5><?php echo $item['item_name'] ?? "Unknown"?></h5>
                                    <small class="text-success">In Stocks</small>
                                    <div class="d-flex">
                                        <div class="rating text-warning">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2 my-2">
                                        <div class="col-6">
                                        <form method="post">
                                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                                <button name="btn-delete" class="btn btn-danger form-control">Delete</button>
                                        </form>
                                        </div>
                                        <div class="col-6">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right">
                                    <div class="text-danger">
                                        <span class="product_price" data-id="<?php echo $item['item_id'] ?? '0';?>">&#8377;&nbsp;<?php echo $item['item_price'] ?? 0 ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                            return $item['item_price'];
                        }, $Cart);
                            endforeach;
                        ?>
                    </div>
                        <div class="col-md-4">
                            <div class="sub-total border text-center mt-2">
                                <h6 class="text-success py-3">
                                    <i class="fas fa-check"></i>&nbsp;Your order is eligible for FREE Delivery.
                                </h6>
                                <div class="my-2">
                                    <h4>Sub-Total (<?php echo isset($subTotal) ? count($subTotal): 0; ?> items)
                                    <br>
                                        <span class="text-warning">&#8377;</span>
                                        <span class="text-danger" id="deal-price">
                                            <?php echo isset($subTotal) ? $cart->getSum($subTotal): 0; ?>
                                        </span>
                                    </h4>
                                    <button class="btn btn-success mt-3 w-75">Proceed To Buy</button>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </section>