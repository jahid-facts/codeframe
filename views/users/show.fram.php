<?php includeView('../includes.header'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card mb-3" style="width:400px">
                <div class="card-body">
                    <?php if (isset($user) && is_array($user)): ?>
                        <h4 class="card-title"><?php echo htmlspecialchars($user["name"]); ?></h4>
                        <p class="card-text"><?php echo htmlspecialchars($user["email"]); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($user["comment"]); ?></p>
                    <?php else: ?>
                        <p>User data is not available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php includeView('../includes.footer'); ?>
