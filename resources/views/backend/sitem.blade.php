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
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Skill Item section</h1>
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
                        <h3 class="block-title">Skill item section data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%">Status</th>                                    
                                    <th style="width: 15%">Heading 1</th>
                                    <th class="text-center" style="width: 25%">Items 1</th>
                                    <th style="width: 15%">Heading 2</th>
                                    <th class="text-center" style="width: 25%">Items 2</th>                                    
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sitem_rows as $sitem_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($sitem_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$sitem_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$sitem_row->status}}
                                                </span>
                                            @endif
                                        </td>                                       
                                        <td class="font-size-sm">
                                            {{$sitem_row->heading_1}}
                                        </td>
                                        <td class="text-center">
                                            @if(isset($sitem_row->items_1))
                                                @foreach($sitem_row->items_1 as $item)
                                                    {{$item[0]}} : {{$item[1]}}% <br>
                                                @endforeach
                                            @endif
                                        </td>

                                        <td class="font-size-sm">
                                            {{$sitem_row->heading_2}}
                                        </td>
                                        <td class="text-center">
                                            @if(isset($sitem_row->items_2))
                                                @foreach($sitem_row->items_2 as $item)
                                                    {{$item[0]}} : {{$item[1]}}% <br>
                                                @endforeach
                                            @endif
                                        </td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$sitem_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$sitem_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_sitem_row_{{$sitem_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_sitem', ['id' => $sitem_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>                               
                                       
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$sitem_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_sitem_row_{{$sitem_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$sitem_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
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
                                                    
                                                    <form action="{{route('edit_backend_sitem', ['id' => $sitem_row->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">
                    
                                                                <div class="form-group">
                                                                    <label for="sitem_heading_1_{{$sitem_row->id}}">Heading 1</label>
                                                                    <input type="text" class="form-control form-control-alt" id="sitem_heading_1_{{$sitem_row->id}}" name="sitem_heading_1" placeholder="enter first heading ..." value="{{$sitem_row->heading_1}}">
                                                                </div>  
                                        
                                                                <div class="form-group">
                                                                    <label for="sitem_description_1_{{$sitem_row->id}}">Description 1</label>
                                                                    <textarea class="form-control form-control-alt" id="sitem_description_1_{{$sitem_row->id}}" name="sitem_description_1" rows="4" placeholder="enter first description ...">{{$sitem_row->description_1}}</textarea>
                                                                </div> 
                                        
                                                                <div class="form-group">
                                                                    <label for="sitem_items_1_{{$sitem_row->id}}">Items 1 <small>Write data in this form: item:percent, item:percent eg. PHP:80, HTML:90</small></label>
                                                                    <textarea class="form-control form-control-alt" id="sitem_items_1_{{$sitem_row->id}}" name="sitem_items_1" rows="4" placeholder="enter item data ...">
                                                                        @if(isset($sitem_row->items_1))
                                                                            @foreach($sitem_row->items_1 as $item)
                                                                                {{$item[0]}} : {{$item[1]}}@if( $loop->index < sizeof($sitem_row->items_1)-1 ),@endif
                                                                            @endforeach
                                                                        @endif
                                                                    </textarea>
                                                                </div>
                                        
                                                                <div class="form-group">
                                                                    <label for="sitem_heading_2_{{$sitem_row->id}}">Heading 2</label>
                                                                    <input type="text" class="form-control form-control-alt" id="sitem_heading_2_{{$sitem_row->id}}" name="sitem_heading_2" placeholder="enter second heading ..." value="{{$sitem_row->heading_2}}">
                                                                </div>  
                                        
                                                                <div class="form-group">
                                                                    <label for="sitem_description_2_{{$sitem_row->id}}">Description 2</label>
                                                                    <textarea class="form-control form-control-alt" id="sitem_description_2_{{$sitem_row->id}}" name="sitem_description_2" rows="4" placeholder="enter second description ...">{{$sitem_row->description_2}}</textarea>
                                                                </div>       
                                                                
                                                                <div class="form-group">
                                                                    <label for="sitem_items_2_{{$sitem_row->id}}">Items 2 <small>Write data in this form: item:percent, item:percent eg. PHP:80, HTML:90</small></label>
                                                                    <textarea class="form-control form-control-alt" id="sitem_items_2_{{$sitem_row->id}}" name="sitem_items_2" rows="4" placeholder="enter item data ...">
                                                                            @if(isset($sitem_row->items_2))
                                                                            @foreach($sitem_row->items_2 as $item)
                                                                                {{$item[0]}} : {{$item[1]}}@if( $loop->index < sizeof($sitem_row->items_2)-1 ),@endif
                                                                            @endforeach
                                                                        @endif
                                                                    </textarea>
                                                                </div>                                         
                                                    
                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="sitem_status_{{$sitem_row->id}}" name="sitem_status" @if($sitem_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="sitem_status_{{$sitem_row->id}}"><b>Publish</b></label>
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
                
                <form action="{{route('add_backend_sitem')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">
                       
                        <div class="form-group">
                            <label for="sitem_heading_1">Heading 1</label>
                            <input type="text" class="form-control form-control-alt" id="sitem_heading_1" name="sitem_heading_1" placeholder="enter first heading ...">
                        </div>  

                        <div class="form-group">
                            <label for="sitem_description_1">Description 1</label>
                            <textarea class="form-control form-control-alt" id="sitem_description_1" name="sitem_description_1" rows="4" placeholder="enter first description ..."></textarea>
                        </div> 

                        <div class="form-group">
                            <label for="sitem_items_1">Items 1 <small>Write data in this form: item:percent, item:percent eg. PHP:80, HTML:90</small></label>
                            <textarea class="form-control form-control-alt" id="sitem_items_1" name="sitem_items_1" rows="4" placeholder="enter item data ..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="sitem_heading_2">Heading 2</label>
                            <input type="text" class="form-control form-control-alt" id="sitem_heading_2" name="sitem_heading_2" placeholder="enter second heading ...">
                        </div>  

                        <div class="form-group">
                            <label for="sitem_description_2">Description 2</label>
                            <textarea class="form-control form-control-alt" id="sitem_description_2" name="sitem_description_2" rows="4" placeholder="enter second description ..."></textarea>
                        </div>       
                        
                        <div class="form-group">
                            <label for="sitem_items_2">Items 2 <small>Write data in this form: item:percent, item:percent eg. PHP:80, HTML:90</small></label>
                            <textarea class="form-control form-control-alt" id="sitem_items_2" name="sitem_items_2" rows="4" placeholder="enter item data ..."></textarea>
                        </div>

                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="sitem_status" name="sitem_status">
                                <label class="custom-control-label" for="sitem_status"><b>Publish</b></label>
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