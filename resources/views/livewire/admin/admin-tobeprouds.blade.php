<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">রক্ত যোদ্ধা</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
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
                            <th wire:click="sortBy('sender_email')">Email</th>
                            <th wire:click="sortBy('sender_type')">Type</th>
                            <th wire:click="sortBy('donate_date')">Donate Date</th>
                            <th wire:click="sortBy('donate_place')">Place</th>
                            <th style="width:20%" wire:click="sortBy('reason_of_proud')">Reason</th>
                            <th wire:click="sortBy('status')">Status</th>
                            <th >Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allProuds as $pro=>$proud_all)
                                <tr>
                                    <td>{{ $proud_all->id }}</td>
                                    <td>{{ $proud_all->sender_email }}</td>
                                    <td>{{ $proud_all->sender_type }}</td>
                                    <td>{{ $proud_all->donate_date }}</td>
                                    <td>{{ $proud_all->donate_place }}</td>
                                    <td>{{ $proud_all->reason_of_proud }}</td>
                                    <td>{{ $proud_all->status }}</td>
                                    <td>
                                        <a class="btn btn-warning waves-effect waves-light btn-sm" wire:click="getProud('{{ $proud_all->id }}')" data-toggle="modal" data-target="#modalUpdateProud">Edit</a>

                                        <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $proud_all->id }}')" data-toggle="modal" data-target="#modalDeleteComponent">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allProuds->links() }}
                </div>
            </div>
        </div>
        <!-- Appointments -->


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




        <!--==========================
          =  Modal window for Edit Blog    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalUpdateProud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateProud()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Give Approval</h4>
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

                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Donate Place:</strong>
                                        {{-- <h1>{{ $title }}</h1> --}}
                                        <input type="text" class="form-control" name="title" placeholder="Donate Place" required wire:model="donate_place">
                                      </div>
                                    </div>
                                  </div>
                                  

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Reason:</strong>
                                        <textarea id="e_description" class="form-control" name="reason_of_proud" placeholder="Reason" rows="4" required wire:model="reason_of_proud"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  {{-- <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <img src="{{ $image }}" width="120">
                                      </div>
                                    </div>
                                  </div> --}}

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

                                 <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Give Approval:</strong>
                                        <select class="form-control" name="status" placeholder="Select" required wire:model="status">
                                            <option value="Approved">Approved</option>
                                            <option value="Not Approved">Not Approved</option>

                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  
                              
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

        
        {{-- <style type="text/css">
            table {
              font-size: .80rem;
            }
        </style> --}}
</div>
