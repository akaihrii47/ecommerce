<?php
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        if(isset($_POST['add-product'])){
          $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }

    $item_id = $_GET['item_id'] ?? 1;
    foreach($product->getData() as $item) :
        if($item['item_id'] == $item_id) :
            
?>



<section id="product" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?php echo $item['item_image'] ?? "./images/phone1.jpeg"; ?>" alt="product" class="img-fluid">
                    <div class="form-row pt-4">
                        <div class="col">
                            <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                        </div>
                        <div class="col">
                        <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 1 ?>">
                        <input type="hidden" name="user_id" value="<?php echo 1 ?>">
                        <button type="submit" name="add-product" class="btn btn-warning form-control">Add to Cart</button>
                      </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 py-3">
                    <h5><?php echo $item['item_name'] ??"Unknown"; ?></h5>
                    <small>by <span class="text-info"><?php echo $item['item_brand'] ?? "Unknown" ?></span></small>
                    <div class="d-flex">
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                    </div>
                    <hr class="m-0">
                        <table class="my-3">
                            <tr>
                                <td>M.R.P:</td>
                                <td>&#8377;&nbsp;<s><?php echo $item['item_mrp'] ?? 0 ?></s></td>
                            </tr>
                            <tr0>
                                <td>Price:</td>
                                <td class="text-danger">&#8377;&nbsp;<span><?php echo $item['item_price'] ?? 0 ?></span><small class="text-dark">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                            </tr>
                            <tr class="">
                                <td>You Save:&nbsp;</td>
                                <td><span class="text-danger">&#8377;&nbsp;<?php echo $item['item_mrp'] -= $item['item_price'] ?? 0 ?></span></td>
                            </tr>
                        </table>
                            <div id="policy">
                              <div class="d-flex">
                                  <div class="return text-center mr-5">
                                      <div class="font-size-20 my-2 color-second">
                                          <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                      </div>
                                      <a href="#">10 Days <br> Replacement</a>
                                  </div>
                                  <div class="return text-center mr-5">
                                      <div class="my-2">
                                          <span class="fas fa-truck border p-3 rounded-pill"></span>
                                      </div>
                                      <a href="#">Daily Tuition <br>Deliverd</a>
                                  </div>
                                  <div class="return text-center mr-5">
                                      <div class="my-2 color-second">
                                          <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                      </div>
                                      <a href="#" class="text-info">1 Year <br>Warranty</a>
                                  </div>
                              </div>
                          </div>
                          <hr>

                     
                          <div id="order-details" class="d-flex flex-column text-dark">
                              <small>Delivery by : Mar 29  - Apr 1</small>
                              <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                              <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                          </div>
                     

                       <div class="row">
                           <div class="col-6">
                               <div class="color my-3">
                                   <div class="d-flex text-center justify-content-between">
                                       <h6>Color:</h6>
                                       <div class="p-2 bg-primary rounded-circle"><button class="btn"></button></div>
                                       <div class="p-2 bg-info rounded-circle"><button class="btn"></button></div>
                                       <div class="p-2 bg-success rounded-circle"><button class="btn"></button></div>
                                    </div>
                                </div>
                            </div>
                           <div class="col-6">
                               
                           </div>
                       </div>
                        <div class="size my-3">
                            <h6>Size :</h6>
                            <div class="d-flex justify-content-between w-75">
                                <div class="border p-2">
                                    <button class="btn p-0">4GB RAM</button>
                                </div>
                                <div class="border p-2">
                                    <button class="btn p-0">6GB RAM</button>
                                </div>
                                <div class="border p-2">
                                    <button class="btn p-0">8GB RAM</button>
                                </div>
                            </div>
                        </div>
                  </div>

                <div class="col-12">
                  <h5>Product Description</h5>
                    <div class="col-12">
                        <p class="my-2">
                            <?php echo $item['item_description']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
</section>


<?php
    endif;
endforeach;
?>
        