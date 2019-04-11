@extends('backend.layouts.be_layout')

@section('content')
@include("backend.includes.backend_func")
<main id="main-container">

    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url('{{asset("backend/media/photos/photo3@2x.jpg")}}');">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">About section</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Second section</h2>
                    </div>
                    <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                        <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                            <a class="btn btn-success px-4 py-2" data-toggle="modal" data-target="#add_row_modal">
                                <i class="fa fa-plus mr-1"></i> Add new row
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    @include("backend.includes.message")
    <!-- Page Content -->
    <div class="content content-narrow">

        <!-- Customers and Latest Orders -->
        <div class="row row-deck">
            <!-- Latest Customers -->
            <div class="col-lg-12">
                <div class="block block-mode-loading-oneui">
                    <div class="block-header border-bottom">
                        <h3 class="block-title">About section data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%" class="text-center">Status</th>
                                    <th style="width: 15%">Watermark</th>
                                    <th style="width: 20%">Heading 2</th>
                                    <th style="width: 20%">Description</th>  
                                    <th style="width: 15%" class="text-center" >Image</th>
                                    <th style="width: 10%" class="text-center">Button</th>
                                    <th style="width: 10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($about_rows as $about_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($about_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$about_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$about_row->status}}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            {!!$about_row->watermark!!}
                                        </td>   
                                        <td class="font-size-sm">
                                            {!!$about_row->heading_2!!}
                                        </td>
                                        <td class="font-size-sm">
                                            {{cutParagraph($about_row->description, 60)}}
                                        </td>
                                        <td class="text-center">
                                            <img style="width:100%;" src="{{asset('storage/images/about_section/'.$about_row->image)}}" alt="about image">
                                        </td>
                                        <td class="text-center">
                                            {{$about_row->button[1]}}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$about_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$about_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_about_row_{{$about_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_about', ['id' => $about_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$about_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent mb-0">
                                                    <div class="block-header bg-primary-dark">
                                                        <h3 class="block-title">Are you sure?</h3>
                                                        <div class="block-options">
                                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-fw fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="block-content font-size-sm">
                                                        <p>This action cannot be reversed.</p>
                                                    </div>
                                                    <div class="block-content block-content-full text-right border-top">
                                                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_about_row_{{$about_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$about_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent mb-0">
                                                    <div class="block-header bg-primary-dark">
                                                        <h3 class="block-title">Edit row</h3>
                                                        <div class="block-options">
                                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-fw fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <form action="{{route('edit_backend_about', ['id' => $about_row->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">

                                                            <div class="form-group">
                                                                <label for="about_watermark_{{$about_row->id}}">Watermark <small>Use &lt;span> to make text colored</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="about_watermark_{{$about_row->id}}" name="about_watermark" placeholder="enter watermark ..." value="{{$about_row->watermark}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="about_heading_1_{{$about_row->id}}">Heading 1</label>
                                                                <input type="text" class="form-control form-control-alt" id="about_heading_1_{{$about_row->id}}" name="about_heading_1" placeholder="enter heading 1 ..." value="{{$about_row->heading_1}}">
                                                            </div> 

                                                            <div class="form-group">
                                                                <label for="about_heading_2_{{$about_row->id}}">Heading 2 <small>Use &lt;span> to make text colored italic</small></label>
                                                                <textarea class="form-control form-control-alt" id="about_heading_2_{{$about_row->id}}" name="about_heading_2" rows="4" placeholder="enter heading 2 ...">{{$about_row->heading_2}}</textarea>
                                                            </div>  
                                                            
                                                            <div class="form-group">
                                                                <label for="about_description_{{$about_row->id}}">Description</label>
                                                                <textarea class="form-control form-control-alt" id="about_description_{{$about_row->id}}" name="about_description" rows="4" placeholder="enter description ...">{{$about_row->description}}</textarea>
                                                            </div> 

                                                            <div class="form-group">
                                                                <label for="about_image_label_{{$about_row->id}}">Image Label <small>The text below will be converted to uppercase.</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="about_image_label_{{$about_row->id}}" name="about_image_label" placeholder="enter image label ..." value="{{$about_row->image_label}}">
                                                            </div> 
                                      
                                                            <div class="form-group">
                                                                <label>Image</label>
                                                                <div class="custom-file">
                                                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="about_image_{{$about_row->id}}" name="about_image">
                                                                    <label class="custom-file-label" for="about_image_{{$about_row->id}}">choose new image</label>
                                                                </div>
                                                            </div>   

                                                            <div class="form-group">
                                                                <label for="about_button_txt_{{$about_row->id}}">Button <small>The text below will be converted to uppercase.</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="about_button_txt_{{$about_row->id}}" name="about_button_txt" placeholder="enter button label ..." value="{{$about_row->button[1]}}">
                                                                <br><input type="text" class="form-control form-control-alt" id="about_button_link_{{$about_row->id}}" name="about_button_link" placeholder="enter button link ..." value="{{$about_row->button[0]}}">
                                                            </div>

                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="about_status_{{$about_row->id}}" name="about_status" @if($about_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="about_status_{{$about_row->id}}"><b>Publish</b></label>
                                                                </div>       
                                                            </div>    
                                                        </div>
                                                        <div class="block-content block-content-full text-right border-top">
                                                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-check mr-1"></i>Save</button>
                                                        </div>
                                                    </form>
                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Latest Customers -->
        </div>
        <!-- END Customers and Latest Orders -->
    </div>
    <!-- END Page Content -->

</main>

<!--add new row modal-->
<div class="modal" id="add_row_modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Add row</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <form action="{{route('add_backend_about')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">

                        <div class="form-group">
                            <label for="about_watermark">Watermark <small>Use &lt;span> to make text colored</small></label>
                            <input type="text" class="form-control form-control-alt" id="about_watermark" name="about_watermark" placeholder="enter watermark ...">
                        </div>

                        <div class="form-group">
                            <label for="about_heading_1">Heading 1</label>
                            <input type="text" class="form-control form-control-alt" id="about_heading_1" name="about_heading_1" placeholder="enter heading 1 ...">
                        </div> 

                        <div class="form-group">
                            <label for="about_heading_2">Heading 2 <small>Use &lt;span> to make text colored italic</small></label>
                            <textarea class="form-control form-control-alt" id="about_heading_2" name="about_heading_2" rows="4" placeholder="enter heading 2 ..."></textarea>
                        </div>  
                        
                        <div class="form-group">
                            <label for="about_description">Description</label>
                            <textarea class="form-control form-control-alt" id="about_description" name="about_description" rows="4" placeholder="enter description ..."></textarea>
                        </div> 

                        <div class="form-group">
                            <label for="about_image_label">Image Label <small>The text below will be converted to uppercase.</small></label>
                            <input type="text" class="form-control form-control-alt" id="about_image_label" name="about_image_label" placeholder="enter image label ...">
                        </div> 
    
                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="about_image" name="about_image">
                                <label class="custom-file-label" for="about_image">choose image</label>
                            </div>
                        </div>   

                        <div class="form-group">
                            <label for="about_button_txt">Button <small>The text below will be converted to uppercase.</small></label>
                            <input type="text" class="form-control form-control-alt" id="about_button_txt" name="about_button_txt" placeholder="enter button label ...">
                            <br><input type="text" class="form-control form-control-alt" id="about_button_link" name="about_button_link" placeholder="enter button link ...">
                        </div>

                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="about_status" name="about_status">
                                <label class="custom-control-label" for="about_status"><b>Publish</b></label>
                            </div>       
                        </div>    
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-check mr-1"></i>Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection