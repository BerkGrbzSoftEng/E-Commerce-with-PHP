<?php include 'header.php' ?>

<!-- Cart Page Start -->
<div class="page-section section pt-90 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">				
                    <!-- Cart Table -->
                    <div class="cart-table table-responsive mb-40">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/product-1.png" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#">Zeon Zen 4 Pro</a></td>
                                    <td class="pro-price"><span>$295.00</span></td>
                                    <td class="pro-quantity"><div class="pro-qty"><input type="text" value="1"></div></td>
                                    <td class="pro-subtotal"><span>$295.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/product-2.png" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#">Aquet Drone D 420</a></td>
                                    <td class="pro-price"><span>$275.00</span></td>
                                    <td class="pro-quantity"><div class="pro-qty"><input type="text" value="2"></div></td>
                                    <td class="pro-subtotal"><span>$550.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/product-3.png" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#">Game Station X 22</a></td>
                                    <td class="pro-price"><span>$295.00</span></td>
                                    <td class="pro-quantity"><div class="pro-qty"><input type="text" value="1"></div></td>
                                    <td class="pro-subtotal"><span>$295.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/product-4.png" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#">Roxxe Headphone Z 75 </a></td>
                                    <td class="pro-price"><span>$110.00</span></td>
                                    <td class="pro-quantity"><div class="pro-qty"><input type="text" value="1"></div></td>
                                    <td class="pro-subtotal"><span>$110.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </form>	
                    
                <div class="row">

                    <   

                    <!-- Cart Summary -->
                    <div class="col-lg-6 col-12 mb-40 d-flex">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4>Cart Summary</h4>
                                <p>Sub Total <span>$1250.00</span></p>
                                <p>Shipping Cost <span>$00.00</span></p>
                                <h2>Grand Total <span>$1250.00</span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <button class="checkout-btn">Checkout</button>
                                <button class="update-btn">Update Cart</button>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End --> 

<?php include 'footer.php' ?>