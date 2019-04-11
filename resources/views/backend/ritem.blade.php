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
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Resume Item section</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Fourth section</h2>
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
                        <h3 class="block-title">Resume item section data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%">Status</th>
                                    <th class="text-center" style="width: 10%">Icon</th>
                                    <th style="width: 20%">Heading</th>
                                    <th class="text-center" style="width: 10%">Interval</th>
                                    <th style="width: 25%">Description</th>
                                    <th class="text-center" style="width: 15%">Image</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ritem_rows as $ritem_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($ritem_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$ritem_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$ritem_row->status}}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{$ritem_row->icon}}
                                        </td>
                                        <td class="font-size-sm">
                                            {{$ritem_row->heading}}
                                        </td>
                                        <td class="text-center">
                                            {{$ritem_row->interval}}
                                        </td>
                                        <td class="font-size-sm">
                                            {!!cutParagraph($ritem_row->description, 30)!!}
                                        </td>  
                                        <td class="text-center">
                                            <img style="width:100%;" src="{{asset('storage/images/ritem_section/'.$ritem_row->image)}}" alt="about image">
                                        </td> 
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$ritem_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$ritem_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_ritem_row_{{$ritem_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_ritem', ['id' => $ritem_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>                               
                                       
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$ritem_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_ritem_row_{{$ritem_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$ritem_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
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
                                                    
                                                    <form action="{{route('edit_backend_ritem', ['id' => $ritem_row->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">
                    
                                                            <div class="form-group">
                                                                <label for="ritem_icon_{{$ritem_row->id}}">Icon Class <small>Use fontawesome icon classes</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="ritem_icon_{{$ritem_row->id}}" name="ritem_icon" placeholder="enter icon class ..." value="{{$ritem_row->icon}}">
                                                            </div>  
                                    
                                                            <div class="form-group">
                                                                <label for="ritem_heading_{{$ritem_row->id}}">Heading</label>
                                                                <input type="text" class="form-control form-control-alt" id="ritem_heading_{{$ritem_row->id}}" name="ritem_heading" placeholder="enter heading ..." value="{{$ritem_row->heading}}">
                                                            </div>   
                                                            
                                                            <div class="form-group">
                                                                <label for="ritem_interval_{{$ritem_row->id}}">Interval <small>eg: 2011-2013</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="ritem_interval_{{$ritem_row->id}}" name="ritem_interval" placeholder="enter interval ..." value="{{$ritem_row->interval}}">
                                                            </div> 
                                                            
                                                            <div class="form-group">
                                                                <label for="ritem_description_{{$ritem_row->id}}">Description</label>
                                                                <textarea class="form-control form-control-alt" id="ritem_description_{{$ritem_row->id}}" name="ritem_description" rows="4" placeholder="enter description ...">{{$ritem_row->description}}</textarea>
                                                            </div> 
                                    
                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input onclick="$('#ritem_select_img_{{$ritem_row->id}}').fadeToggle('fast')" type="checkbox" class="custom-control-input" id="ritem_image_enable_{{$ritem_row->id}}" name="ritem_image_enable" @if(isset($ritem_row->image)) checked @endif>
                                                                    <label class="custom-control-label" for="ritem_image_enable_{{$ritem_row->id}}"><b>Set Image</b></label>
                                                                </div>       
                                                            </div>
                                                            <div class="form-group" @if(!isset($ritem_row->image)) style="display: none;" @endif id="ritem_select_img_{{$ritem_row->id}}">
                                                                <label>Image</label>
                                                                <div class="custom-file">
                                                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="ritem_image_{{$ritem_row->id}}" name="ritem_image">
                                                                    <label class="custom-file-label" for="ritem_image_{{$ritem_row->id}}">choose new image</label>
                                                                </div>
                                                            </div>                                            
                                                    
                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="ritem_status_{{$ritem_row->id}}" name="ritem_status" @if($ritem_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="ritem_status_{{$ritem_row->id}}"><b>Publish</b></label>
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
                    <h3 class="block-title">Add new row</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <form action="{{route('add_backend_ritem')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">
                       
                        <div class="form-group">
                            <label for="ritem_icon">Icon Class <small>Use fontawesome icon classes</small></label>
                            <input type="text" class="form-control form-control-alt" id="ritem_icon" name="ritem_icon" placeholder="enter icon class ...">
                        </div>  

                        <div class="form-group">
                            <label for="ritem_heading">Heading</label>
                            <input type="text" class="form-control form-control-alt" id="ritem_heading" name="ritem_heading" placeholder="enter heading ...">
                        </div>   
                        
                        <div class="form-group">
                            <label for="ritem_interval">Interval <small>eg: 2011-2013</small></label>
                            <input type="text" class="form-control form-control-alt" id="ritem_interval" name="ritem_interval" placeholder="enter interval ...">
                        </div> 
                        
                        <div class="form-group">
                            <label for="ritem_description">Description</label>
                            <textarea class="form-control form-control-alt" id="ritem_description" name="ritem_description" rows="4" placeholder="enter description ..."></textarea>
                        </div> 

                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input onclick="$('#ritem_select_img').fadeToggle('fast')" type="checkbox" class="custom-control-input" id="ritem_image_enable" name="ritem_image_enable">
                                <label class="custom-control-label" for="ritem_image_enable"><b>Set Image</b></label>
                            </div>       
                        </div>             
                        <div class="form-group" style="display: none;" id="ritem_select_img">
                            <label>Image</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="ritem_image" name="ritem_image">
                                <label class="custom-file-label" for="ritem_image">choose image</label>
                            </div>
                        </div> 

                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="ritem_status" name="ritem_status">
                                <label class="custom-control-label" for="ritem_status"><b>Publish</b></label>
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