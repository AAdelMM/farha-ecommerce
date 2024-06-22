
    @yield('content')
<style>
    @media(max-width:767px){
        .px-0{
            padding: 5px !important;

        }
        .tab-content .list-group-flush .list-group-item{
            font-size: 15px;
        }
        .tab-content .list-group-flush .list-group-item h3{
            font-size: 16px;
        }
        .tab-pane h4{
            text-align: center;
        }
        .AddToCartBtn{
            font-size: 14px;
        }
    }
</style>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

  
  <!-- Modal -->
  <div class="modal fade" id="itemAdded" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <p class="p-3 text-center">Product added to cart.</p>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue shopping</button>
          <a href="{{url('/')}}/cart" class="btn btn-primary">Go to cart</a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="peak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
      </div>
    </div>
  </div>
 <!--Javascript -->

    <script>
          
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
       $(".toUpdate").blur(); 
        let ssii = $('input[type="radio"]:checked').attr('stock');
        if(ssii <= 0){
        $('.no-stock').show();
        $('.toUpdate').attr('value', 0);
        $('.toUpdate').attr('max', 0)
        }else if(ssii == 1){
        $('.low-stock').show();
        $('.toUpdate').attr('max', 1)
        }else{
        $('.toUpdate').attr('max', ssii)
        }
        $('input[type="radio"]').click(function(){
        let ssii2 = $('input[type="radio"]:checked').attr('stock');
        $('.no-stock, .low-stock').hide();
            if(ssii2 <= 0){
        $('.no-stock').show();
        $('.toUpdate').attr('value', 0);
        $('.toUpdate').attr('max', 0)
        }else if(ssii2 == 1){
        $('.low-stock').show();
        $('.toUpdate').attr('max', 1)
        }else{
            $('.toUpdate').attr('max', ssii2)
        }
        })


        $('.quantity button').on('click', function () {
                var button = $(this);
                var oldValue = button.parent().parent().find('.toUpdate').val();
                if (button.hasClass('btn-plus')) {
                    let ol = parseInt(oldValue) + 1
                    let bt = parseInt($('input[type="radio"]:checked').attr('stock'))
                    if(bt >= ol){
                    var newVal = parseFloat(oldValue) + 1;
                }else{
                    var newVal = parseFloat(0) 
                }
                } else {
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                button.parent().parent().find('.toUpdate').val(newVal);
            });
         
      
    //          $(".AddToCartBtn").click(function(e){
    //     $(this).children('i').toggleClass('text-primary ');
    //     e.preventDefault()
    //     let size = $('input[type="radio"]:checked').val()
    //     let count = $('.toUpdate').val();
    //     let price = $(this).attr('price');

    //     let id = $(this).attr('itemid')
    //     let requestUrl = $(this).attr('baseurl') + '/cart'
    //     $.ajax({
    //         type:"POST",
    //         data: {id:id, size:size, count:count, price:price},
    //         url: requestUrl,
    //         success: function(res) {
    //             console.log(res);
    //             if(res == 301){
    //                 $.notify("Please Login first", "Danger");
    //                 setTimeout(function(){window.location.href = '/login'}, 2000);
    //             }else{
    //                 location.reload()
    //             }
    //         }
    //     });
    // })


    $(".AddToCartBtn").click(function(e){
        $(this).children('i').toggleClass('text-primary ');
        e.preventDefault()
        let size = $('input[type="radio"]:checked').val()
        let count = parseInt($('.toUpdate').val());
        let price = $(this).attr('price');
        let stock = parseInt($('input[type="radio"]:checked').attr('stock'));
        let id = $(this).attr('itemid')
        let requestUrl = $(this).attr('baseurl') + '/cart'
        if(stock >= count){
            if(count > 0){
                $.ajax({
                type:"POST",
                data: {id:id, size:size, count:count, price:price},
                url: requestUrl,
                success: function(res) {
                    console.log(res);
                    if(res == 301){ 
                        $.notify("Please Login first", "Danger");
                        setTimeout(function(){window.location.href = '/login'}, 2000);
                    }else{
                        $('#itemAdded').modal('show').delay(100).slideUp(1000);
                        setTimeout(function(){
                            location.reload()
                        }, 2000);   
                    }
                }
            });
            }else{
                $.notify("Please select quantity ", "Danger");
            }
           
        }else{
            $.notify("Available stock is: " +  stock, "Danger");
        }

    })
    </script>
