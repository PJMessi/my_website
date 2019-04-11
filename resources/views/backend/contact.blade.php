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
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Contact</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Update all contact info here</h2>
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
                        <h3 class="block-title">Contact data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%">Status</th>

                                    <th class="text-center" style="width: 12%;">Email</th>
                                    <th class="text-center" style="width: 12%;">Phone</th>     
                                    <th class="text-center" style="width: 12%;">Address</th>
                                    <th class="text-center" style="width: 11%;">Facebook</th>
                                    <th class="text-center" style="width: 11%;">Linked In</th>
                                    <th class="text-center" style="width: 11%;">Github</th>
                                    <th class="text-center" style="width: 11%;">Twitter</th>

                                    <th class="text-center" style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contact_rows as $contact_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($contact_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$contact_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$contact_row->status}}
                                                </span>
                                            @endif
                                        </td>
                                        
                                        <td class="text-center">
                                            {{$contact_row->email}}
                                        </td>
                                        
                                        <td class="text-center">
                                            {{$contact_row->phone}}
                                        </td>

                                        <td class="text-center">
                                            {{$contact_row->address}}
                                        </td>
                                      
                                        <td class="text-center">
                                            {{$contact_row->facebook}}
                                        </td>

                                        <td class="text-center">
                                            {{$contact_row->linkedIn}}
                                        </td>

                                        <td class="text-center">
                                            {{$contact_row->github}}
                                        </td>

                                        <td class="text-center">
                                            {{$contact_row->twitter}}
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$contact_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$contact_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_contact_row_{{$contact_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_contact', ['id' => $contact_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$contact_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_contact_row_{{$contact_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$contact_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
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
                                                    
                                                    <form action="{{route('edit_backend_contact', ['id' => $contact_row->id])}}" method="POST">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">
                                                            <div class="form-group">
                                                                <label for="contact_email_{{$contact_row->id}}">Email</label>
                                                                <input type="email" class="form-control form-control-alt" id="contact_email_{{$contact_row->id}}" name="contact_email" placeholder="enter email ..." value="{{$contact_row->email}}">
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="contact_phone_{{$contact_row->id}}">Phone</label>
                                                                <input type="text" class="form-control form-control-alt" id="contact_phone_{{$contact_row->id}}" name="contact_phone" placeholder="enter phone no. ..." value="{{$contact_row->phone}}">
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="contact_address_{{$contact_row->id}}">Address</label>
                                                                <input type="text" class="form-control form-control-alt" id="contact_address_{{$contact_row->id}}" name="contact_address" placeholder="enter address ..." value="{{$contact_row->address}}">
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="contact_facebook_{{$contact_row->id}}">Facebook</label>
                                                                <input type="text" class="form-control form-control-alt" id="contact_facebook_{{$contact_row->id}}" name="contact_facebook" placeholder="enter facebook account link ..." value="{{$contact_row->facebook}}">
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="contact_linkedIn_{{$contact_row->id}}">Linked In</label>
                                                                <input type="text" class="form-control form-control-alt" id="contact_linkedIn_{{$contact_row->id}}" name="contact_linkedIn" placeholder="enter linked in account link ..." value="{{$contact_row->linkedIn}}">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="contact_github_{{$contact_row->id}}">Github</label>
                                                                <input type="text" class="form-control form-control-alt" id="contact_github{{$contact_row->id}}" name="contact_github" placeholder="enter github account link ..." value="{{$contact_row->github}}">
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="contact_twitter_{{$contact_row->id}}">Twitter</label>
                                                                <input type="text" class="form-control form-control-alt" id="contact_twitter_{{$contact_row->id}}" name="contact_twitter" placeholder="enter github twitter link ..." value="{{$contact_row->twitter}}">
                                                            </div>
                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="contact_status_{{$contact_row->id}}" name="contact_status" @if($contact_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="contact_status_{{$contact_row->id}}"><b>Publish</b></label>
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
                
                <form action="{{route('add_backend_contact')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">

                        <div class="form-group">
                            <label for="contact_email">Email</label>
                            <input type="email" class="form-control form-control-alt" id="contact_email" name="contact_email" placeholder="enter email ...">
                        </div>

                        <div class="form-group">
                            <label for="contact_phone">Phone</label>
                            <input type="text" class="form-control form-control-alt" id="contact_phone" name="contact_phone" placeholder="enter phone no. ...">
                        </div>

                        <div class="form-group">
                            <label for="contact_address">Address</label>
                            <input type="text" class="form-control form-control-alt" id="contact_address" name="contact_address" placeholder="enter address ...">
                        </div>

                        <div class="form-group">
                            <label for="contact_facebook">Facebook</label>
                            <input type="text" class="form-control form-control-alt" id="contact_facebook" name="contact_facebook" placeholder="enter facebook account link ...">
                        </div>

                        <div class="form-group">
                            <label for="contact_linkedIn">Linked In</label>
                            <input type="text" class="form-control form-control-alt" id="contact_linkedIn" name="contact_linkedIn" placeholder="enter linked in account link ...">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_github">Github</label>
                            <input type="text" class="form-control form-control-alt" id="contact_github" name="contact_github" placeholder="enter github account link ...">
                        </div>

                        <div class="form-group">
                            <label for="contact_twitter">Twitter</label>
                            <input type="text" class="form-control form-control-alt" id="contact_twitter" name="contact_twitter" placeholder="enter github twitter link ...">
                        </div>

                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="contact_status" name="contact_status">
                                <label class="custom-control-label" for="contact_status"><b>Publish</b></label>
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