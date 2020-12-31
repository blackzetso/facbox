<?php 
    session_start();
    include 'connect.php';
    if(isset($_SESSION['id'])){
     $stmt = $con->prepare("SELECT * FROM cart WHERE user = ?");
     $stmt->execute([$_SESSION['id']]);
     $Count = $stmt->rowCount(); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/producer.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <title>تفاصيل</title>
</head>
<body> 
    <nav>
        <div class="title">
            <h4>تفاصيل</h4>
        </div>
        <div class="icon">
            <a href="basket.php" ><i class="fas fa-cart-arrow-down"></i><span id="Success" class="badge" ><?php if(isset($_SESSION['id'])){ echo $Count; }else{ echo '0'; } ?></span></a>
            <a href="/" class="mr-3" ><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>
    <?php 
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        $stmt = $con->prepare("SELECT * FROM products WHERE id = $id");
        $stmt->execute();
        $row = $stmt->fetch(); 
     include 'inc/pages/nav.php'; ?>
    <section class="product">
        <div class="container">
            <div class="info mt-3"> 
                <div class="photo">
                    <img style="height: 100px;" src="img/products/<?php echo $row['img']; ?>" alt=""> 
                </div>
            </div>
            <div class="Weight"> 
                <form id="addToCart" >
                    <div class="title">
                        <div class="item">
                            <label>الكمية بالـ</label>
                            <select id="unite" class="form-control" >
                                <option value="unite1" > <?php echo $row['unite']; ?>  </option>
                                <option value="unite2" > <?php echo $row['unite2']; ?>  </option>
                            </select>
                        </div> 
                    </div> 
                    <div class="calculate">
                        <button class="btn-reduce"><i class="fas fa-chevron-right"></i></button>
                        <input type="text" name="qty" class="Weight-value"  >
                        <button class="btn-plus"><i class="fas fa-chevron-left"></i></button>
                    </div> 
                    <div class="datils"> 
                    <div class="salary">
                        <div class="item">
                            <div  >سعر ال<?php echo $row['unite']; ?></div>
                            <div id="ajax" >
                                <input type="text" class="salary-item" value="<?php echo $row['price']; ?>" disabled> ج
                            </div>
                        </div>
                        <div class="item">
                            <div>السعر الاجمالي</div>
                            <div><input type="text" class="salary-all" value="" disabled> ج</div>
                        </div>
                    </div> 
                    </div>
                    <div class="btn-add"> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>" >
                        <input type="hidden" name="price" class="salary-item" value="<?php echo $row['price']; ?>"  >
                        <?php if(isset($_SESSION['id'])){ ?>
                        <button type="submit" > <i class="fas fa-plus icon"></i>اضف الي السله</button>
                        <?php }else{ ?>
                        <a href="login.php" > <i class="fas fa-plus icon"></i>اضف الي السله</a>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script >
        
        // get element in make function plus ab reducse
        let Weight = document.querySelector(".Weight-value"),
        btnPlus = document.querySelector(".btn-plus"),
        btnReduce = document.querySelector(".btn-reduce");
        let i = 1;

        Weight.value = 1;
        btnPlus.onclick = ()=>{plus()}
        btnReduce.onclick = ()=>{reduce()}

        const plus = ()=>{
            Weight.value = i = i + <?php echo $row['Decimal_number']; ?>;
            calculate()
        }
        const reduce = ()=>{
            if(Weight.value <= <?php echo $row['Decimal_number']; ?>){
            }
            else{
                Weight.value = i = i - <?php echo $row['Decimal_number']; ?>;
                calculate()
            }
        }
        //get element use in calculate Weight
        let salaryItem = document.querySelector(".salary-item"),
        salaryAll = document.querySelector(".salary-all");



        //calculate Weight
        const calculate = ()=>{ 
            salaryAll.value = salaryItem.value * Weight.value
        }
        calculate(); 
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <?php if(isset($_SESSION['id'])){ ?>
    <script>
        $(document).on('submit','#addToCart',function(event){
            event.preventDefault(); 
            var Form = $(this);
            $.ajax({
                type:'POST',
                url:'inc/cart/insert.php',
                beforeSend:function(){
                    Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                    Form.find("button[type='submit']").attr('disabled','true');
                },
                data:new FormData(this),
                contentType:false,
                processData:false, 
                success:function(data){
                    $("#Success").html(data);
                },
                complete:function(data){
                    $('.spinner-border').remove();
                    Form.find("button[type='submit']").removeAttr('disabled');
                }
            })
        });
        
        $(document).ready(function(){
                    $('#unite').on('change',function(){
                        var unite = $(this).val();
                        var ID = <?php echo $id; ?>;
                        if(unite){
                            $.ajax({
                                type:'GET',
                                url:'inc/unite.php',
                                data:'unite='+unite+'&id='+ID,
                                success:function(html){
                                    $('#ajax').html(html);

                                }
                            }); 
                        }else{
                            $('#Price').html('<option value="">Select Category first</option>'); 
                        }
                    });  
                })
    </script>
    <?php } ?>
    <script src="js/all.min.js"></script>
</body>
</html>