
<div class="news-header" style="background-color: #421569; padding-top:50px; padding-bottom: 40px">
    <div class="header-container" style="padding-left:10%; padding-right:10%; display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
        <div class="left-content">
            <h1 style="font-family: Arial, Helvetica, sans-serif; color: #ffffff;">Quotation</h1>
            <h3 style="font-family: Arial, Helvetica, sans-serif; color: #ffffff; margin-top:50px">{{$data['name']}}</h3>
            <p style="font-family: Arial, Helvetica, sans-serif; color: #ffffff;line-height: 10px; margin-top:30px"> {{$data['number']}}</p>
            <p style="font-family: Arial, Helvetica, sans-serif; color: #ffffff; line-height: 10px;">{{$data['email']}}</p>
            <p style="font-family: Arial, Helvetica, sans-serif; color: #ffffff;line-height: 10px;">35 Endsleigh Gardens</p>
            <p style="font-family: Arial, Helvetica, sans-serif; color: #ffffff;line-height: 10px;">Ilford, E2 6JS</p>
        </div>
        <div class="right-content" style="padding-top:40px">
            <img style="margin-left:auto; display:table" src="logo.png" alt="">
            <p style="font-family: Arial, Helvetica, sans-serif; color: #ffffff;line-height: 10px; margin-top:40px; text-align: right;">{{$data['date']}}</p>
            <p style="font-family: Arial, Helvetica, sans-serif; color: #ffffff; line-height: 10px;text-align: right;">{{$data['email']}}</p>
            <h2 style="font-family: Arial, Helvetica, sans-serif; color: #ffffff; margin-top:40px;text-align: right;">Quote ID: {{$data['refference']}}</h2>
        </div>
    </div>
</div>
<div class="content-body" style="padding-top:50px; padding-bottom: 200px;">
    <div class="body-inner" style="padding-left:10%; padding-right:10%">
        <h2 style="font-family: Arial, Helvetica, sans-serif; color: #000000;">Products</h2>
        <hr>
        <h3 style="font-family: Arial, Helvetica, sans-serif; color: #000000;">{{$data['product']['name']}}</h3>
        <p style="font-family: Arial, Helvetica, sans-serif; color: #000000;">Bag Size: {{$data['product_size']['title']}}  {{  $data['product_size']['size']}}</p>
        <p style="font-family: Arial, Helvetica, sans-serif; color: #000000;">Bag Colour:{{$data['product_color'][0]['name']}}</p>
		@if($data['size_id']==1)
		        <p style="font-family: Arial, Helvetica, sans-serif; color: #000000;">Print Colour: On one-side only</p>
		@elseif($data['size_id']==2)
				<p style="font-family: Arial, Helvetica, sans-serif; color: #000000;">Print Colour: Print the same design on both sides</p>
		@else
		<p style="font-family: Arial, Helvetica, sans-serif; color: #000000;">Print Colour: Print different designs on each side</p>

		@endif
        <p style="font-family: Arial, Helvetica, sans-serif; color: #000000;">Front of Bag: 2 Colours</p>
        <p style="font-family: Arial, Helvetica, sans-serif; color: #000000;">Back of Bag: 2 Colours</p>
        <table style="width:100%; margin-top:50px; border-collapse: collapse;">
            <tr>
                <td style="border:1px solid #000000; background-color: #421569; color: #ffffff; padding: 15px 0px 15px 10px;font-family: Arial, Helvetica, sans-serif;">Quantity</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">1000</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">3000</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">5000</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">10000</td>
            </tr>
            <tr>
                <td style="border:1px solid #000000; background-color: #421569; color: #ffffff; padding: 15px 0px 15px 10px;font-family: Arial, Helvetica, sans-serif;">Price</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['one_total']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['three_total']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['five_total']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['ten_total']}}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000000; background-color: #421569; color: #ffffff; padding: 15px 0px 15px 10px;font-family: Arial, Helvetica, sans-serif;">Per Unit Cost</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['one_unit']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['three_unit']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['five_unit']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['ten_unit']}}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000000; background-color: #421569; color: #ffffff; padding: 15px 0px 15px 10px;font-family: Arial, Helvetica, sans-serif;">Plate Charge</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['plate_total']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['plate_total']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['plate_total']}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$data['product']['plate_total']}}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000000; background-color: #421569; color: #ffffff; padding: 15px 0px 15px 10px;font-family: Arial, Helvetica, sans-serif;">Total</td>
				 @php
			$total1=$data['product']['one_total']+$data['product']['plate_total'];			
			$total2=$data['product']['three_total']+$data['product']['plate_total'];
			$total3=$data['product']['five_total']+$data['product']['plate_total'];		
			$total4=$data['product']['ten_total']+$data['product']['plate_total'];
		@endphp
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$total1}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$total2}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$total3}}</td>
                <td style="border:1px solid #000000; text-align: center;font-family: Arial, Helvetica, sans-serif;">£{{$total4}}</td>
            </tr>
            <tr>
                <td style="color: #ffffff; padding: 15px 0px 15px 10px;font-family: Arial, Helvetica, sans-serif;"></td>
                <td style="border:1px solid #000000; text-align: center;padding: 15px 0px 15px 10px;"><a href="https://www.devpaper.webdevholdsite.co.uk/checkout?quotation_id={{$data['id']}}?product={{$data['product']['id']}}&quantity=1000" style="color: #ffffff;font-family: Arial, Helvetica, sans-serif;background-color: #421569; border:1px solid #421569; padding: 10px 20px 10px 20px;">Accept Quote</a></td>
                <td style="border:1px solid #000000; text-align: center;padding: 15px 0px 15px 10px;"><a href="https://www.devpaper.webdevholdsite.co.uk/checkout?quotation_id={{$data['id']}}product={{$data['product']['id']}}&quantity=3000" style="color: #ffffff;font-family: Arial, Helvetica, sans-serif;background-color: #421569; border:1px solid #421569; padding: 10px 20px 10px 20px;">Accept Quote</a></td>
                <td style="border:1px solid #000000; text-align: center;padding: 15px 0px 15px 10px;"><a href="https://www.devpaper.webdevholdsite.co.uk/checkout?quotation_id={{$data['id']}}product={{$data['product']['id']}}&quantity=5000" style="color: #ffffff;font-family: Arial, Helvetica, sans-serif;background-color: #421569; border:1px solid #421569; padding: 10px 20px 10px 20px;">Accept Quote</a></td>
                <td style="border:1px solid #000000; text-align: center;padding: 15px 0px 15px 10px;"><a href="https://www.devpaper.webdevholdsite.co.uk/checkout?quotation_id={{$data['id']}}product={{$data['product']['id']}}&quantity=10000" style="color: #ffffff;font-family: Arial, Helvetica, sans-serif;background-color: #421569; border:1px solid #421569; padding: 10px 20px 10px 20px;">Accept Quote</a></td>
            </tr>
        </table>
    </div>   
</div>
<div class="news-footer" style="background-color: #421569; padding-top:20px; padding-bottom: 20px">
    <div class="footer-container" style="padding-left:10%; padding-right:10%;">
        <h4 style="font-family: Arial, Helvetica, sans-serif; color: #ffffff;text-align: left; font-weight: 600;">Printed Carrier Bags: Unit 208, Pillbox Studios, 115 Coventry Road, London, E2 6GG</h4>
        <p style="font-family: Arial, Helvetica, sans-serif; color: #ffffff;text-align: left; line-height: 0px; margin-top:30px">We accept payments online, BACs, debit card or credit card. Quotations valid for 12 hours.</p>
        <p style="font-family: Arial, Helvetica, sans-serif; color: #ffffff;text-align: left; line-height: 20px;">All prices exclude VAT. All orders are subject to +/- tolerance of 10%.</p>
    </div>
</div>