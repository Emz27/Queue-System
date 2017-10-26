$(document).ready( function ()
    {

      $('#table_user').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
          "url": "pages/datatable/user_type/data.php",
          "type": "POST"
        },
        "columns": [
        { "data": "urutan" },

        { "data": "num"},
        { "data": "description" },
        { "data": "level" },
        { "data": "button" },
        ]
      });

    });
    $(document).on("click","#btnadd",function(){

        $("#modalcust").modal("show");




		$("#txtId").val("0");
		$("#num").focus();
		$("#description").val("");
		$("#level").val("");

		$("#crudMethod").val("N");

    });
    $(document).on( "click",".btnhapus", function() {
      var id = $(this).attr("id");
      alert(id);
      var description = $(this).attr("description");
      swal({
        title: "Delete User?",
        text: "Delete User : "+description+" ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete",
        closeOnConfirm: true },
        function(){
          var value = {
            id : id
          };
          $.ajax(
          {
            url : "pages/datatable/user_type/delete.php",
            type: "POST",
            data : value,
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.result ==1){
                $.notify('Successfull delete customer');
                var table = $('#table_user').DataTable();
                table.ajax.reload( null, false );
              }else{
                swal("Error","Can't delete user data, error : "+data.error,"error");
              }

            },
            error: function(jqXHR, textStatus, errorThrown)
            {
             swal("Error!", textStatus, "error");
            }
          });
        });
    });
    $(document).on("click",".btnedit",function(){
      var id=$(this).attr("id");
      var value = {
        id: id
      };
      $.ajax(
      {
        url : "pages/datatable/user_type/fetch.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);


			$("#crudMethod").val("E");
			$("#txtId").val(data.id);
			$("#num").val(data.num);
			$("#description").val(data.description);
			$("#level").val(data.level);





          $("#modalcust").modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
          swal("Error!", textStatus, "error");
        }
      });
    });
    $.notifyDefaults({
      type: 'success',
      delay: 500
    });




    $("#inputForm").validate({

      submitHandler:function(form){
          $.ajax(
          {
            url : "pages/datatable/user_type/save.php",
            type: "POST",
            data : /*value*/$(form).serialize(),
            success: function(data, textStatus, jqXHR)
            {
              var data = jQuery.parseJSON(data);
              if(data.crud == 'N'){
                if(data.result == 1){
                  $.notify('Save Data Successfull');
                  var table = $('#table_user').DataTable();
                  table.ajax.reload( null, false );

                }else{
                  swal("Error","Can't save customer data, error : "+data.error,"error");
                }
              }else if(data.crud == 'E'){
                if(data.result == 1){
                  $.notify('Edit data Successfull');
                  var table = $('#table_user').DataTable();
                  table.ajax.reload( null, false );
                  $("#num").focus();
                }else{
                 swal("Error","Can't update customer data, error : "+data.error,"error");
                }
              }else{
                swal("Error","invalid order","error");
              }
              $("#modalcust").modal("hide");
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
               swal("Error!", textStatus, "error");

            }
          });


      },
      rules: {
        num : {
           required : true,
           min: 1,
           max: 4
        },
        lastname : {
          required : true,
          min :0,
          max : 4
        },
        description:{
          required : true,
          maxlength:32

        }

      },

      errorElement: "em",
      errorPlacement: function ( error, element ) {
        // Add the `help-block` class to the error element
        error.addClass( "help-block" );

        if ( element.prop( "type" ) === "checkbox" ) {
          error.insertAfter( element.parent( "label" ) );
        } else {
          error.insertAfter( element );
        }
      },
      highlight: function ( element, errorClass, validClass ) {
        $( element ).parents( ".col-sm-9" ).addClass( "has-error" ).removeClass( "has-success" );


      },
      unhighlight: function (element, errorClass, validClass) {
        $( element ).parents( ".col-sm-9" ).addClass( "has-success" ).removeClass( "has-error" );
      }


    });
