<?php 
ob_start(); 
//session_start(); 

    include 'header.php';
    include 'config/gui_mail.php';
    ?>
     
    <div class="section_container">
            <div class="full_page">
                 <?php if(!isset($_SESSION['cus_login'])) : ?>
    <div class="col2-set">
        <div class="col-1">
            <?php 
                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];

                    $sql_check_login = "SELECT * FROM customer WHERE email=:mail AND password=:pass";
                    $stm = $conn->prepare($sql_check_login);
                    $stm->bindParam(':mail',$email);
                    $stm->bindParam(':pass',$pass);
                    $stm->execute();
                    $cus = $stm->fetch();
                    if ($cus) {
                        $_SESSION['cus_login'] = $cus;
                        header('Refresh:0'); header('location: checkout.php');
                    }else{
                        echo 'Email or password dose not match';
                    }
                }
             ?>
             <form action="" method="POST" role="form">
            <ul class="form-list">
                <form action="" method="POST" role="form">
                <h4>SIGUP</h4>
            <div class="form-group">
                    <label for="">Name</label>
                   <div class="input-box"> <input type="text" class="form-control" name="name" > </div>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                   <div class="input-box"> <input type="email" class="form-control" name="email" > </div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <div class="input-box"><input type="password" class="form-control" name="pass"></div>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                   <div class="input-box"> <input type="text" class="form-control" name="Phone" > </div>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                   <div class="input-box"> <input type="text" class="form-control" name="email" > </div>
                </div>
            
                                        </ul>
                                        </form>
                                    </div>
                                    <div class="col-2">
                                       
                                        <form method="post" id="login-form">
                                            <fieldset>
                                                <h4>LOGIN</h4>
                                                
                                                <ul class="form-list">
                                                    <div class="form-group">
                    <label for="">Email</label>
                    <div class="input-box"><input type="text" class="form-control" name="email" placeholder="Input field"> </div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <div class="input-box"><input type="password" class="form-control" name="pass" placeholder="Input field"> </div>
                </div>
                                                    
                                                     <div class="buttons-set">
                                            <button  class="button brown_btn" type="submit">Login</button>
                                        </div>
                                                </ul>
                                                <br/>
                                                <br/>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="col2-set">
                                    <div class="col-1">
                                        <div class="buttons-set">
                                            <button  class="button brown_btn" type="button">SIGUP</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </li>
    <?php else: 
        // kiem tra xem don han khac rong
        if(totalQtt() > 0) :
        $customer = $_SESSION['cus_login'];
    
        if(isset($_POST['cus_name'])){
            $cus_name = $_POST['cus_name'];
            $cus_email = $_POST['cus_email'];

            $od_name = $_POST['od_name'];
            $od_email = $_POST['od_email'];
            $od_phone = $_POST['od_phone'];
            $od_address = $_POST['od_address'];

            $customer_id = $customer['id'];

            $sql_od = "INSERT INTO orders(customer_id,name,email,phone,address) VALUES(?,?,?,?,?)";
            $stm = $conn->prepare($sql_od);

            $data = [$customer_id,$od_name,$od_email,$od_phone,$od_address];

            $body = '<table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>';
            if ($stm->execute($data)) {
                $order_id = $conn->lastInsertId(); //mysqli_insert_id($conn);
                $n=1;
                foreach(cart_items() as $cart)  {
                    $product_id = $cart['id'];
                    $price = $cart['price'];
                    $quantity = $cart['quantity'];

                    $sql_dt = "INSERT INTO order_detail VALUES($order_id,$product_id,$quantity,$price)";
                    $conn->query($sql_dt);

                    $body .='<tr>
                            <td>'.$n.'</td>
                            <td>'.$cart['name'].'</td>
                            <td>'.$cart['quantity'].'</td>
                            <td>'.$cart['price'].'</td>
                    </tr>';
                $n++;
                }
            
                $body .= '</table>';

                if (gui_mail($cus_email,$body)) {
                    unset($_SESSION['cart']);
                    header('location: order_tc.php');
                }else{
                    echo 'Gửi mail không thành công, vui lòng xem lại';
                }
                
            }

        }
    ?>
    
        <div class="col2-set">
        <form action="" method="POST" role="form">
           
            <div class="col-1">
                <h1>Thông tin người đặt hàng</h1>
                
                    <div class="form-group">
                        <label  for="">Name</label>
                        <div class="input-box"><input type="text" class="form-control" name="cus_name" placeholder="Input field" value="<?=$customer['name'];?>"></div>
                    </div>
                
                    <div class="form-group">
                        <label for="">Email</label>
                        <div class="input-box"><input type="text" class="form-control" name="cus_email" placeholder="Input field" value="<?=$customer['email'];?>"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <div class="input-box"><input type="text" class="form-control" name="cus_phone" placeholder="Input field" value="<?=$customer['phone'];?>"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <div class="input-box"><input type="text" class="form-control" name="cus_address" placeholder="Input field" value="<?=$customer['address'];?>"> </div>
                    </div>
                <div class="buttons-set">
                    <button class="button brown_btn" type="submit">Order checkout</button></div>
            </div>
            <div class="col-2">
                
                <h1>Thông tin người nhận hàng</h1>
                
                    <div class="form-group">
                        <label for="">Name</label>
                        <div class="input-box"><input type="text" class="form-control" name="od_name" placeholder="Input field" value=""> </div>
                    </div>
                
                    <div class="form-group">
                        <label for="">Email</label>
                        <div class="input-box"><input type="text" class="form-control" name="od_email" placeholder="Input field" value=""> </div>
                    </div>
                    <div class="form-group">
                        <label >Phone</label>
                        <div class="input-box"><input type="text" class="form-control" name="od_phone" placeholder="Input field" value=""> </div>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <div class="input-box"><input type="text" class="form-control" name="od_address" placeholder="Input field" value=""> </div>
                    </div>
                
            
            </div>
        </form>
        </div>
        <?php else: ?>
            <div class="col2-set">    
            <div class="buttons-set" style="font-size: 20px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="background-color: red; color: white;">X</button>
                Giỏ hàng của quý khách rỗng, vui lòng thêm sản phẩm vào giỏ
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
            </div>
        </div>
       
            
        <?php 
    include 'footer.php'; ?>