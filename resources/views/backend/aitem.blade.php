@extends('backend.layouts.be_layout')

@section('content')

<main id="main-container">

    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url('{{asset("backend/media/photos/photo3@2x.jpg")}}');">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">About Item section</h1>
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
                        <h3 class="block-title">About item section data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%">Status</th>
                                    <th class="text-center" style="width: 20%;">Icon Class</th>
                                    <th class="text-center"  style="width: 25%;">Heading</th>
                                    <th style="width: 35%;">Description</th>
                                    <th style="width: 10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aitem_rows as $aitem_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($aitem_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$aitem_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$aitem_row->status}}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{$aitem_row->icon}}
                                        </td>
                                        <td class="text-center">
                                            {{$aitem_row->heading}}
                                        </td>
                                        <td class="font-size-sm">
                                            {{$aitem_row->description}}
                                        </td>    
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$aitem_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$aitem_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_aitem_row_{{$aitem_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_aitem', ['id' => $aitem_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>                               
                                       
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$aitem_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_aitem_row_{{$aitem_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$aitem_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
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
                                                    
                                                    <form action="{{route('edit_backend_aitem', ['id' => $aitem_row->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">
                    
                                                            <div class="form-group">
                                                                <label for="aitem_icon_{{$aitem_row->id}}">Icon Class <small>Use fontawesome icon classes</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="aitem_icon_{{$aitem_row->id}}" name="aitem_icon" placeholder="enter icon class ..." value="{{$aitem_row->icon}}">
                                                            </div>  
                                    
                                                            <div class="form-group">
                                                                <label for="aitem_heading_{{$aitem_row->id}}">Heading</label>
                                                                <input type="text" class="form-control form-control-alt" id="aitem_heading_{{$aitem_row->id}}" name="aitem_heading" placeholder="enter heading ..." value="{{$aitem_row->heading}}">
                                                            </div>           
                                                            
                                                            <div class="form-group">
                                                                <label for="aitem_description_{{$aitem_row->id}}">Description</label>
                                                                <textarea class="form-control form-control-alt" id="aitem_description_{{$aitem_row->id}}" name="aitem_description" rows="4" placeholder="enter description ...">{{$aitem_row->description}}</textarea>
                                                            </div> 
                                                    
                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="aitem_status_{{$aitem_row->id}}" name="aitem_status" @if($aitem_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="aitem_status_{{$aitem_row->id}}"><b>Publish</b></label>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                
                <form action="{{route('add_backend_aitem')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">
                       
                        <div class="form-group">
                            <label for="aitem_icon">Icon Class <small>Use fontawesome icon classes</small></label>
                            <input type="text" class="form-control form-control-alt" id="aitem_icon" name="aitem_icon" placeholder="enter icon class ...">
                        </div>  

                        <div class="form-group">
                            <label for="aitem_heading">Heading</label>
                            <input type="text" class="form-control form-control-alt" id="aitem_heading" name="aitem_heading" placeholder="enter heading ...">
                        </div>           
                        
                        <div class="form-group">
                            <label for="aitem_description">Description</label>
                            <textarea class="form-control form-control-alt" id="aitem_description" name="aitem_description" rows="4" placeholder="enter description ..."></textarea>
                        </div> 
             
                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="aitem_status" name="aitem_status">
                                <label class="custom-control-label" for="aitem_status"><b>Publish</b></label>
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