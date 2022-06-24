
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{asset('/public/admin/assets/plugin/datatables/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/admin/assets/plugin/datatables/dataTables.bootstrap5.min.css')}}">
	<link rel="stylesheet" href="{{asset('/public/admin/assets/plugin/dropify/dist/css/dropify.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('/public/admin/assets/plugin/datatables/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/admin/assets/plugin/datatables/dataTables.bootstrap5.min.css')}}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('/public/admin/assets/css/ebazar.style.min.css')}}">
	<link rel="stylesheet" href="{{asset('/public/admin/assets/css/style.css')}}">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">
        
        <!-- sidebar -->
        @include('admin.layout.menu')

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            @include ('admin.layout.header')

            <!-- Body: Body -->
            @yield('content')
            
        </div>
    
    </div>

	<script src="{{asset('/public/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	<script src="{{asset('/public/admin/assets/bundles/libscripts.bundle.js')}}"></script>

	 <!-- Jquery Page Js -->
    <script src="{{asset('/public/admin/js/template.js')}}"></script>
    <script src="{{asset('/public/admin/js/page/index.js')}}"></script>
	    <!-- Jquery Core Js -->

    <!-- Plugin Js -->
    <script src="{{asset('/public/admin/assets/bundles/dataTables.bundle.js')}}"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('/public/admin/assets/bundles/dropify.bundle.js')}}"></script>
	<script src="{{asset('/public/admin/js/5x5jqpi.min.js')}}"></script>  

    <script>
        $('#myDataTable')
        .addClass( 'nowrap')
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    </script>
	<script>
    $(document).ready(function(){

      

});
</script>
	<script>
        
        $(document).ready(function() {
        //Ch-editer
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                //console.error( error );
            } );
            //Deleterow
            $("#tbproduct").on('click', '.deleterow', function () {
                $(this).closest('tr').remove();
            });
            
        });
		
		$(document).ready(function() {
        //Ch-editer
        ClassicEditor
            .create( document.querySelector( '#editor-1' ) )
            .catch( error => {
                //console.error( error );
            } );
            //Deleterow
            $("#tbproduct").on('click', '.deleterow', function () {
                $(this).closest('tr').remove();
            });
            
        });
		
		$(document).ready(function() {
        //Ch-editer
        ClassicEditor
            .create( document.querySelector( '#editor-2' ) )
            .catch( error => {
                //console.error( error );
            } );
            //Deleterow
            $("#tbproduct").on('click', '.deleterow', function () {
                $(this).closest('tr').remove();
            });
            
        });

        $(function() {
            $('.dropify').dropify();

            var drEvent = $('#dropify-event').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
                    replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'DÃ©solÃ©, le fichier trop volumineux'
                }
            });
        });
            
	</script>
   
      <script>
        $(document).ready(function () {
      
          // Denotes total number of rows
          var rowIdx = 0;
      
          // jQuery button click event to add a row
          $('#addBtn-size').on('click', function () {
      
            // Adding a row inside the tbody.
            $('#tbody').append(`<tr id="R${++rowIdx}">
                  <td>
                    <label  class="form-label">Size Name</label>
                    <input type="text"  name="size_name[]" class="form-control" value="{{ old('size_name') }}">
                  </td>
                  <td>
                    <label class="form-label">Size</label>
                    <input type="text"  name="size_slug[]" class="form-control">
                  </td>
                  <td>
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description[]"  style="width: 100%; height: 200px" ></textarea>
                  <td/>
                  <td>
                    <label class="form-label">Image</label>
                    <input type="file"  name="size_image[]" class="form-control">
                  <td/>
                  <td class="text-center">
                    <button class="btn btn-danger remove"
                  type="button" style="color:#ffffff">Remove</button>
                </td>
                  </tr>`);
          });
      
          // jQuery button click event to remove a row.
          $('#tbody').on('click', '.remove', function () {
      
            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest('tr').nextAll();
      
            // Iterating across all the rows 
            // obtained to change the index
            child.each(function () {
      
              // Getting <tr> id.
              var id = $(this).attr('id');
      
              // Getting the <p> inside the .row-index class.
              var idx = $(this).children('.row-index').children('p');
      
              // Gets the row number from <tr> id.
              var dig = parseInt(id.substring(1));
      
              // Modifying row index.
              idx.html(`Row ${dig - 1}`);
      
              // Modifying row id.
              $(this).attr('id', `R${dig - 1}`);
            });
      
            // Removing the current row.
            $(this).closest('tr').remove();
      
            // Decreasing total number of rows by 1.
            rowIdx--;
          });
        });
      </script>
      <script>
        $(document).ready(function () {
      
          // Denotes total number of rows
          var rowIdx = 0;
      
          // jQuery button click event to add a row
          $('#addBtn-colour').on('click', function () {
      
            // Adding a row inside the tbody.
            $('#tbody').append(`<tr id="R${++rowIdx}">
                  <td>
                    <label  class="form-label">Name</label>
                                                        <input type="text"  name="color_name[]" class="form-control" value="{{ old('color_name[]') }}">
                  </td>
                  <td>
                    <label class="form-label">Colour</label>
                                                        <input type="text"  name="color_slug[]" class="form-control">
                  </td>
                  
                  <td>
                    <label class="form-label">Image</label>
                    <input type="file"  name="images[]" class="form-control">
                  <td/>
                  <td class="text-center">
                    <button class="btn btn-danger remove"
                  type="button" style="color:#ffffff">Remove</button>
                </td>
                  </tr>`);
          });
      
          // jQuery button click event to remove a row.
          $('#tbody').on('click', '.remove', function () {
      
            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest('tr').nextAll();
      
            // Iterating across all the rows 
            // obtained to change the index
            child.each(function () {
      
              // Getting <tr> id.
              var id = $(this).attr('id');
      
              // Getting the <p> inside the .row-index class.
              var idx = $(this).children('.row-index').children('p');
      
              // Gets the row number from <tr> id.
              var dig = parseInt(id.substring(1));
      
              // Modifying row index.
              idx.html(`Row ${dig - 1}`);
      
              // Modifying row id.
              $(this).attr('id', `R${dig - 1}`);
            });
      
            // Removing the current row.
            $(this).closest('tr').remove();
      
            // Decreasing total number of rows by 1.
            rowIdx--;
          });
        });
      </script>
	<script>
	jQuery(document).ready(function(){
	
		jQuery('#send-quote-select').change(function(){
    if(jQuery('#send-quote-select').val() == 'no'){
        jQuery('#custom-message').removeClass('d-none');
    }
    else if(jQuery('#send-quote-select').val() == 'yes'){
        jQuery('#custom-message').addClass('d-none');
    }

		});
});
</script>
<script>
	jQuery(document).ready(function(){
			$("#uploader").initUploader({
				destination:'/public/product-gallery/',

  				destinationParams: {
	
    				fileLimit: 20,
					sizeLimit: 10000,
 				 }

});

		
	});
</script>
	
</body>
</html> 