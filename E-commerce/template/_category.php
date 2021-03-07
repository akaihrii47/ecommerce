<?php
    $product_shuffle = $product->getData();
    shuffle($product_shuffle);

    if($_SERVER['REQUEST_METHOD']== 'POST'){
      if(isset($_POST['add-cart'])){
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
      }
    }

      $in_cart = $cart->getCardId($product->getData('cart'));

?>
    <section id="categories">
        <div class="container my-3">
            <h2>Tech Accessories</h2>
            <div id="filters" class="button-group text-right">
                <button class="btn is-checked" data-filter="*">All Brand</button>
                <button class="btn" data-filter=".mobile">Mobiles</button>
                <button class="btn" data-filter=".laptop">Laptops</button>
                <button class="btn" data-filter=".wearable">Wearable Tech</button>
            </div>
            
            <div class="grid">
              <?php array_map(function($item) use($in_cart) { ?>
                <div class="grid-item border <?php echo $item['item_type'] ?? "Categories";?>">
                 <div class="item py-2" style="width: 200px;">
                  <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']);?>">
                        <img src="<?php echo $item['item_image'] ??"./images/phone1.jpeg"; ?>" alt="product1" class="img-fluid">
                    </a>
                    <div class="text-center">
                      <h6><?php echo $item['item_name'] ??"Unknown"; ?></h6>
                      <div class="rating text-warning">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                      </div>
                      <div class="price py-2">
                        <span>&#8377;&nbsp;<?php echo $item['item_price']??'0'; ?></span>
                      </div>
                      <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 1 ?>">
                        <input type="hidden" name="user_id" value="<?php echo 1 ?>">
                        <?php
                          if(in_array($item['item_id'], $in_cart ?? [])) {
                            echo '<button type="submit" disabled name="add-cart" class="btn btn-success">Added In Cart</button>';
                            
                          }else{
                            echo '<button type="submit" name="add-cart" class="btn btn-warning">Add to Cart</button>';
                            
                          }
                        ?>
                      </form>
                    </div>
                </div>
            </div>
        </div>
            <?php }, $product_shuffle) ?>
    </section>