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
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Project Item section</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Sixth section</h2>
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
                        <h3 class="block-title">Project item section data</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-responsive table-bordered table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%">Status</th>                      
                                    <th style="width: 15%">Title</th>
                                    <th style="width: 20%">Description</th>         
                                    <th class="text-center" style="width: 15%">Images</th>
                                    <th class="text-center" style="width: 15%">Category</th>
                                    <th style="width: 15%">Client</th>
                                    <th class="text-center" style="width: 10%">Action</th>                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pitem_rows as $pitem_row)
                                    <tr>
                                        <td class="text-center">   
                                            @if($pitem_row->status == 'PUBLISHED')                
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                    {{$pitem_row->status}}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    {{$pitem_row->status}}
                                                </span>
                                            @endif
                                        </td>

                                        <td class="font-size-sm">
                                            {!!$pitem_row->title!!}
                                        </td>

                                        <td class="font-size-sm">
                                            {{cutParagraph($pitem_row->description, 60)}}
                                        </td>

                                        <td class="text-center">
                                            @if(isset($pitem_row->images))
                                                @foreach ($pitem_row->images as $image)
                                                    <img src="{{asset('storage/images/pitem_section/'.$image)}}" alt="" style="width: 100%">
                                                @endforeach
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if(count($pitem_row->category)>0)
                                                @foreach ($pitem_row->category as $item)
                                                    {{$item}}@if($loop->index < count($pitem_row->category)-1),@endif
                                                @endforeach
                                            @endif
                                        </td>  
                                      
                                        <td class="text-center">
                                            {{$pitem_row->client}}
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#edit_row_modal_{{$pitem_row->id}}" type="button" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_row_modal_{{$pitem_row->id}}" type="button" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                                <form id="form_del_pitem_row_{{$pitem_row->id}}" style="display:none" method="POST" action="{{route('delete_backend_pitem', ['id' => $pitem_row->id])}}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </div>
                                        </td>                                                
                                    </tr>

                                    <!--confirm delete modal-->
                                    <div class="modal" id="delete_row_modal_{{$pitem_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_del_pitem_row_{{$pitem_row->id}}').submit()" ><i class="fa fa-check mr-1"></i>Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--edit row modal-->
                                    <div class="modal" id="edit_row_modal_{{$pitem_row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                                                    
                                                    <form action="{{route('edit_backend_pitem', ['id' => $pitem_row->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="block-content font-size-sm">
                    
                                                            <div class="form-group">
                                                                <label for="pitem_watermark_{{$pitem_row->id}}">Watermark<small> Use &lt;span> to make the text colored.</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="pitem_watermark_{{$pitem_row->id}}" name="pitem_watermark" placeholder="enter watermark ..." value="{{$pitem_row->watermark}}">
                                                            </div>  
                                    
                                                            <div class="form-group">
                                                                <label for="pitem_title_{{$pitem_row->id}}">Title <small> Use &lt;span> to make the text colored.</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="pitem_title_{{$pitem_row->id}}" name="pitem_title" placeholder="enter title ..." value="{{$pitem_row->title}}">
                                                            </div>   
                                    
                                                            <div class="form-group">
                                                                <label for="pitem_description_{{$pitem_row->id}}">Description</label>
                                                                <textarea class="form-control form-control-alt" id="pitem_description_{{$pitem_row->id}}" name="pitem_description" rows="4" placeholder="enter description ...">{{$pitem_row->description}}</textarea>
                                                            </div> 
                                    
                                                            <div class="form-group">
                                                                <label for="pitem_description_{{$pitem_row->id}}">Detail</label>
                                                                <textarea class="form-control form-control-alt" id="pitem_detail_{{$pitem_row->id}}" name="pitem_detail" rows="5" placeholder="enter detail ...">{{$pitem_row->detail}}</textarea>
                                                            </div> 
                                    
                                                            <div class="form-group">
                                                                <label>Images</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="pitem_images_{{$pitem_row->id}}" name="pitem_images[]" multiple>
                                                                    <label class="custom-file-label" for="pitem_images_{{$pitem_row->id}}">Choose new files</label>
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="pitem_category_{{$pitem_row->id}}">Category <small> Seperate the categories by a comma.</small></label>
                                                                <input type="text" class="form-control form-control-alt" id="pitem_category_{{$pitem_row->id}}" name="pitem_category" placeholder="enter categories ..."
                                                                    value="@if(isset($pitem_row->category))@foreach($pitem_row->category as $category){{$category}}@if($loop->index < count($pitem_row->category)-1),@endif @endforeach @endif"
                                                                >
                                                            </div> 
                                    
                                                            <div class="form-group">
                                                                <label>Date</label><br>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">                       
                                                                            <select class="custom-select" id="pitem_day_{{$pitem_row->id}}" name="pitem_day">
                                                                                <option @if($pitem_row->date[0] == 0) selected="selected" @endif value="0">Day</option>
                                                                                <option @if($pitem_row->date[0] == 1) selected="selected" @endif value="1">1</option>
                                                                                <option @if($pitem_row->date[0] == 2) selected="selected" @endif value="2">2</option>
                                                                                <option @if($pitem_row->date[0] == 3) selected="selected" @endif value="3">3</option>
                                                                                <option @if($pitem_row->date[0] == 4) selected="selected" @endif value="4">4</option>
                                                                                <option @if($pitem_row->date[0] == 5) selected="selected" @endif value="5">5</option>
                                                                                <option @if($pitem_row->date[0] == 6) selected="selected" @endif value="6">6</option>
                                                                                <option @if($pitem_row->date[0] == 7) selected="selected" @endif value="7">7</option>
                                                                                <option @if($pitem_row->date[0] == 8) selected="selected" @endif value="8">8</option>
                                                                                <option @if($pitem_row->date[0] == 9) selected="selected" @endif value="9">9</option>
                                    
                                                                                <option @if($pitem_row->date[0] == 10) selected="selected" @endif value="10">10</option>
                                                                                <option @if($pitem_row->date[0] == 11) selected="selected" @endif value="11">11</option>
                                                                                <option @if($pitem_row->date[0] == 12) selected="selected" @endif value="12">12</option>
                                                                                <option @if($pitem_row->date[0] == 13) selected="selected" @endif value="13">13</option>
                                                                                <option @if($pitem_row->date[0] == 14) selected="selected" @endif value="14">14</option>
                                                                                <option @if($pitem_row->date[0] == 15) selected="selected" @endif value="15">15</option>
                                                                                <option @if($pitem_row->date[0] == 16) selected="selected" @endif value="16">16</option>
                                                                                <option @if($pitem_row->date[0] == 17) selected="selected" @endif value="17">17</option>
                                                                                <option @if($pitem_row->date[0] == 18) selected="selected" @endif value="18">18</option>
                                                                                <option @if($pitem_row->date[0] == 19) selected="selected" @endif value="19">19</option>
                                    
                                                                                <option @if($pitem_row->date[0] == 20) selected="selected" @endif value="20">20</option>
                                                                                <option @if($pitem_row->date[0] == 21) selected="selected" @endif value="21">21</option>
                                                                                <option @if($pitem_row->date[0] == 22) selected="selected" @endif value="22">22</option>
                                                                                <option @if($pitem_row->date[0] == 23) selected="selected" @endif value="23">23</option>
                                                                                <option @if($pitem_row->date[0] == 24) selected="selected" @endif value="24">24</option>
                                                                                <option @if($pitem_row->date[0] == 25) selected="selected" @endif value="25">25</option>
                                                                                <option @if($pitem_row->date[0] == 26) selected="selected" @endif value="26">26</option>
                                                                                <option @if($pitem_row->date[0] == 27) selected="selected" @endif value="27">27</option>
                                                                                <option @if($pitem_row->date[0] == 28) selected="selected" @endif value="28">28</option>
                                                                                <option @if($pitem_row->date[0] == 29) selected="selected" @endif value="29">29</option>
                                    
                                                                                <option @if($pitem_row->date[0] == 30) selected="selected" @endif value="30">30</option>
                                                                                <option @if($pitem_row->date[0] == 31) selected="selected" @endif value="31">31</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">                                  
                                                                            <select class="custom-select" id="pitem_month_{{$pitem_row->id}}" name="pitem_month">
                                                                                <option @if($pitem_row->date[1] == 0) selected="selected" @endif value="0">Month</option>
                                                                                <option @if($pitem_row->date[1] == 1) selected="selected" @endif value="1">Janauary</option>
                                                                                <option @if($pitem_row->date[1] == 2) selected="selected" @endif value="2">Feburary</option>
                                                                                <option @if($pitem_row->date[1] == 3) selected="selected" @endif value="3">March</option>
                                                                                <option @if($pitem_row->date[1] == 4) selected="selected" @endif value="4">April</option>
                                                                                <option @if($pitem_row->date[1] == 5) selected="selected" @endif value="5">May</option>
                                                                                <option @if($pitem_row->date[1] == 6) selected="selected" @endif value="6">June</option>
                                                                                <option @if($pitem_row->date[1] == 7) selected="selected" @endif value="7">July</option>
                                                                                <option @if($pitem_row->date[1] == 8) selected="selected" @endif value="8">August</option>
                                                                                <option @if($pitem_row->date[1] == 9) selected="selected" @endif value="9">September</option>
                                                                                <option @if($pitem_row->date[1] == 10) selected="selected" @endif value="10">Octuber</option>
                                                                                <option @if($pitem_row->date[1] == 11) selected="selected" @endif value="11">November</option>
                                                                                <option @if($pitem_row->date[1] == 12) selected="selected" @endif value="12">December</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <select class="custom-select" id="pitem_year_{{$pitem_row->id}}" name="pitem_year">
                                                                                <option @if($pitem_row->date[2] == 0) selected="selected" @endif value="0">Year</option>
                                                                                <option @if($pitem_row->date[2] == 2015) selected="selected" @endif value="2015">2015</option>
                                                                                <option @if($pitem_row->date[2] == 2016) selected="selected" @endif value="2016">2016</option>
                                                                                <option @if($pitem_row->date[2] == 2017) selected="selected" @endif value="2017">2017</option>
                                                                                <option @if($pitem_row->date[2] == 2018) selected="selected" @endif value="2018">2018</option>
                                                                                <option @if($pitem_row->date[2] == 2019) selected="selected" @endif value="2019">2019</option>
                                                                                <option @if($pitem_row->date[2] == 2020) selected="selected" @endif value="2020">2020</option>
                                                                                <option @if($pitem_row->date[2] == 2021) selected="selected" @endif value="2021">2021</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="pitem_client_{{$pitem_row->id}}">Client's name</label>
                                                                <input type="text" class="form-control form-control-alt" id="pitem_client_{{$pitem_row->id}}" name="pitem_client" placeholder="enter client's name ..." value="{{$pitem_row->client}}">
                                                            </div> 
                                    
                                                            <div class="form-group">
                                                                <label for="pitem_skill_{{$pitem_row->id}}">Skill</label>
                                                                <input type="text" class="form-control form-control-alt" id="pitem_skill_{{$pitem_row->id}}" name="pitem_skill" placeholder="enter skills used ..." value="{{$pitem_row->skill}}">
                                                            </div> 
                                    
                                                            <div class="form-group">
                                                                <label for="pitem_location_{{$pitem_row->id}}">Location</label>
                                                                <input type="text" class="form-control form-control-alt" id="pitem_location_{{$pitem_row->id}}" name="pitem_location" placeholder="enter client's location ..." value="{{$pitem_row->location}}">
                                                            </div>                                           
                                                    
                                                            <div class="form-group">    
                                                                <div class="custom-control custom-switch mb-1">
                                                                    <input type="checkbox" class="custom-control-input" id="pitem_status_{{$pitem_row->id}}" name="pitem_status" @if($pitem_row->status == 'PUBLISHED') checked @endif>
                                                                    <label class="custom-control-label" for="pitem_status_{{$pitem_row->id}}"><b>Publish</b></label>
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
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                
                <form action="{{route('add_backend_pitem')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content font-size-sm">
                       
                        <div class="form-group">
                            <label for="pitem_watermark">Watermark<small> Use &lt;span> to make the text colored.</small></label>
                            <input type="text" class="form-control form-control-alt" id="pitem_watermark" name="pitem_watermark" placeholder="enter watermark ...">
                        </div>  

                        <div class="form-group">
                            <label for="pitem_title">Title <small> Use &lt;span> to make the text colored.</small></label>
                            <input type="text" class="form-control form-control-alt" id="pitem_title" name="pitem_title" placeholder="enter title ...">
                        </div>   

                        <div class="form-group">
                            <label for="pitem_description">Description</label>
                            <textarea class="form-control form-control-alt" id="pitem_description" name="pitem_description" rows="4" placeholder="enter description ..."></textarea>
                        </div> 

                        <div class="form-group">
                            <label for="pitem_description">Detail</label>
                            <textarea class="form-control form-control-alt" id="pitem_detail" name="pitem_detail" rows="5" placeholder="enter detail ..."></textarea>
                        </div> 

                        <div class="form-group">
                            <label>Images</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="pitem_images" name="pitem_images[]" multiple>
                                <label class="custom-file-label" for="pitem_images">Choose files</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pitem_category">Category <small> Seperate the categories by a comma.</small></label>
                            <input type="text" class="form-control form-control-alt" id="pitem_category" name="pitem_category" placeholder="enter categories ...">
                        </div> 

                        <div class="form-group">
                            <label>Date</label><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">                       
                                        <select class="custom-select" id="pitem_day" name="pitem_day">
                                            <option value="0">Day</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>

                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>

                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>

                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">                                  
                                        <select class="custom-select" id="pitem_month" name="pitem_month">
                                            <option value="0">Month</option>
                                            <option value="1">Janauary</option>
                                            <option value="2">Feburary</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">Octuber</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="custom-select" id="pitem_year" name="pitem_year">
                                            <option value="0">Year</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pitem_client">Client's name</label>
                            <input type="text" class="form-control form-control-alt" id="pitem_client" name="pitem_client" placeholder="enter client's name ...">
                        </div> 

                        <div class="form-group">
                            <label for="pitem_skill">Skill</label>
                            <input type="text" class="form-control form-control-alt" id="pitem_skill" name="pitem_skill" placeholder="enter skills used ...">
                        </div> 

                        <div class="form-group">
                            <label for="pitem_location">Location</label>
                            <input type="text" class="form-control form-control-alt" id="pitem_location" name="pitem_location" placeholder="enter client's location ...">
                        </div> 

                        <div class="form-group">    
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="pitem_status" name="pitem_status">
                                <label class="custom-control-label" for="pitem_status"><b>Publish</b></label>
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