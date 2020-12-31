<?php   
        session_start();
        include 'connect.php';
        $func = 'inc/App/function.php';
        include $func;
        if(isset($_SESSION['id'])){ ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/complete.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <title>اكمال الطلب</title>
</head>
<body>
    <nav>
        <div class="title">
            <h4>التوصيل</h4>
        </div>
        <div class="icon">
                <a href="./index.php"><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>

    <?php include 'inc/pages/nav.php'; ?>

    <section class="forms mb-5">
        <div id="Success" ></div>
        <form id="add" >
            <div class="item">
                <input type="text" name="city" required> <label for="">المدينه</label>
            </div>
            <div class="item">
                <input type="text" name="zone" required> <label for="">اسم المنطقه</label>
            </div>
            <div class="item">
                <input type="text" name="street" required> <label for="">اسم الشارع</label>
            </div>
            <div class="item">
                <input type="text" name="build" required> <label for="">اسم/رقم العماره</label>
            </div>
            <div class="item">
                <input type="text" name="storey" required> <label for="">رقم الشقه/الطابق</label>
            </div>
            <div class="time">
                <h4>وقت استلام الطلب</h4>
                <div class="hour">
                    <span>من</span><input type="time" name="time_from" placeholder="اختر الساعه"><span>الي</span><input type="time" name="time_to" placeholder="اختر الساعه">
                </div>
            </div>
            <div class="btn-save">
                <input type="submit"  class="save" value="اتمام الطلب">
            </div>
        </form>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/all.min.js"></script>
    <script>
         $(document).on('submit','#add',function(event){
                event.preventDefault(); 
                var Form = $(this);
                $.ajax({
                    type:'POST',
                    url:'inc/checkout/insert.php',
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
    </script>
</body>
</html>
<?php } else {
    redirect('login.php');
}