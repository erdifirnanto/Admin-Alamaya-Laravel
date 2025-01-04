<section class="main-page" id="main-page">
    <section style="margin-bottom: 150px">
        <!-- Cards Section Start -->
        <div class="container-fluid bg-white rounded-top-5" style="top:430px; position: absolute;">
            <div class="container mt-5" style>
                <div class="row" style="margin-top: -120px;">
                    <!-- Card 1 -->
                    <div class="col-md-4 col-4">
                        <div>
                            <div class="card-home bg-transparent shadow-lg">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-6 mt-2">
                                            <div class="d-flex justify-content-center align-items-center user-icon1">
                                                <div class="fa fa-user text-light" aria-hidden="true"></div>
                                            </div>
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="-home-body text-dark mt-2">
                                                <div class="card-text text-dark mt-4">Project Completed<br>
                                                    <h2><strong>{{ number_format($totalSelesai) }}</strong></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('project.completed') }}" class="text-dark" style="text-decoration: none;">
                                <h6 class="d-flex justify-content-center" style="margin-top: -20px;">Detail
                                    stats <i class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i>
                                </h6>
                            </a>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4 mb-5 col-4">
                        <div class="card-home bg-transparent shadow-lg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-6 mt-2">
                                        <div class="d-flex justify-content-center align-items-center user-icon1">
                                            <div class="fa-solid fa-layer-group text-light" aria-hidden="true">
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body text-dark mt-2">
                                            <div class="card-text text-dark mt-4">Maintenance<br>
                                                <h2><strong>{{ number_format($totalMaintenanceProjects) }}</strong></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('project.Maintenance') }}" class="text-dark" style="text-decoration: none;">
                            <h6 class="d-flex justify-content-center" style=" margin-top: -20px;">Detail
                                stats <i class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i>
                            </h6>
                        </a>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4 mb-5 col-4">
                        <div class="card-home bg-transparent shadow-lg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-6 mt-2">
                                        <div class="d-flex justify-content-center align-items-center user-icon1">
                                            <div class="bx bxs-traffic-cone text-light" aria-hidden="true"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 d-flex justify-content-end align-items-center">
                                        <div class="btn-group dropup">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body text-dark mt-2">
                                            <div class="card-text text-dark mt-4  ">Project on
                                                Progress<br>
                                                <h2><strong>{{ number_format($totalProjects) }}</strong></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('project.onprogress') }}" class="text-dark" style="text-decoration: none;">
                            <h6 class="d-flex justify-content-center" style=" margin-top: -20px;">Detail
                                stats <i class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i>
                            </h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
