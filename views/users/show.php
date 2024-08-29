<?php includeView('../includes.header'); ?>

  <div class="container mt-3">


    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
          <div class="card mb-3" style="width:400px">
            <div class="card-body">
              <h4 class="card-title"><?php echo $user["name"]; ?></h4>
              <p class="card-text"><?php echo $user["email"]; ?></p>
              <p class="card-text"><?php echo $user["comment"]; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
  <?php includeView('../includes.footer'); ?>