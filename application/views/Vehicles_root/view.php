<style type="text/css">
  .fsize {
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
  }

  * {
  box-sizing: border-box;
}

.body {
  background-color: #f2dede;
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline2 {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline2::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container2 {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.container2::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -12px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content2 {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline2::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container2 {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container2::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}

</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Vehicle Rout Map
      <small id="date" class="col-md-4"></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>Vehicles/"><i class="fa fa-dashboard"></i> Back to List</a></li>
      <li class="active"></li>
    </ol>

  </section>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Vehicles_root/add" enctype="multipart/form-data">
    <section class="content">

      <div class="row">
        <div class="box">
          <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response'); ?>" />
          <div class="box-header">
            <div class="col-md-8">
              <h2 class="box-title"></h2>
            </div>
          </div>

          <div class="box-body">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><b>Rout Map</b></h3>
                  <!-- <div class="col-md-6"> -->
                </div>

                <div class="panel-body" style="font-weight:bold;">
                  <div class="form-group row">
                    <input type="hidden" name="vroot_id" value="<?php if (isset($records->root_id)) echo $records->root_id; ?>" />
                    <?php echo validation_errors(); ?>

                    <div class="col-md-4">
                      <label class="fsize">Vehicle Name</label>
                      <input type="text" value="<?php echo $records->vehicle_name; ?>" class="form-control">
                    </div>

                    <div class="col-md-4">
                      <label class="fsize">Driver Name</label>
                      <input type="text" value="<?php echo $records->driver_name; ?>" class="form-control">
                    </div>

                    <div class="col-md-4">
                      <label class="fsize">Date</label>
                      <input type="text" data-pms-required="true" autofocus class="form-control" name="cdate" value="<?php if (isset($records->date)) echo $records->date ?>" style="font-weight: bold;">
                    </div>

                  </div>


                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="fsize">Rout Details</label>
                      <textarea class="form-control" name="vroot_details" rows="5" style="font-weight: bold;"><?php if (isset($records->vroot_details)) echo $records->vroot_details ?></textarea>
                    </div>
                  </div>

                  <h4>Route Map</h4>
                  <div class="box-body table-responsive">
                    <!-- <table id="classinfo_table" class="table table-bordered table-striped">-->
                    <!-- <table class="table table-bordered table-striped" style="border:ridge;">
                      <thead>
                        <tr>
                          <th style="border:ridge;">Sl.No</th>
                          <th style="border:ridge;">Destination</th>
                          <th style="border:ridge;">Place</th>
                          <th style="border:ridge;">KM</th>
                          <th style="border:ridge;">Arrival Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 0;
                        foreach ($records1 as $value) {
                          $i = $i + 1;
                        ?>
                          <tr style="border:ridge;font-weight: bold;">
                            <td style="border:ridge;font-size:16px;width: 10px;"><?php echo $i; ?></td>
                            <td style="border:ridge;font-size:16px;width: 150px;"> <?php echo $value->v_destination_name; ?>
                            </td>
                            <td style="width: 150px;">
                              <?php echo $value->v_detination_place; ?>
                            </td>
                            <td style="width: 150px;">
                              <?php echo $value->v_destination_km; ?>
                            </td>
                            <td style="width: 150px;">
                              <?php echo $value->v_destination_arrival_time; ?>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table> -->
                    <div class="body">
                    <div class="timeline2">
                    <?php $i=1; foreach($records1 as $value){ ?>
                      <div class="container2 <?php if($i%2==0){ echo "right"; }else{ echo "left"; } ?>">
                        <div class="content2">
                          <h2><?php echo $value->v_destination_name; ?></h2>
                          <p><?php echo $value->v_detination_place; ?></p>
                          <p><?php echo $value->v_destination_km; ?></p>
                          <p><?php echo $value->v_destination_arrival_time; ?></p>
                        </div>
                      </div>
                      <?php $i++; } ?>
                      
                    </div>
                  
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>