<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">All Donors</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        <div class="col-3">
                            <a href="{{ route('add_donor') }}" class="btn btn-success float-right text-white">Add New Donor</a>
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
                    <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere; overflow-y:scroll" width="100%">
                        <thead style="text-align: center;">
                        <tr>
                            <th wire:click="sortBy('id')">ID</th>
                            <th wire:click="sortBy('fname')">First Name</th>
                            <th wire:click="sortBy('lname')">Last name</th>
                            <th wire:click="sortBy('phone')">Phone</th>
                            <th>Age</th>
                            <th wire:click="sortBy('blood_group')">Blood Group</th>
                            <th>District</th>
                            <th>Thana</th>
                            <th>Comment</th>
                            <th wire:click="sortBy('called_date')">Last Called</th>
                            <th>Reference</th>
                            <th wire:click="sortBy('donations_number')">Num. Donated</th>
                            <th wire:click="sortBy('not_available_id')">Available?</th>
                            <th wire:click="sortBy('last_donation')">Last Donation</th>
                            <th >Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allDonors as $pro=>$donor_all)
                                <tr>
                                    <td>{{ $donor_all->id }}</td>
                                    <td>{{ $donor_all->fname }}</td>
                                    <td>{{ $donor_all->lname }}</td>
                                    <td>{{ $donor_all->phone }}</td>
                                    <td>{{ $donor_all->age }}</td>
                                    <td>{{ $donor_all->blood_group }}</td>
                                    <td>{{ $donor_all->district }}</td>
                                    <td>{{ $donor_all->upazila }}</td>
                                    <td>{{ $donor_all->comment }}</td>
                                    {{-- <td>{{ $donor_all->called_date }}</td> --}}

                                    @php 

                                        $temp = false;

                                         if($donor_all->called_date == "na" || $donor_all->called_date == "" || $donor_all->called_date == null){

                                                $temp = false;

                                            }else{

                                                $date = new DateTime($donor_all->called_date);
                                                $date2 = $date->add(new DateInterval('P3D'));

                                                if ($date2> Carbon\Carbon::now()) {
                                                    $temp = true;
                                                }

                                            }

                                    @endphp

                                    @if($temp ==true)
                                    <td style="background-color: red;">
                                        <?php
                                                $date = new DateTime($donor_all->called_date);
                                                //$date->add(new DateInterval('P3D'));

                                                $timestamp = strtotime($date->format('Y-m-d H:i:s'));
                                                echo date('l dS \o\f F Y', $timestamp); 

                                                echo'  '. date('h:i a',$timestamp);

                                        ?>


                                    </td>
                                    @else
                                    <td style="background-color: #70ad47;">
                                        
                                        <?php
                                                $timestamp = strtotime($donor_all->called_date);
                                                echo date('l dS \o\f F Y', $timestamp); 

                                                echo'  '. date('h:i a',$timestamp);
                                        ?>
                                    </td>
                                    @endif

                                    {{-- <td>
                                        <?php
                                            if($donor_all->called_date == "na" || $donor_all->called_date == "" || $donor_all->called_date == null){

                                                $timestamp = strtotime($donor_all->called_date);
                                                echo date('l dS \o\f F Y', $timestamp); 

                                                echo'  '. date('h:i a',$timestamp);

                                            }else{

                                                $date = new DateTime($donor_all->called_date);
                                                $date->add(new DateInterval('P3D'));

                                                $timestamp = strtotime($date->format('Y-m-d H:i:s'));
                                                echo date('l dS \o\f F Y', $timestamp); 

                                                echo'  '. date('h:i a',$timestamp);
                                            }
                                        ?>
                                    </td> --}}

                                    <td>{{ $donor_all->reference }}</td>
                                    <td>{{ $donor_all->donations_number }}</td>
                                    {{-- @if($donor_all->not_available_id == 1)
                                    <td>Not Available</td>
                                    @else
                                    <td>Available</td>
                                    @endif --}}

                                    @php
                                        $diff = true;
                                        if ($donor_all->last_donation == "na" || $donor_all->last_donation == "" || $donor_all->last_donation == null) {
                                           $diff = true;
                                        }else{
                                            $d1 = ((new DateTime($donor_all->last_donation))->diff(new DateTime(Date('Y-m-d').'+ 1 days')));
                                            if (($d1->y)>0) {
                                                $diff = true;
                                            } else if(($d1->m)>=4){
                                                $diff = true;
                                            }else{
                                                $diff = false;
                                            }
                                            
                                        }

                                    @endphp

                                    @if($diff ==false)
                                    <td style="background-color: red;">Unavailable</td>
                                    @elseif($donor_all->last_donation == "na")
                                    <td style="background-color: #f0ad4e;">Unavailable?</td>
                                    @else
                                    <td style="background-color: #70ad47;">Available</td>
                                    @endif

                                    {{-- <td>
                                        <?php 
                                                $timestamp = strtotime($donor_all->called_date);
                                                echo date('l dS \o\f F Y', $timestamp); 

                                                echo'  '. date('h:i a',$timestamp);
                                               ?>
                                    </td> --}}

                                    <td>{{ $donor_all->last_donation }}</td>
                                    <td>

                                        <div class="btn-group dropleft">
                                          <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item btn btn-warning waves-effect waves-light btn-sm" wire:click="getComment('{{ $donor_all->id }}')" data-toggle="modal" data-target="#modalEditComment"><i class="fas fa-comment-dots"></i>  Edit Comment</a>
                                            <br>

                                            <a class="dropdown-item btn btn-secondary waves-effect waves-light btn-sm" wire:click="getReference('{{ $donor_all->id }}')" data-toggle="modal" data-target="#modalEditReference"><i class="fas fa-user"></i>  Edit Reference</a>
                                            <br>
                                            <a class="dropdown-item btn btn-primary waves-effect waves-light btn-sm" wire:click="getCall('{{ $donor_all->id }}')" data-toggle="modal" data-target="#modalEditCall"><i class="fas fa-phone-volume"></i>  Set Call Info</a>
                                            <br>
                                            <a href="{{ route('edit_donor',['id'=>$donor_all->id]) }}" class="dropdown-item btn btn-warning waves-effect waves-light btn-sm"><i class="fas fa-pen-fancy"></i>  Edit</a>
                                            <br>
                                            <a href="{{ route('donor_profile',['id'=>$donor_all->id]) }}" class="dropdown-item btn btn-success waves-effect waves-light btn-sm"><i class="fas fa-id-badge"></i>  View Profile</a>
                                            <br>

                                            <a class="dropdown-item btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $donor_all->id }}')" data-toggle="modal" data-target="#modalDeleteComponent"><i class="fas fa-trash-alt"></i>  Delete</a>
                                          </div>
                                        </div>

                                        {{-- <a class="btn btn-warning waves-effect waves-light btn-sm" wire:click="getComment('{{ $donor_all->id }}')" data-toggle="modal" data-target="#modalEditComment">Edit Comment</a>

                                        <a class="btn btn-secondary waves-effect waves-light btn-sm" wire:click="getReference('{{ $donor_all->id }}')" data-toggle="modal" data-target="#modalEditReference">Edit Reference</a>

                                        <a class="btn btn-primary waves-effect waves-light btn-sm" wire:click="getCall('{{ $donor_all->id }}')" data-toggle="modal" data-target="#modalEditCall">Set Call Info</a>

                                        <a href="{{ route('edit_donor',['id'=>$donor_all->id]) }}" class="btn btn-warning waves-effect waves-light btn-sm">Edit</a>

                                        <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $donor_all->id }}')" data-toggle="modal" data-target="#modalDeleteComponent">Delete</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allDonors->links() }}
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
          =  Modal window for Add Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditComment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateComment()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Comment</h4>
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
                                        <strong>Comment:</strong>
                                        <textarea class="form-control" name="comment" placeholder="Comment" required wire:model="comment"></textarea>
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

        <div wire:ignore.self id="modalEditCall" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Set Call Info</h4>
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
                                        <h2 class="text-center" style="color:red;">Are you want to Set Date And Time To Current Date And Time</h2>
                                        {{-- <h2>{{ $called_date }}</h2> --}}
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" wire:click.prevent="updateCall()" class="btn btn-success waves-effect waves-light">Confirm</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                    
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--==========================
          =  Modal window for Add Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditReference" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateReference()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Reference</h4>
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
                                        <strong>Reference:</strong>
                                        <input class="form-control" name="add_reference" placeholder="Reference" required wire:model="add_reference">
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
