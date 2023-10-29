<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">All Contents</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddContent">Add New Content</a>
                        </div>
                    </div>             
                </div>
                <br>
                <div class="col-12">

                    <div class="row">

                    <label for="paginate" style="margin-top: auto;margin-left: auto;">Show</label>
                    <div class="col-sm-2">
                    <select id="paginate" name="paginate" class="form-control input-sm" wire:model="paginate">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    </div>  
                    <div class="col-sm-6"></div>
                    <div class="col-sm-3">
                        <input type="search" wire:model="search" class="form-control input-sm" placeholder="Search">
                    </div>
                    </div>
                    <br>
                    <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                        <thead style="text-align: center;">
                        <tr>
                            <th wire:click="sortBy('id')">S/N</th>
                            <th wire:click="sortBy('name')">Name</th>
                            <th wire:click="sortBy('designation')">Designation</th>
                            <th wire:click="sortBy('institution')">Institution</th>
                            <th wire:click="sortBy('email')">Email</th>
                            <th wire:click="sortBy('phone')">Phone</th>
                            <th wire:click="sortBy('title')">Title</th>
                            <th wire:click="sortBy('content_type')">Type</th>
                            <th >Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allContents as $pro=>$content_all)
                                <tr>
                                    <td>{{ $content_all->id }}</td>
                                    <td>{{ $content_all->name }}</td>
                                    <td>{{ $content_all->designation }}</td>
                                    <td>{{ $content_all->institution }}</td>
                                    <td>{{ $content_all->email }}</td>
                                    <td>{{ $content_all->phone }}</td>
                                    <td>{{ $content_all->title }}</td>
                                    <td>{{ $content_all->content_type }}</td>
                                    <td>
                                        <input type="hidden" id="{{ $content_all->id }}hi_des" value="{{ $content_all->description }}">
                                        <a onclick="editFunction('{{ $content_all->id }}')" class="btn btn-warning btn-sm text-white" wire:click="getContent('{{ $content_all->id }}')" data-toggle="modal" data-target="#modalEditContent">Edit</a>
                                        <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $content_all->id }}')" data-toggle="modal" data-target="#modalDeleteComponent">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allContents->links() }}
                </div>
            </div>
        </div>
        <!-- Appointments -->


        <!--==========================
          =  Modal window for Add Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalAddContent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="storeContent()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Add Content</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="name" placeholder="Name" required wire:model="name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Designation:</strong>
                                        <input type="text" class="form-control" name="designation" placeholder="Designation" wire:model="designation">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Institution:</strong>
                                        <input type="text" class="form-control" name="institution" placeholder="Institution" wire:model="institution">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Email:</strong>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required wire:model="email">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Phone:</strong>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" required wire:model="phone">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Title:</strong>
                                        <input type="text" class="form-control" name="title" placeholder="Title" required wire:model="title">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Description:</strong>
                                        <textarea id="description" class="form-control" name="description" placeholder="Description" rows="4" required wire:model="description"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Image:</strong>
                                        <input type="file" class="input-file input-md" wire:model="image">
                                        <br>
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                        @endif
                                        {{-- <textarea class="form-control" name="description" placeholder="Description" required wire:model="description"></textarea> --}}
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Facebook Link:</strong>
                                        <input type="text" class="form-control" name="fb_url" placeholder="Facebook Link" wire:model="fb_url">
                                      </div>
                                    </div>
                                  </div>


                                 <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Content Type:</strong>
                                        <select class="form-control" name="department_id" placeholder="Select" required wire:model="content_type">
                                            <option value="" selected="selected">Select Content Type</option>
                                            <option value="More About Blood" selected="selected">More About Blood</option>
                                            <option value="News" selected="selected">News</option>
                                            <option value="Recent Events" selected="selected">Recent Events</option>
                                            <option value="Upcoming Event" selected="selected">Upcoming Event</option>
                                            <option value="Blog" selected="selected">Blog</option>

                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  @if($content_type === "Upcoming Event")

                                    <div class="form-group" wire:ignore>          
                                        <div class="input-group">             
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                            <strong>Start Date & Time:</strong>
                                            <input type="datetime-local" class="form-control" name="event_start_date" placeholder="Start Date & Time" wire:model="event_start_date">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group" wire:ignore>          
                                        <div class="input-group">             
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                            <strong>End Date & Time:</strong>
                                            <input type="datetime-local" class="form-control" name="event_end_date" placeholder="End Date & Time" wire:model="event_end_date">
                                          </div>
                                        </div>
                                      </div>

                                  @endif

                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                          </div>
                    </form>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!--==========================
          =  Modal window for Edit Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditContent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateContent()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Content</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="e_name" placeholder="Name" required wire:model="e_name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Designation:</strong>
                                        <input type="text" class="form-control" name="e_designation" placeholder="Designation" wire:model="e_designation">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Institution:</strong>
                                        <input type="text" class="form-control" name="e_institution" placeholder="Institution" wire:model="e_institution">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Email:</strong>
                                        <input type="email" class="form-control" name="e_email" placeholder="Email" required wire:model="e_email">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Phone:</strong>
                                        <input type="text" class="form-control" name="e_phone" placeholder="Phone" required wire:model="e_phone">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Title:</strong>
                                        <input type="text" class="form-control" name="e_title" placeholder="Title" required wire:model="e_title">
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Description:</strong>
                                        <textarea id="e_description" class="form-control" name="e_description" placeholder="Description" rows="4" required wire:model="e_description">{{ $e_description }}</textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Image:</strong>
                                        <input type="file" class="input-file input-md" wire:model="e_image">
                                        <br>
                                        @if($e_image)
                                            <img src="{{ $e_image->temporaryUrl() }}" width="120">
                                        @else
                                           <img src="{{ $old_image }}" width="120">
                                        @endif
                                        {{-- <textarea class="form-control" name="description" placeholder="Description" required wire:model="description"></textarea> --}}
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Facebook Link:</strong>
                                        <input type="text" class="form-control" name="e_fb_url" placeholder="Facebook Link" wire:model="e_fb_url">
                                      </div>
                                    </div>
                                  </div>


                                 <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Content Type:</strong>
                                        <select class="form-control" name="e_department_id" placeholder="Select" required wire:model="e_content_type">
                                            <option value="" selected="selected">Select Content Type</option>
                                            <option value="More About Blood" selected="selected">More About Blood</option>
                                            <option value="News" selected="selected">News</option>
                                            <option value="Recent Events" selected="selected">Recent Events</option>
                                            <option value="Upcoming Event" selected="selected">Upcoming Event</option>
                                            <option value="Blog" selected="selected">Blog</option>

                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  @if($content_type === "Upcoming Event")

                                    <div class="form-group" wire:ignore>          
                                        <div class="input-group">             
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                            <strong>Start Date & Time:</strong>
                                            <input type="datetime-local" class="form-control" name="e_event_start_date" placeholder="Start Date & Time" wire:model="e_event_start_date">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group" wire:ignore>          
                                        <div class="input-group">             
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                            <strong>End Date & Time:</strong>
                                            <input type="datetime-local" class="form-control" name="e_event_end_date" placeholder="End Date & Time" wire:model="e_event_end_date">
                                          </div>
                                        </div>
                                      </div>

                                  @endif

                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                          </div>
                    </form>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--==========================
          =  Modal window for Delete    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalDeleteComponent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Entry</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                 <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h2 class="text-center" style="color:red;">Are you want to delete?</h2>
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" wire:click.prevent="delete()" class="btn btn-success waves-effect waves-light">Confirm</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                    
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        @push('scripts')
        <script>
          $(document).ready(function() {
            $('#description').summernote({
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });


          });

          function editFunction(id) {
              var des = document.getElementById(id+"hi_des").value;
                console.log(id);
                console.log(des);

                $('#e_description').summernote({
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('e_description', contents);
                        }
                    }
                }).summernote('code', des);
            }
        </script>
        @endpush
        <style type="text/css">
            table {
              font-size: .80rem;
            }
        </style>
</div>
