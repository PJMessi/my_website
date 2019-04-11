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
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Miscellaneous section</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Edit all miscellaneous elements here.</h2>
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
                        <h3 class="block-title">Miscellaneous section data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%">Status</th>
                                    <th style="width: 10%;">Title</th>
                                    <th style="width: 10%;">TR Button</th>
                                    <th style="width: 15%;">Footer</th>
                                    <th style="width: 15%;">Logo</th>
                                    <th style="width: 15%;">Text Logo</th>
                                    <th style="width: 15%;">Favicon</th>
                                    <th class="text-center" style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($miscellaneous_rows as $miscellaneous_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($miscellaneous_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$miscellaneous_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$miscellaneous_row->status}}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="font-size-sm">
                                            {{$miscellaneous_row->title}}
                                        </td>
                                        <td class="font-size-sm">      
                                            {{$miscellaneous_row->trButton[1]}}
                                        </td>
                                        <td class="font-size-sm">      
                                            {!!$miscellaneous_row->footer!!}
                                        </td>
                                      
                                        <td class="text-center">
                                            <img style="width:100%;" src="{{asset('storage/images/'.$miscellaneous_row->logo)}}" alt="logo image">
                                        </td>

                                        <td class="text-center">
                                            <img style="width:100%;" src="{{asset('storage/images/'.$miscellaneous_row->txt_logo)}}" alt="text logo image">
                                        </td>

                                        <td class="text-center">
                                            <img style="width:100%;" src="{{asset('storage/images/'.$miscellaneous_row->favicon)}}" alt="favicon image">
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$miscellaneous_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$miscellaneous_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_miscellaneous_row_{{$miscellaneous_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_miscellaneous', ['id' => $miscellaneous_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$miscellaneous_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_miscellaneous_row_{{$miscellaneous_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$miscellaneous_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
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
                                                    
                                                    <form action="{{route('edit_backend_miscellaneous', ['id' => $miscellaneous_row->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">
                                                            <div class="form-group">
                                                                <label for="miscellaneous_title_{{$miscellaneous_row->id}}">Page Title</label>
                                                                <input type="text" class="form-control form-control-alt" id="miscellaneous_title_{{$miscellaneous_row->id}}" name="miscellaneous_title" value="{{$miscellaneous_row->title}}" placeholder="enter page title ...">
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="miscellaneous_trButton_text_{{$miscellaneous_row->id}}">TR Button <small>The text below will be converted to uppercase.</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="miscellaneous_trButton_text_{{$miscellaneous_row->id}}" name="miscellaneous_trButton_text" value="{{$miscellaneous_row->trButton[0]}}" placeholder="enter button label ...">
                                                                <br><input type="text" class="form-control form-control-alt" id="miscellaneous_trButton_title_{{$miscellaneous_row->id}}" name="miscellaneous_trButton_title" value="{{$miscellaneous_row->trButton[1]}}" placeholder="enter button link ...">
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="miscellaneous_footer_{{$miscellaneous_row->id}}">Footer</label>
                                                                <textarea class="form-control form-control-alt" id="miscellaneous_footer_{{$miscellaneous_row->id}}" name="miscellaneous_footer" rows="4" placeholder="enter heading ...">{{$miscellaneous_row->footer}}</textarea>
                                                            </div>  
                                                        
                                                            <div class="form-group">
                                                                <label>Logo</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="miscellaneous_logo_{{$miscellaneous_row->id}}" name="miscellaneous_logo">
                                                                    <label class="custom-file-label" for="miscellaneous_logo_{{$miscellaneous_row->id}}">choose new image</label>
                                                                </div>
                                                            </div>   
                                    
                                                            <div class="form-group">
                                                                <label>Text Logo</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="miscellaneous_txt_logo_{{$miscellaneous_row->id}}" name="miscellaneous_txt_logo">
                                                                    <label class="custom-file-label" for="miscellaneous_txt_logo_{{$miscellaneous_row->id}}">choose new image</label>
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label>Favicon</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="miscellaneous_favicon_{{$miscellaneous_row->id}}" name="miscellaneous_favicon">
                                                                    <label class="custom-file-label" for="miscellaneous_favicon_{{$miscellaneous_row->id}}">choose new image</label>
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="miscellaneous_status_{{$miscellaneous_row->id}}" name="miscellaneous_status" @if($miscellaneous_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="miscellaneous_status_{{$miscellaneous_row->id}}"><b>Publish</b></label>
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
                
                <form action="{{route('add_backend_miscellaneous')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">

                        <div class="form-group">
                            <label for="miscellaneous_title">Page Title</label>
                            <input type="text" class="form-control form-control-alt" id="miscellaneous_title" name="miscellaneous_title" placeholder="enter page title ...">
                        </div>

                        <div class="form-group">
                            <label for="miscellaneous_trButton_text">TR Button <small>The text below will be converted to uppercase.</small></label>
                            <input type="text" class="form-control form-control-alt" id="miscellaneous_trButton_text" name="miscellaneous_trButton_text" placeholder="enter button label ...">
                            <br><input type="text" class="form-control form-control-alt" id="miscellaneous_trButton_title" name="miscellaneous_trButton_title" placeholder="enter button link ...">
                        </div>

                        <div class="form-group">
                            <label for="miscellaneous_footer">Footer</label>
                            <textarea class="form-control form-control-alt" id="miscellaneous_footer" name="miscellaneous_footer" rows="4" placeholder="enter heading ..."></textarea>
                        </div>  
                 
                        <div class="form-group">
                            <label>Logo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="miscellaneous_logo" name="miscellaneous_logo">
                                <label class="custom-file-label" for="miscellaneous_logo">choose image</label>
                            </div>
                        </div>   

                        <div class="form-group">
                            <label>Text Logo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="miscellaneous_txt_logo" name="miscellaneous_txt_logo">
                                <label class="custom-file-label" for="miscellaneous_txt_logo">choose image</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Favicon</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="miscellaneous_favicon" name="miscellaneous_favicon">
                                <label class="custom-file-label" for="miscellaneous_favicon">choose image</label>
                            </div>
                        </div> 

                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="miscellaneous_status" name="miscellaneous_status">
                                <label class="custom-control-label" for="miscellaneous_status"><b>Publish</b></label>
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