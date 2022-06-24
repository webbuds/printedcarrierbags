@extends('admin.layout.admin')

@section('title', ' Edit Page')

@section('content')
 <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Page Details</h3>                                
                            </div>
                        </div>
                    </div> <!-- Row end  -->  
                    
                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <form action="{{route('update_page')}}" method="post" enctype="multipart/form-data" id="size_form">
										@csrf
                                      <!-- <button class="btn btn-md btn-primary" id="addBtn-size" type="button">Add Row</button> -->
                                       <table class="table">
                                                <tbody id="tbody">
                                                    <tr>
                                                    <td>
                                                        <label  class="form-label">Title</label>
                                                        <input type="text" id="page_title" name="title" class="form-control"  style="width: 50%; !important" value="{{$page->title}}" onkeyup="slugMaking()" required>
														<input type="hidden" id="id" name="id" class="form-control" style="width: 50%; !important" value="{{$page->id}}" required>
                                                      </td>
                                                      <td>
                                                        <label class="form-label">Slug</label>
                                                        <input type="text" id="p_slug" name="slug" class="form-control" style="width: 100%; !important" readonly="readonly"  value="{{$page->slug}}"  required>
                                                      </td>
													</tr>
													<tr>
														 <td>
                                                        <label class="form-label">Meta title</label>
                                                        <input type="text" id="meta_title" name="meta_title" class="form-control" style="width: 50%; !important" value="{{$page->meta_title}}"  required>
                                                      </td>
                                                    
                                                      <td>
                                                        <label class="form-label">Meta Description</label>
                                                        <input type="text" id="meta_description" name="meta_description" class="form-control"  value="{{$page->meta_description}}" required>
                                                      </td>
                                                     
                                                      </tr>
													<tr>
														  <td>
                                                        <label class="form-label">Page Data</label>
														  
                                                        <textarea class="form-control" id="editor-1" name="description"  style="width: 100%; height: 200px">{{$page->page_data}}</textarea>
                                                      </td>
													</tr>
                                                </tbody>
                                              </table>
										<div class="row g-3 align-items-center">
											
                                              <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                <button type="submit" class="btn btn-primary py-2 px-5">Save</button>
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
	function slugMaking() {
		let text = document.getElementById("page_title").value;
		var replaced = text.split(' ').join('-');
		document.getElementById("p_slug").value = replaced;
	}
</script>

@endsection