<script>
    $(document).ready(function(){
        $('.cartbutton').on("click",function(e){
            e.preventDefault();
            var id=$(this).data('id');
            var qty=1;
            //var select=$('#select').val();
            //if(select==""){
             //   select="No Size is available";
           // }
            var total=$('#total').html();
            $.ajax({
                url:'add-to-cart.php',
                type:'post',
                data:{idd:id, quantity:qty},
                success:function(data){
                    console.log(data);
                    if(data=="matched"){
                        $("#massage").html('<i class="fa fa-check"></i> Item is already added in cart');
                        //$('#exampleModalCenter').modal('show');
                        alert('Item is already added in cart');
                    }else{
                        $("#massage").html('<i class="fa fa-check"></i> You have successfully added the item in cart');
                        //$('#exampleModalCenter').modal('show');
                        alert('You have successfully added the item in cart');
                        var total1=parseInt(total)+1;

                        $('#total').html(total1);

                    }
                }
            });
        });
    });
</script>
