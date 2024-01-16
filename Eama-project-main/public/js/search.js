$(document).ready(function(){

    load_data();
  
    function load_data(query)
    {
        $.ajax({
            url:"../models/search-model.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
        });
    }
  
    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
            load_data(search);
        }
        else
        {
            load_data();
        }
    });
    $(document).on('click', '.search-item', function() {
        var productId = $(this).data('id');
        
        // Redirect to the product page using the product ID
        window.location.href = '../views/products.php?id=' + productId;
    });
  });