<script>
    $(document).ready(function(){

        $('.delete_cart').click(function(e){
            e.preventDefault();
            var id=$(this).data('id');
            $.ajax({
                url:'deletecart.php',
                type:"POST",
                data:{idd:id},
                success:function(data){
                    if (data=="0") {
                        window.location.href='shoppingCart.php?status=true';
                    }
                }
            });
        });
    });
</script>
<?php
    if($_GET['status'] == "true"){
        echo '<script>alert("Product Deleted Successfully.");</script>';
    }
?>


