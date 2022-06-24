<!doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    
    <title>Email Template</title>
</head>

<body>

    <div class="navbar container header">

        <div class="container nav_one"  style=" background-color: #E9E9E9;padding: 0px 25px 0px 25px; width: 700px; margin-top: -7px;">
            

          <a href="#" class="navbar-brand" style="  width: 30%;"><img src="site-logo.png" alt="" style="padding: 10px;width: 100%;"></a>  

            <div class="link-inline-end">

               <h4 style="font-size: 14px;margin-top: 10px;text-align: right;"><a href="#" style="text-decoration: none;color: #000;">123456789</a></h4> 
                <h4  style="font-size: 14px;margin-top: 10px;text-align: right; text-decoration: none;"><a href="#" style="text-decoration: none; color: #000;">sales@printedcarrierbags.co.uk</a><h4></h4>

            </div>

        </div>

    </div>

    <div class="container note-div" style="background-color: red;width: 470px;border-radius: 7px;margin-top: 60px;">

            <div class="link-inline-center">

               <h3 style="color: #E9E9E9;padding: 12px 5px 12px 5px;text-align: center;font-size: 12px;">
               Please Note: This quote is only valid for 12 hours.</h3>

            </div>

    </div>

    <div class="container quote-div" style="background-color: #421569 !important;width: 470px;margin: auto;border-radius: 20px;padding: 8px 20px 8px 20px;margin-top: 20px;">


           <h3 style="font-size: 25px;color: #fff;margin-bottom: 15px;margin-top: 5px;">Quotation</h3>
           
           <div class="box">

            <div class="box-inner" style="display: inline-block;">

                <h6 style="font-size: 12px;color: #fff;">{{$data['name']}}</h6>
                <h6 style="font-size: 12px;color: #fff;"><a href="#" style=" text-decoration: none;color: #fff;">
                    {{$data['number']}}</a></h6>
                <h6 style="font-size: 12px;color: #fff;"><a href="#" style=" text-decoration: none;color: #fff;">{{$data['email']}}</a></h6>              

            </div>
            <div class="box-inner-2" style=" display: inline-block;float: right;">
                <h6 style="font-size: 12px;color: #fff;">Ref:{{$data['refference']}}</h6>
                <h6 style="font-size: 12px;color: #fff;">Date:{{$data['date']}}</h6>
            </div>

           </div>

    </div>

    <div class="container products-div" style=" width: 470px;margin: auto;margin-top: 30px;padding: 8px 20px 8px 20px;">

           <h3 style="color: #000;font-size: 25px;">Products</h3>
           
           <div class="boxes">

            <div class="box-one" style="border-top: 1px solid #000;padding: 15px 0px 15px 0px;">

                <h3 style="color: #000;font-size: 16px;">{{$data['product']['name']}}</h3>
                <h5 style="color: #000;font-size: 12px;">Bag Size: 320mm x + 130mm Bottom Gusset</h5>
                <h5 style="color: #000;font-size: 12px;">Bag Colour: Black</h5>
                <h5 style="color: #000;font-size: 12px;">Print Colour: Print the same design on both sidesn</h5>
                <h5 style="color: #000;font-size: 12px;">Front of Bag: 2 Colours</h5>
                <h5 style="color: #000;font-size: 12px;">Back of Bag: 2 Colours</h5>
                        
            </div>

           </div>

    </div>

    <table style="margin: auto;width: 430px; margin-bottom: 30px !important;" >
			
        <tr>
        
            <td style="color: #000;font-size: 13px;line-height: 23px; font-weight: 700;">Quantity</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">1000</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">2000 </td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">3000</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">5000</td>
        
        </tr>
        
        <tr>
        
            <td style="color: #000;font-size: 13px;line-height: 23px; font-weight: 700;">Price</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['one_total']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['three_total']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['five_total']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['ten_total']}}</td>
        
        </tr>
        
        <tr>
        
            <td style="color: #000;font-size: 13px;line-height: 23px; font-weight: 700;">Per Unit Cost</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['one_unit']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['three_unit']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['five_unit']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['ten_unit']}}</td>
        
        </tr>
        
        <tr>
        
            <td style="color: #000;font-size: 13px;line-height: 23px; font-weight: 700;">Plate Charge</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['plate_total']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['plate_total']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['plate_total']}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$data['product']['plate_total']}}</td>
        
        </tr>
        
        <tr>
        @php
			$total1=$data['product']['one_total']+$data['product']['plate_total'];			
			$total2=$data['product']['three_total']+$data['product']['plate_total'];
			$total3=$data['product']['five_total']+$data['product']['plate_total'];		
			$total4=$data['product']['ten_total']+$data['product']['plate_total'];
		@endphp
            <td style="color: #000;font-size: 13px;line-height: 23px; font-weight: 700;">Total</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$total1}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$total2}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$total3}}</td>
            <td style="color: #000;font-size: 13px;line-height: 23px;">£{{$total4}}</td>
        
        </tr>
		
		<tr>
        @php
			$total1=$data['product']['one_total']+$data['product']['plate_total'];			
			$total2=$data['product']['three_total']+$data['product']['plate_total'];
			$total3=$data['product']['five_total']+$data['product']['plate_total'];		
			$total4=$data['product']['ten_total']+$data['product']['plate_total'];
		@endphp
            <td style="color: #000;font-size: 13px;line-height: 23px; font-weight: 700;"></td>
			<td style="color: #000;font-size: 13px;line-height: 23px;"><a href="https://www.devpaper.webdevholdsite.co.uk/checkout?product={{$data['product']['id']}}&price={{$total1}}">Accept Quot</a></td>
            <td style="color: #000;font-size: 13px;line-height: 23px;"><a href="https://www.devpaper.webdevholdsite.co.uk/checkout?product={{$data['product']['id']}}&price={{$total2}}">Accept Quot</a></td>
            <td style="color: #000;font-size: 13px;line-height: 23px;"><a href="https://www.devpaper.webdevholdsite.co.uk/checkout?product={{$data['product']['id']}}&price={{$total3}}">Accept Quot</a></td>
            <td style="color: #000;font-size: 13px;line-height: 23px;"><a href="https://www.devpaper.webdevholdsite.co.uk/checkout?product={{$data['product']['id']}}&price={{$total4}}">Accept Quot</a></td>
        
        </tr>
		
    
    </table>

    <div class="container footer-div" style="background-color: #421569;width:470px;margin: auto;border-radius: 12px;padding: 8px 20px 8px 20px;margin-top: 0px;margin-bottom: 0px;">

     <h3 style="color:#fff;font-size: 11.8px;padding-top: 6px;line-height: 22px;">We accept payments online, BACs, debit card or credit card. Quotations valid for 12 hours. All prices exclude VAT. All orders are subject to +/- tolerance of 10%.</h3>

    </div>
	<br>
	

		
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>