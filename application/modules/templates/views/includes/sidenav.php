
 <!-- Main Sidebar Container -->
 
 
 <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link" style="background: #1d80b9;
    color: #FFFFFF; text-align:center;">
      <!-- <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text  font-weight-bold" style="text-align:center;"><?php echo $setting->title; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar  sido" style="width:100% !important;">
      <!-- Sidebar user (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3" style="text-align:center; line-height:0.2cm;">

      <p class="brand-image img-circle " style="color:#FEFFFF; font-size: 11px; height:20px; font-weight:bold; margin-top:2px; opacity: .8;">

      <?php  

          echo strtoupper($userdata['names']); 


          ?>
         
          

      </p>
          <hr>
        <p style="color:#FEFFFF; font-size: 10px; height:20px; font-weight:bold; margin-top:1px;">
       
        </p>
        <!-- <div class="image">
          <p ><img src="<?php echo base_url(); ?>assets/img/user.jpg" class="img-circle elevation-2" alt="User Image" style="width:35px; height:35px;"></p>
        </div> -->
      
    </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="overflow:hidden; font-size:14px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>" class="nav-link">
              <i class="fa fa-tachometer-alt"></i>
              <p>
               Main Dashboard
              </i>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Projects
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                    <a href="<?=site_url('create-project')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Project</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=site_url('project-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Projects</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Objectives
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=site_url('objective-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Objectives</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Activities
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=site_url('activity-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Activities</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                    Reports
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Project Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>DHTs Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Donation Report</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Meetings
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=base_url()?>meetings" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Meetings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Meeting Evalutions</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?=base_url()?>contacts" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Contacts
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Locations/Territory
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=site_url('district-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Branches</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=site_url('facility-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Facilities</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>DHTs</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                    Extras
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Clinic Types</p>
                    </a>
                </li>
            </ul>
        </li>

                  <!--user perm 14-->
          <?php if(in_array('35', $permissions)){ ?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-cog"></i>
              <p>
                System Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
                <li class="nav-item">

                <?php if(in_array('15', $permissions)){ ?>
                <a href="<?php echo base_url();?>auth/users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage User</p>
                </a>
                 </li>
                 <li class="nav-item">
                <a href="<?php echo base_url();?>admin/groups" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Group Permissions</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="<?php echo base_url();?>admin/showLogs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Logs</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="<?php echo base_url();?>forms/"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Constants & Variables</p>
                </a>
                  </li>
                <?php } ?>
            </ul>
          </li>
        
           <!--user perm 26-->
           <?php if(in_array('32', $permissions)){ ?>
            <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-check-square"></i>
              <p>
                Forms & Fields
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url()?>forms" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  Forms</a>
                  </li>
                  <li class="nav-item">
                  <a href="<?php echo base_url()?>forms/fields" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  Fields</a>
                  </li>
            </ul>
            </li>
            <?php } ?>


          <?php } ?>
         <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>" class="nav-link" 
            class="passchange nav-link dropdown-toggle" data-toggle="modal" role="button" 
            data-target="#changepassword">
              <i class="fa fa-lock"></i>
              <p>
               Change Password
                </i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  