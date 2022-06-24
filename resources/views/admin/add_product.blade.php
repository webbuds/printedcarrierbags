@extends('admin.layout.admin')

@section('title', 'Products')

@section('content')
 <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Add Product</h3>
                                <a href="/paperadmin/products" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">All Products</a>
                            </div>
							<div class="col-md-12">
								@if(Session::has('success'))
									<div class="alert alert-success">{{ Session::get('success') }}</div>
								@endif
							</div>
                        </div>
                    </div> <!-- Row end  -->  
                    
                    <div class="row g-3 mb-3">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Basic information</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{URL('/paperadmin/products/add-product')}}" enctype="multipart/form-data" method="post" >
										@csrf
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-6">
                                                <label  class="form-label">Product Name <span class="text text-danger">*</span></label>
                                                <input type="text" id="p_title" name="name" onkeyup="slugMaking()" class="form-control" value="{{old('name')}}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label  class="form-label">Product Slug</label>
                                                <input type="text" id="p_slug" name="slug" class="form-control" readonly="readonly" required>
                                            </div>
											<div class="col-md-6">
                                                @error('name')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label  class="form-label">Category <span class="text text-danger">*</span></label>
                                                <select class="form-select" name="category" aria-label="size 3 select example" required>
                                            			<option value="" selected disabled hidden>Choose Category</option>
													
													@foreach ($parent as $p_item)
															<option value="{{ $p_item['id'] }}">{{ $p_item['name'] }}</option>
														@endforeach
                                                 </select>
                                            </div>
                                            <div class="col-md-6"></div>
											<div class="col-md-6">
                                                @error('p_parent')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
                                            <div class="col-md-6"></div>
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold ">Price Per 1000 to 2999 Quantity</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£) <span class="text text-danger">*</span></label>
                                                <input type="number" name="one_sp" class="form-control" value="{{old('one_sp')}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£) <span class="text text-danger">*</span></label>
                                                <input type="number" name="one_c" class="form-control" value="{{old('one_c')}}" required>
											</div>
											<div class="col-md-6">
                                                @error('one_sp')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-6">
                                                @error('one_c')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold" style="margin-top:15px">Price Per 3000 to 4999 Quantity</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£)</label>
                                                <input type="number" name="three_sp" class="form-control" value="{{old('three_sp')}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£)</label>
                                                <input type="number" name="three_c" class="form-control" value="{{old('three_c')}}" required>
											</div>
											
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold " style="margin-top:15px">Price Per 5000 to 9999 Quantity</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£)</label>
                                                <input type="number" name="five_sp" class="form-control" value="{{old('five_sp')}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£)</label>
                                                <input type="number" name="five_c" class="form-control"  required>
											</div>
											
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold " style="margin-top:15px">Price Per 10000 and above Quantity</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£)</label>
                                                <input type="number" name="ten_sp" class="form-control" value="{{old('ten_sp')}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£)</label>
                                                <input type="number" name="ten_c" class="form-control" required>
											</div>
											
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold " style="margin-top:15px">Plate Charge</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£) <span class="text text-danger">*</span></label>
                                                <input type="number" name="plate_sp" class="form-control" value="{{old('plate_sp')}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£) <span class="text text-danger">*</span></label>
                                                <input type="number" name="plate_c" class="form-control" value="{{old('plate_c')}}" required>
											</div>
											<div class="col-md-6">
                                                @error('plate_sp')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-6">
                                                @error('plate_c')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-12">
                                                <h6 class="mb-0 fw-bold " style="margin-top:15px;">Product Description <span class="text text-danger">*</span></h6>  
                                            </div>
                                            <div>
												<input placeholder="Title"  name="p_desc_title" style="width:100%; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit; margin-bottom: 5px;"/>
                                                <textarea row="10" col="30" name="p_desc" style="width:100%; height:300px; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit;resize:none;" placeholder="Product Description..."></textarea>
                                            </div>
											
																						<div class="col-md-12">
                                                <h6 class="mb-0 fw-bold " style="margin-top:15px;">Delivery Description <span class="text text-danger">*</span></h6>  
                                            </div>
                                            <div>
												<input placeholder="Title" name="p_del_title" style="width:100%; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit; margin-bottom: 5px;" required/>
                                                <textarea row="10" col="30" name="p_del_desc" style="width:100%; height:300px; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit;resize:none;" placeholder="Product Description..." required></textarea>
                                            </div>
											
												<div class="col-md-12">
                                                <h6 class="mb-0 fw-bold " style="margin-top:15px;">Art Work Description <span class="text text-danger">*</span></h6>  
                                            </div>
                                            <div>
												<input placeholder="Title" name="p_art_title" style="width:100%; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit; margin-bottom: 5px;"/>
                                                <textarea row="10" col="30" name="p_art_desc" style="width:100%; height:300px; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit;resize:none;" placeholder="Product Description..."></textarea>
                                            </div>
									
											<div class="col-md-12">
                                                @error('p_desc')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											
			<!--									<div class="image-uploader-wrapper">
			<div class="image-uploader-header">
				<h1>Add Photo</h1>
				<p>
					Bring your item to life and improve buyer confidence by adding up to
					12 pictures for free.
				</p>
			</div>
			<div class="image-uploader-container">
				<div class="image-uploader-left">
					<div class="box main-box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*"/>
							</label>
						</div>
					</div>
				</div>
				<div class="image-uploader-right">
					<div class="box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*" />
							</label>
						</div>
					</div>
					<div class="box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*" />
							</label>
						</div>
					</div>
					<div class="box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*" />
							</label>
						</div>
					</div>
					<div class="box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*" />
							</label>
						</div>
					</div>
					<div class="box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*" />
							</label>
						</div>
					</div>
					<div class="box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*" />
							</label>
						</div>
					</div>
					<div class="box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*" />
							</label>
						</div>
					</div>
					<div class="box">
						<div class="js--image-preview"></div>
						<div class="upload-options">
							<label>
								<input type="file" class="image-upload" accept="image/*" />
							</label>
						</div>
					</div>
				</div>
			</div>
		</div> 

	-->
											
											
											<div class="col-md-12">
											<h6 class="mb-0 fw-bold " style="margin-top:15px;">Featured Image</h6><br>
                                               
                                                
                                                <input type="file" id="input-file-to-destroy" name="images" class="dropify" data-allowed-formats="portrait square landscape">
                                            </div>
											<div class="col-md-3">
												@error('f_image')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
											</div>
											<div class="col-md-3"></div>
											<div class="col-md-3"></div>
											<div class="col-md-3"></div>
											
											<div class="col-md-12">
											<h6 class="mb-0 fw-bold " style="margin-top:15px;">Gallery Image</h6><br>
                                            </div>
											<div class="col-md-3">
											<input type="file" id="input-file-to-destroy" name="gallery_image_1" class="dropify" >
                                            </div>
											<div class="col-md-3">
											<input type="file" id="input-file-to-destroy" name="gallery_image_2" class="dropify" >
                                            </div>
											<div class="col-md-3">
											<input type="file" id="input-file-to-destroy" name="gallery_image_3" class="dropify" >
                                            </div>
											<div class="col-md-3">
											<input type="file" id="input-file-to-destroy" name="gallery_image_4" class="dropify" >
                                            </div>
											
                                        </div>
                                    
                                </div>
							</div>
                            
							<div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Features <span class="text text-danger">*</span></h6>
                                </div>
                                 <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" name="color" type="checkbox" value="checked" id="sizechek1" required >
                                            <label class="form-check-label" for="sizechek1">
                                            1 Colour Print
                                            </label>
                                        </div>	
									  <div class="form-check">
                                            <input class="form-check-input" name="color3" type="checkbox" value="checked" id="sizechek2">
                                            <label class="form-check-label" for="sizechek2">
                                            1-3 Colour Print
                                            </label>
                                        </div>	
									 	<div class="form-check">
                                            <input class="form-check-input" name="color4" type="checkbox" value="checked" id="sizechek2">
                                            <label class="form-check-label" for="sizechek2">
                                            1-4 Colour Print
                                            </label>
                                        </div>
									 <div class="form-check">
                                            <input class="form-check-input" name="color6" type="checkbox" value="checked" id="sizechek2">
                                            <label class="form-check-label" for="sizechek2">
                                            1-6 Colour Print
                                            </label>
                                        </div>
									  <div class="form-check">
                                            <input class="form-check-input" name="color_full" type="checkbox" value="checked" id="sizechek3">
                                            <label class="form-check-label" for="sizechek3">
                                            Full Colour Print
                                            </label>
                                        </div>	
                                        <div class="form-check">
                                            <input class="form-check-input" name="working_days" type="checkbox" value="checked" id="sizechek4">
                                            <label class="form-check-label" for="sizechek4">
                                           7 working days
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="eco_friendly" type="checkbox" value="checked" id="sizechek5">
                                            <label class="form-check-label" for="sizechek5">
                                           Eco friendly
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="best_seller" type="checkbox" value="checked" id="sizechek6">
                                            <label class="form-check-label" for="sizechek6">
                                            Best Seller
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="made_in_the_uk" type="checkbox" value="checked" id="sizechek7">
                                            <label class="form-check-label" for="sizechek7">
                                           Made in the UK
                                            </label>
                                        </div>
									 <div class="form-check">
                                            <input class="form-check-input" name="biodegradable_plastic" type="checkbox" value="checked" id="sizechek8">
                                            <label class="form-check-label" for="sizechek8">
                                           Biodegradable Plastic
                                            </label>
                                        </div>
									 <div class="form-check">
                                            <input class="form-check-input" name="free_delivery" type="checkbox" value="checked" id="sizechek9">
                                            <label class="form-check-label" for="sizechek9">
                                           Free Delivery
                                            </label>
                                        </div>
                                    </div>
							</div>
								
								
							<div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Colors</h6>
                                </div>
                                 <div class="card-body">
									 @foreach($colors as $color)
                                        <div class="form-check">
                                            <input class="form-check-input" name="colors[]" type="checkbox" value="{{$color->id}}" id="{{$color->id}}" >
                                            <label class="form-check-label" for="{{$color->id}}">
                                           <input type="color" value="{{$color->name}}" id="colorPicker" disabled>
                                            </label>
                                        </div>
                                     @endforeach  
                                     
                                    </div>
							</div>
								
						
										 <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Bag Print Type<span class="text text-danger">*</span></h6>
                                </div>
                                 <div class="card-body">


                                            <table class="table">
                                                <tbody id="tbody2">
                                                    <td>
                                                    <div class="form-check">
                                            <input class="form-check-input" name="one_side" value="on" type="checkbox" name="couponsstatus" id="myCheck" onclick="myFunction()">
                                            <label class="form-check-label" for="myCheck">
                                                On one-side only
                                            </label>
                                        </div>
														<input id="text" style="display:none; width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="one_side_price" placeholder="Enter per piece price">

                                                      </td>
                                                      <td>
                                                        <div class="form-check">
                                            <input class="form-check-input" name="same_both_side" value="on" type="checkbox" name="couponsstatus" id="myCheck1" onclick="myFunction1()">
                                            <label class="form-check-label" for="myCheck1">
                                              Print the same design on both sides
                                            </label>
                                        </div>
						<input id="text1" style="display:none; width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="same_both_side_price" placeholder="Enter per piece price">

                                                      </td>
                                                      <td>
                                                         <div class="form-check">
                                            <input class="form-check-input" name="different_both_side" value="on" type="checkbox" name="couponsstatus" id="myCheck2" onclick="myFunction2()">
                                            <label class="form-check-label" for="myCheck2">
                                           Print different designs on each side
                                            </label>
                                        </div>
						<input id="text2" style="display:none; width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="diff_both_side_price" placeholder="Enter per piece price">

                                                      </td>
                                                      
                                                      <td></td>
                                                </tbody>
                                              </table>
								</div>
							</div>
								
										 <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Send Quote<span class="text text-danger">*</span></h6>
                                </div>
                                 <div class="card-body">
									 									 
									 <div class="col-md-6 col-lg-6">
                                                <select class="form-select" id="send-quote-select" name="category_test" aria-label="size 3 select example" required>
                                        			 <option value="">Choose Option</option>
													 <option value="yes">Yes</option>
													 <option value="no">No</option>
                                    			</select>
                                    </div>
									 <br>
									 <div class="col-md-12 col-lg-12 "  style="margin-top:30px; display:none;" id="custom-quote">
									 	<label  class="form-label">Custom Message</label>
										 <textarea class="form-control" style="margin-top:10px" name="custom_msg"></textarea>
									 </div>

									 <div class="col-md-6 col-lg-6"></div>
									 
                                    
								</div>
							</div>
								
							<div class="card mb-3">
                                
                                <div class="card-body">
                                    
                                        <div class="row g-3 align-items-center">
                                           
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
							</div>
                        </div>
                    </div><!-- Row end  --> 
                    
                </div>
            </div>    


<script>
	
const el = document.getElementById('send-quote-select');

const box = document.getElementById('custom-quote');

el.addEventListener('change', function handleChange(event) {
  if (event.target.value === 'no') {
    box.style.display = 'block';
  } else {
    box.style.display = 'none';
  }
});

	function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");

  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
	
	function myFunction1() {
  var checkBox = document.getElementById("myCheck1");
  var text = document.getElementById("text1");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
	function myFunction2() {
  var checkBox = document.getElementById("myCheck2");
  var text = document.getElementById("text2");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
	
</script>
<script>
function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}



/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}
</script>
<script>
	function slugMaking() {
		
let text = document.getElementById("p_title").value; 
		
		var replaced = text.split(' ').join('-');
		var replaced=replaced.toLowerCase();
document.getElementById("p_slug").value = replaced;
		}
</script>


@endsection