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
          "url": "datatable/user/data.php",
          "type": "POST"
        },
        "columns": [
        { "data": "urutan" },

        { "data": "employee_id"},
        { "data": "firstname" },
        { "data": "lastname" },
        { "data": "birth_date" },
        { "data": "gender" },
		    { "data": "town" },
        { "data": "cellphone_number" },
        { "data": "telephone_number" },
        { "data": "email" },
		    { "data": "username" },
        { "data": "user_type" },
        { "data": "branch"},
        { "data": "button" },
        ]
      });

    });
    $(document).on("click","#btnadd",function(){

        $("#modalcust").modal("show");




		$("#txtId").val("0");
		$("#txtFirstname").focus();
		$("#txtFirstname").val("");
		$("#txtLastname").val("");
		$("#txtBirth_date").val("");
		$("#cboGender").val("");
		$("#numberTown").val("");
		$("#numberCellphone_number").val("");
		$("#numberTelephone_number").val("");
		$("#txtEmail").val("");
		$("#txtUsername").val("");
		$("#numberUser_type").val("");
		$("#crudMethod").val("N");
    $("#txtEmployeeId").val("");
    $("#txtBranch").val("");
    $("#password").val("");
    $("#confirm_password").val("");
    $("#password").prop('disabled', false);
    $("#confirm_password").prop('disabled', false);
    });
    $(document).on( "click",".btnhapus", function() {
      var id = $(this).attr("id");
      alert(id);
      var firstname = $(this).attr("firstname");
      swal({
        title: "Delete User?",
        text: "Delete User : "+firstname+" ?",
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
            url : "datatable/user/delete.php",
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
        url : "datatable/user/fetch.php",
        type: "POST",
        data : value,
        success: function(data, textStatus, jqXHR)
        {
          var data = jQuery.parseJSON(data);


			$("#crudMethod").val("E");
			$("#txtId").val(data.id);
			$("#txtFirstname").val(data.firstname);
			$("#txtLastname").val(data.lastname);
			$("#txtBirth_date").val(data.birth_date);
			$("#cboGender").val(data.gender);
			$("#numberTown").val(data.town);
			$("#numberCellphone_number").val(data.cellphone_number);
			$("#numberTelephone_number").val(data.telephone_number);
			$("#txtEmail").val(data.email);
			$("#txtUsername").val(data.username);
			$("#numberUser_type").val(data.user_type);
      $("#txtEmployeeId").val(data.employee_id);
      $("#txtBranch").val(data.branch);
      $("#password").prop('disabled', true);
      $("#confirm_password").prop('disabled', true);




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


    $("#numberCellphone_number").mask("+639999999999");
  	$("#numberTelephone_number").mask("(999)999-9999");
  	$("#txtEmail").inputmask({ alias: "email", "clearIncomplete": true });
    $('#txtBirth_date').datepicker({
        autoclose: true
    });


    $("#inputForm").validate({


      submitHandler:function(form){
        // alert("hello");
          $.ajax(
          {
            url : "datatable/user/save.php",
            type: "POST",
            data : $(form).serialize(),
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
                  $("#txtFirstname").focus();
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
               alert("error");

            }
          });


      },
      rules: {
        firstname : {
           required : true,
           minlength: 2,
           maxlength: 32
        },
        lastname : {
          required : true,
          minlength :2,
          maxlength : 32
        },
        birth_date:{
          required : true,

        },
        gender:{
          required: true
        },
        town:{
          required: true
        },
        email:{
          required: true,
          remote:{
            url:"../ajaxrequest/verification/emailDuplication.php",
  					type : "post",
  					data : {
  						email : function(){
  							return $("#txtEmail").val();
  						},
              id : function(){
                return $("#txtId").val();
              }

  					}
          }
        },
        username:{
          required:true,
          remote:{
  					url: "../ajaxrequest/verification/usernameDuplication.php",
  					type : "post",
  					data : {
  						username: function(){
  							return $("#txtUsername").val();
  						},
              id : function(){
                return $("#txtId").val();
              }
  					}

  				}
        },
        password : "required",
        confirm_password:{
          equalTo: "#password"

        },
        user_type:"required",
        branch:"required"

      },

      messages:{
        email:{
          remote:"Email not available"
        },
        username:{
          remote:"Username not available"
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
