
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LMS</title>

	<!-- Global stylesheets -->
	<!--link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/loader.js"></script>
	   <script type="text/javascript">
    	// Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>



	<!-- /global stylesheets -->

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope-o"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400">2</span>
					</a>

					<div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Messages
							<ul class="icons-list">
								<li><a href="#"><i class="icon-compose"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body">
							<li class="media">
								<div class="media-left">
									<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">5</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">James Alexander</span>
										<span class="media-annotation pull-right">04:58</span>
									</a>

									<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">4</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Margo Baker</span>
										<span class="media-annotation pull-right">12:16</span>
									</a>

									<span class="text-muted">That was something he was unable to do because...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Jeremy Victorino</span>
										<span class="media-annotation pull-right">22:48</span>
									</a>

									<span class="text-muted">But that would be extremely strained and suspicious...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Beatrix Diaz</span>
										<span class="media-annotation pull-right">Tue</span>
									</a>

									<span class="text-muted">What a strenuous career it is that I've chosen...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Richard Vango</span>
										<span class="media-annotation pull-right">Mon</span>
									</a>

									<span class="text-muted">Other travelling salesmen live a life of luxury...</span>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<?php $photo = $this->db->get_where('users',array('user_id' =>$this->session->userdata('user_id')))->row()->photo;?>
						<img src="<?php echo base_url();?>uploads/staff/<?php echo $photo;?>" alt="">
						<span><?php echo $this->session->userdata('name');?>
										</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url();?>Profile"><i class="icon-user-plus"></i> My profile</a></li>
						<!--li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li-->
						<li><a href="<?php echo base_url();?>Login/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left">
									<img src="<?php echo base_url();?>uploads/staff/<?php echo $photo;?>" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $this->session->userdata('name');?>
									</span>
									<div class="text-size-mini text-muted">
										<?php echo $this->db->get_where('users',array('user_id' =>$this->session->userdata('user_id')))->row()->email;?>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main Navigation</span> <i class="icon-menu" title="Main pages"></i></li>
								<li style="border-bottom: 1px solid #414450;"><a href="<?php echo base_url();?>dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
					                <?php $modules = $this->db->order_by('sort','ASC')->get_where('modules',array('active'=>1))->result_array();
					                foreach($modules as $mod):
					                
					                  $sub_modules = $this->db->order_by('sort','ASC')->get_where('sub_modules',array('module_id' =>$mod['module_id']))->result_array();?>
					                <li style="border-bottom: 1px solid #414450;" <?php if(count($sub_modules) >0){?> class="dropdown" <?php } ?> >
					                  <a href="<?php if(count($sub_modules) >0){echo 'javascript:;';} else echo base_url().$mod['module_id'];?>">
					                  	<i class="<?php echo $mod['icon'];?>"></i>
					                  <?php echo ucfirst($mod['module_id']);?></a>
					                  
					                  <?php if(count($sub_modules) > 0):?>
					                    <ul>
					                      <?php foreach($sub_modules as $sub):?>
					                         <li><a href="<?php echo base_url().$sub['sub_module_id'];?>"><i class="fa fa-circle-thin"></i><?php echo ucfirst($sub['desc']);?></a></li>
					                      <?php endforeach;?>
					                    </ul>
					                  <?php endif;?>
					                </li>
					                <?php endforeach;?>

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="fa fa-money text-teal-400"></i><span>Financial</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="fa fa-bar-chart text-teal-400"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="fa fa-calculator text-teal-400"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="fa fa-life-ring text-teal-400"></i> <span>Support</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="admin-dashboard.html	"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><span><?php echo $page_title;?></span></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
				   
			    	<?php $this->load->view($content);?>
					<!-- Footer -->
					<div class="footer text-muted">
						LMS &copy; 2018.
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/trees/fancytree_all.min.js"></script>

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>


	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/sections-management.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/users.js"></script>



    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/editors/wysihtml5/wysihtml5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/editors/wysihtml5/toolbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/editors/wysihtml5/parsers.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/jgrowl.min.js"></script>


    <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/email-marketing.js"></script>


	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/user-profile.js"></script>
 

	<!-- /theme JS files -->
	<script type="text/javascript">
	//jQuery('table').dataTable();
 // check all checkboxes in table
                        if(jQuery('.checkall').length > 0) {
                          jQuery('.checkall').click(function(){
                            var parentTable = jQuery(this).parents('table');                       
                            var ch = parentTable.find('tbody input[type=checkbox]');                     
                            if(jQuery(this).is(':checked')) {
                            
                              //check all rows in table
                              ch.each(function(){ 
                                jQuery(this).attr('checked',true);
                                jQuery(this).parent().addClass('checked');  //used for the custom checkbox style
                                jQuery(this).parents('tr').addClass('selected'); // to highlight row as selected
                              });
                                    
                            
                            } else {
                              
                              //uncheck all rows in table
                              ch.each(function(){ 
                                jQuery(this).attr('checked',false); 
                                jQuery(this).parent().removeClass('checked'); //used for the custom checkbox style
                                jQuery(this).parents('tr').removeClass('selected');
                              }); 
                              
                            }
                          });
                        }



                        jQuery('.alert').fadeOut(5000);

  </script>
</body>
</html>
