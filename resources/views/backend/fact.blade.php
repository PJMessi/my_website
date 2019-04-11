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
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Fact section</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Third section</h2>
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
                        <h3 class="block-title">Fact section data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%">Status</th>
                                    <th style="width: 30%;">Heading</th>
                                    <th style="width: 30%;">Description</th>     
                                    <th class="text-center" style="width: 15%;">Image</th>
                                    <th class="text-center" style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fact_rows as $fact_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($fact_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$fact_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$fact_row->status}}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="font-size-sm">
                                            {!!$fact_row->heading!!}
                                        </td>
                                        <td class="font-size-sm">      
                                            {{cutParagraph($fact_row->description, 60)}}
                                        </td>
                                      
                                        <td class="text-center">
                                            <img style="width:100%;" src="{{asset('storage/images/fact_section/'.$fact_row->image)}}" alt="background image">
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$fact_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$fact_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_fact_row_{{$fact_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_fact', ['id' => $fact_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$fact_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_fact_row_{{$fact_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$fact_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
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
                                                    
                                                    <form action="{{route('edit_backend_fact', ['id' => $fact_row->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">
                                                            <div class="form-group">
                                                                <label for="fact_heading_{{$fact_row->id}}">Heading <small>Use &lt;br> to break line and &lt;span> to make it colored. The text below will be converted to UPPERCASE.</small></label>
                                                                <textarea class="form-control form-control-alt" id="fact_heading_1_{{$fact_row->id}}" name="fact_heading" rows="4" placeholder="enter heading ...">{{$fact_row->heading}}</textarea>
                                                            </div>    
                                                            
                                                            <div class="form-group">
                                                                <label for="fact_heading_{{$fact_row->id}}">Description</label>
                                                                <textarea class="form-control form-control-alt" id="fact_description_{{$fact_row->id}}" name="fact_description" rows="4" placeholder="enter description ...">{{$fact_row->description}}</textarea>
                                                            </div> 
                                                                 
                                                            <div class="form-group">
                                                                <label>Image</label>
                                                                <div class="custom-file">
                                                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="fact_image_{{$fact_row->id}}" name="fact_image">
                                                                    <label class="custom-file-label" for="fact_image_{{$fact_row->id}}">choose new image</label>
                                                                </div>
                                                            </div>   
                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="fact_status_{{$fact_row->id}}" name="fact_status" @if($fact_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="fact_status_{{$fact_row->id}}"><b>Publish</b></label>
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
                
                <form action="{{route('add_backend_fact')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">
                        <div class="form-group">
                            <label for="fact_heading">Heading<small> Use &lt;br> to break line and &lt;span> to make it colored. The text below will be coverted to UPPERCASE.</small></label>
                            <textarea class="form-control form-control-alt" id="fact_heading" name="fact_heading" rows="4" placeholder="enter heading ..."></textarea>
                        </div>  
                        
                        <div class="form-group">
                            <label for="fact_description">Description</label>
                            <textarea class="form-control form-control-alt" id="fact_description" name="fact_description" rows="4" placeholder="enter description ..."></textarea>
                        </div>  
                 
                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="fact_image" name="fact_image">
                                <label class="custom-file-label" for="fact_image">choose image</label>
                            </div>
                        </div>   
                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="fact_status" name="fact_status">
                                <label class="custom-control-label" for="fact_status"><b>Publish</b></label>
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