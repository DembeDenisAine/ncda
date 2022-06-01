
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

        <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/user.jpg" class="img-circle elevation-2" alt="User Image" style="width:40px; height:40px;">
           <span class="text-white"><?php   echo strtoupper(truncate($userdata['names'],1230));  ?></span>
        </div>
      
    </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="overflow:hidden; font-size:14px;">
      
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php if(in_array('16', $permissions)): ?>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>" class="nav-link">
              <i class="fa fa-tachometer-alt"></i>
              <p>
               Main Dashboard
              </i>
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if(in_array('19', $permissions)): ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-gavel"></i>
                <p>
                    Governance
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if(in_array('17', $permissions)): ?>
            <li class="nav-item">
                    <a href="<?=site_url('board-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Board of Directors</p>
                    </a>
                </li>
             <?php endif; ?>
             <?php if(in_array('18', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=site_url('core-objectives')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Core Objectives</p>
                    </a>
                </li>
                <?php endif; ?>
             <?php if(in_array('18', $permissions)): ?>
            <li class="nav-item">
                <a href="<?=site_url('about')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About UNCDA</p>
                </a>
            </li>
            <?php endif; ?>
            </ul>
        </li>
        
        <?php endif; ?>

        <?php if(in_array('42', $permissions)): ?>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Stakeholders
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if(in_array('43', $permissions)): ?>
            <li class="nav-item">
                    <a href="<?=site_url('partners')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Donors</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(in_array('44', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=site_url('subscribers')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Member Organizations</p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>

        <?php endif; ?>

        <?php if(in_array('22', $permissions)): ?>
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
            <?php if(in_array('20', $permissions)): ?>
            <li class="nav-item">
                    <a href="<?=site_url('create-project')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Project</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(in_array('21', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=site_url('project-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Projects</p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(in_array('27', $permissions)): ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Meetings
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if(in_array('28', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=base_url()?>meetings" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Meetings</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(in_array('30', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=base_url()?>meetings-calendar" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Meeting Calendar</p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif ?>
        <?php if(in_array('31', $permissions)): ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-map"></i>
                <p>
                    Locations/Site
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if(in_array('32', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=site_url('district-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Branches</p>
                    </a>
                
                </li>
            <?php endif; ?>
            <?php if(in_array('33', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=site_url('facility-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Facilities</p>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(in_array('34', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=site_url('contacts-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Contacts</p>
                    </a>
                </li>
            <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if(in_array('41', $permissions)): ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>
                    Branch Activities
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if(in_array('36', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=site_url('branch-acts')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Regular Activities</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(in_array('37', $permissions)): ?>
                <li class="nav-item">
                    <a href="<?=site_url('facilitation')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Facilitation</p>
                    </a>
                </li>
                <?php endif; ?>
                
            </ul>
        </li>
        <?php endif; ?>
        <?php if(in_array('38', $permissions)): ?>
        <li class="nav-item">
            <a href="<?=base_url()?>contacts" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Contacts
                    <span class="badge badge-info right">People</span>
                </p>
            </a>
        </li>
        <?php endif; ?>

         <?php if(in_array('39', $permissions)): ?>
        <li class="nav-item">
            <a href="<?=base_url()?>docs" class="nav-link">
                <i class="nav-icon far fa-file-alt"></i>
                <p>
                    Documents
                </p>
            </a>
        </li>
        <?php endif; ?>
      
        <?php if(in_array('39', $permissions)): ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Reports
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
           
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=base_url()?>project_report" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Project Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>reports/activities" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Branch Activities Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>reports/facilitation" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Facilitation Report</p>
                    </a>
                </li>
            </ul>
        </li>

        <?php if(in_array('39', $permissions)): ?>
        <li class="nav-item">
            <a href="<?=base_url()?>uploads/system_guide.pdf" target="_blank" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                    System Guide
                </p>
            </a>
        </li>
        <?php endif; ?>
        <?php endif; ?>
           <!--user perm 14-->
          <?php if(in_array(35, $permissions)): ?>
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

                <?php if(in_array(15, $permissions)): ?>
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
                <?php endif ?>
            </ul>
          </li>
          <?php endif; ?>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  