$(document).ready(function(){
  $(document).on('click','.deleteProductBtn', function(e){

        e.preventDefault();

        var id = $(this).val();
       
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => 
          {
            if (willDelete) {
              $.ajax({

                method:"POST",
                url:"code.php",
                data: {
                    'pId':id,
                    'deleteProductBtn':true
                },

                success: function(response) {
                    console.log(response);
                    if(response == 10)
                    {
                        swal("Success!","Product deleted Sucessfully!","success");
                        $("#pTbl").load(location.href + " #pTbl");
                    }

                    else if(response == 20){
                        swal("Error!","Something went wrong!","error");


                    }


              }
              })
            }
          });
    })

});
