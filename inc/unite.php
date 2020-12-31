<?php
//Include database configuration file
 
include('../connect.php');

if(isset($_GET["unite"]) && !empty($_GET["unite"])){
    //Get all state data
    $unite = $_GET['unite'];
    $id = $_GET['id'];
    if($unite == 'unite1'){
        
    $query = $con->prepare("SELECT * FROM products WHERE id = ? ");
    $query->execute([$id]);
    $row = $query->fetch(); ?>
    <input type="text" class="salary-item" value="<?php echo $row['price']; ?>" disabled> ج
<?php  }elseif($unite == 'unite2'){ 
    $query = $con->prepare("SELECT * FROM products WHERE id = ? ");
    $query->execute([$id]);
    $row = $query->fetch(); ?>
    <input type="text" class="salary-item" value="<?php echo $row['price2']; ?>" disabled> ج
<?php } } ?>
<script> 
        
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