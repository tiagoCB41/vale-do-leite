<div class="row">

    <!-- Sales Card -->
    <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card linkCard">
            <a href="addproduto.php">
                <div class="card-body">
                    <h5 class="card-title">Produtos</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-card-list"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                            $i = 0;
                            $stmt = $DB_con->prepare("SELECT * FROM produtos");
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $i++;
                                }
                            } ?>
                            <h6><?php echo $i; ?></h6>

                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div><!-- End Sales Card -->

    <!-- Revenue Card -->
    <div class="col-xxl-4 col-md-6">
        <div class="card info-card revenue-card linkCard">
            <a href="addnoticia.php">
                <div class="card-body">
                    <h5 class="card-title">Noticias</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-earmark"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                            $i = 0;
                            $stmt = $DB_con->prepare("SELECT * FROM produtos");
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $i++;
                                }
                            } ?>
                            <h6><?php echo $i; ?></h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div><!-- End Revenue Card -->

    <!-- Customers Card -->
    <div class="col-xxl-4 col-xl-12">

        <div class="card info-card customers-card linkCard">
            <a href="./form.php">
                <div class="card-body">
                    <h5 class="card-title">Formulários</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-grid-3x3-gap"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                            $i = 0;
                            $stmt = $DB_con->prepare("SELECT * FROM formulario");
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $i++;
                                }
                            } ?>
                            <h6><?php echo $i; ?></h6>
                            <?php
                            $i = 0;
                            $stmt = $DB_con->prepare("SELECT * FROM formulario WHERE condicao is NULL ");
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $i++;
                                }
                            } ?>
                            <span class="text-danger small pt-1 fw-bold"><?php echo $i; ?></span> <span class="text-muted small pt-2 ps-1">não vistos</span>
                        </div>
                    </div>

                </div>
            </a>
        </div>

    </div>