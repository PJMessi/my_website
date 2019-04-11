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
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Testmonial section</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Seventh section</h2>
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
                        <h3 class="block-title">Testmonial section data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 15%">Status</th>
                                    <th class="text-center" style="width: 15%;">Watermark</th>
                                    <th style="width: 15%;">Heading 1</th>
                                    <th style="width: 15%;">Heading 2</th>
                                    <th style="width: 25%;">Description</th>
                                                            
                                    <th class="text-center" style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testmonial_rows as $testmonial_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($testmonial_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$testmonial_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$testmonial_row->status}}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {!!$testmonial_row->watermark!!}
                                        </td>
                                        <td class="font-size-sm">
                                            {{$testmonial_row->heading_1}}
                                        </td>
                                        <td class="font-size-sm">
                                            {!!$testmonial_row->heading_2!!}
                                        </td>
                                        <td class="font-size-sm">      
                                            {{cutParagraph($testmonial_row->description, 60)}}
                                        </td>  
                                        
                                
                
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$testmonial_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$testmonial_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_testmonial_row_{{$testmonial_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_testmonial', ['id' => $testmonial_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$testmonial_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_testmonial_row_{{$testmonial_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$testmonial_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
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
                                                    
                                                    <form action="{{route('edit_backend_testmonial', ['id' => $testmonial_row->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">
                                                            <div class="form-group">
                                                                <label for="testmonial_watermark_{{$testmonial_row->id}}">Watermark <small>Use &lt;span> to make it colored.</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="testmonial_watermark_{{$testmonial_row->id}}" name="testmonial_watermark" placeholder="enter watermark ..." value="{{$testmonial_row->watermark}}">
                                                            </div>  
                                                            
                                                            <div class="form-group">
                                                                <label for="testmonial_heading_1_{{$testmonial_row->id}}">Heading 1</label>
                                                                <input type="text" class="form-control form-control-alt" id="testmonial_heading_1_{{$testmonial_row->id}}" name="testmonial_heading_1" placeholder="enter heading 1 ..." value="{{$testmonial_row->heading_1}}">
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="testmonial_heading_2_{{$testmonial_row->id}}">Heading 2 <small>Use &lt;span> to make it colored. The text below will be converted to UPPERCASE.</small></label>
                                                                <textarea class="form-control form-control-alt" id="testmonial_heading_2_{{$testmonial_row->id}}" name="testmonial_heading_2" rows="4" placeholder="enter heading 2 ...">{{$testmonial_row->heading_2}}</textarea>
                                                            </div> 
                                    
                                                            <div class="form-group">
                                                                <label for="testmonial_description_{{$testmonial_row->id}}">Description</label>
                                                                <textarea class="form-control form-control-alt" id="testmonial_description_{{$testmonial_row->id}}" name="testmonial_description" rows="4" placeholder="enter description ...">{{$testmonial_row->description}}</textarea>
                                                            </div>

                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="testmonial_status_{{$testmonial_row->id}}" name="testmonial_status" @if($testmonial_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="testmonial_status_{{$testmonial_row->id}}"><b>Publish</b></label>
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
                
                <form action="{{route('add_backend_testmonial')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">
                        <div class="form-group">
                            <label for="testmonial_watermark">Watermark <small>Use &lt;span> to make it colored.</small></label>
                            <input type="text" class="form-control form-control-alt" id="testmonial_watermark" name="testmonial_watermark" placeholder="enter watermark ...">
                        </div>  
                        
                        <div class="form-group">
                            <label for="testmonial_heading_1">Heading 1</label>
                            <input type="text" class="form-control form-control-alt" id="testmonial_heading_1" name="testmonial_heading_1" placeholder="enter heading 1 ...">
                        </div>

                        <div class="form-group">
                            <label for="testmonial_heading_2">Heading 2 <small>Use &lt;span> to make it colored. The text below will be converted to UPPERCASE.</small></label>
                            <textarea class="form-control form-control-alt" id="testmonial_heading_2" name="testmonial_heading_2" rows="4" placeholder="enter heading 2 ..."></textarea>
                        </div> 

                        <div class="form-group">
                            <label for="testmonial_description">Description</label>
                            <textarea class="form-control form-control-alt" id="testmonial_description" name="testmonial_description" rows="4" placeholder="enter description ..."></textarea>
                        </div>
                 
                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="testmonial_status" name="testmonial_status">
                                <label class="custom-control-label" for="testmonial_status"><b>Publish</b></label>
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