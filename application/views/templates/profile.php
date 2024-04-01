<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">

      <?php if( $warga == "staff" ): ?>
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content" style="width: 90%; margin:2% auto;">
        <div class="container-fluid">
      
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                  <h3 class="widget-user-username"><?php echo $staff->staffName; ?></h3>
                  <h5 class="widget-user-desc"><?php echo $staff->staffPosition; ?></h5>
                </div>

                <div class="widget-user-image">
                  <img class="img-fluid rounded-circle" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($staff->staffImg); ?>" alt="User Avatar">
                </div>

                <div class="row">
                  <br><br>
                </div>

                <div class="row">
                      <div class="card-body">
                          <div style="width: 98%; margin:auto;" class="card card-outline card-info">
                              <div class="card-header">
                                  <h2 class="card-title">Maklumat Peribadi</h2>

                                  <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                  </button>
                                  </div>
                                  <!-- /.card-tools -->
                              </div>
                              <!-- /.card-header -->
                              <div style="width: 90%; margin: auto;" class="card-body">
                                      <table class="table table-sm">
                                          
                                          <tbody>
                                              <tr>
                                                  <td>ID Pekerja</td>
                                                  <td><?php echo $staff->staffID; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Nama</td>
                                                  <td><?php echo $staff->staffName; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Email</td>
                                                  <td><?php echo $staff->email; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>No.Telefon</td>
                                                  <td><?php echo $staff->staffNo; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Jawatan</td>
                                                  <td><?php echo $staff->staffPosition; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Department</td>
                                                  <td><?php echo $staff->staffDept; ?></td>
                                              </tr>
                                              
                                          </tbody>
                                      </table>
                              </div>
                          
                          </div
                      </div>
                </div>       
              </div>
            
            <?php elseif( $warga == "student" ): ?>
              <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Pelajar</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content" style="width: 90%; margin:2% auto;">
        <div class="container-fluid">
      
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                  
                </div>

                <div class="widget-user-image">
                  <img class="img-fluid rounded-circle" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($student->stuImg); ?>" alt="User Avatar">
                </div>

                <div class="row">
                  <br><br>
                </div>

                <div class="row">
                      <div class="card-body">
                          <div style="width: 98%; margin:auto;" class="card card-outline card-info">
                              <div class="card-header">
                                  <h2 class="card-title">Maklumat Peribadi</h2>

                                  <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                  </button>
                                  </div>
                                  <!-- /.card-tools -->
                              </div>
                              <!-- /.card-header -->
                              <div style="width: 90%; margin: auto;" class="card-body">
                                      <table class="table table-sm">
                                          
                                          <tbody>
                                              <tr>
                                                  <td>Matrik Pelajar</td>
                                                  <td><?php echo $student->studentID; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Nama</td>
                                                  <td><?php echo $student->studentName; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Email</td>
                                                  <td><?php echo $student->studentEmail; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>No.Telefon</td>
                                                  <td><?php echo $student->phoneNo; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Fakulti</td>
                                                  <td><?php echo $student->faculty; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Program</td>
                                                  <td><?php echo $student->program; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Semester</td>
                                                  <td><?php echo $student->semester; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Sesi</td>
                                                  <td><?php echo $student->sesi; ?></td>
                                              </tr>
                                          </tbody>
                                      </table>
                              </div>
                          
                          </div
                      </div>
                </div>       
              </div>
            <?php endif; ?>
        </div>
    </section>
</div>