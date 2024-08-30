<?php includeView('includes.header'); ?>

  <div class="container mt-3">


    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="m-auto">
          <h2>Card Image</h2>
          <p>Image at the top (card-img-top):</p>
          <div class="card" style="width:400px">
            <div class="card-body">
            <h4 class="card-title">Md Jahid Hasan</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="/dashboard" class="btn btn-primary">See Dashboard</a>
            </div>
          </div>
          <br>

          <?php foreach ($users as $user) {; ?>
          <div class="card mb-3" style="width:400px">
            <div class="card-body">
              <h4 class="card-title"><?php echo $user["name"]; ?></h4>
              <p class="card-text"><?php echo $user["email"]; ?></p>
              <a href="/profile/<?php echo $user['id']; ?>" class="btn btn-primary">See details</a>
            </div>
          </div>
          <?php }; ?>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
  <?php includeView('../includes.footer'); ?>