<div class="pagetitle">
      <h1>Painel de controlo</h1>
    <nav>
      <ol class="breadcrumb">
          <li class="breadcrumb-item">Painel de controlo</li>
        </ol>
     </nav>
</div>

<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filtro</h6>
                    </li>

                    <li><a class="dropdown-item filter-vendas-item" href="#">Hoje</a></li>
                    <li><a class="dropdown-item filter-vendas-item" href="#">Este mês</a></li>
                    <li><a class="dropdown-item filter-vendas-item" href="#">Este ano</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Vendas <span>| <span id="vendas-label">Hoje</span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                      <div id="vendas">
                        <?= GetSells($con,'Hoje');?> 
                      </div>
                       
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filtro</h6>
                    </li>

                    <li><a class="dropdown-item filter-ganhos-item" href="#">Hoje</a></li>
                    <li><a class="dropdown-item filter-ganhos-item" href="#">Este mês</a></li>
                    <li><a class="dropdown-item filter-ganhos-item" href="#">Este ano</a></li>
                </div>

                <div class="card-body">
                <h5 class="card-title">Ganhos <span>| <span id="ganhos-label">Hoje</span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-euro"></i>
                    </div>
                      <div id="ganhos">
                        <?= GetEarnings($con,'Hoje');?> 
                      </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

          

           

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filtro</h6>
                    </li>

                    <li><a class="dropdown-item  filter-encomendas-item" href="#">Hoje</a></li>
                    <li><a class="dropdown-item  filter-encomendas-item" href="#">Este mês</a></li>
                    <li><a class="dropdown-item  filter-encomendas-item" href="#">Este ano</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Encomendas <span>| <span id="encomendas-label">Hoje</span></h5>

                  <div id="dashTable">
                    <?= GetEncomendasDashTable($con,'Hoje') ?>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        

      </div>
    </section>