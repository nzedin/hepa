<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Pelantikan MPP</li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div id="flashMessage">
      <?= $this->session->flashdata('reminder'); ?>
    </div>
    <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Senarai Majlis Perwakilan Pelajar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

            <div class="card-footer">
              <a href="<?= base_url('mpp/mpp/'.$warga)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah MPP</button></a>
              <button onclick="saveAdmin();" class="btn btn-info"><i class="fas fa-save"></i>  Simpan Admin MPP</button>

            </div>
            
          <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Jawatan</th>
                                  <th>Sesi Semester</th>
                                  <th>Status</th>
                                  <th>Nama</th>
                                  <th>Matrik</th>
                                  <th style="text-align: center;">Admin</th>
                                  <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($mpp as $mpp): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($mpp->COMMITTEE)) ?></td>
                                  <td><?= $mpp->SESSION ?></td>
                                  <td><?= ucwords(strtolower($mpp->STATUS)) ?></td>
                                  <td><?= ucwords(strtolower($mpp->STUDENTNAME)) ?></td>
                                  <td><?= ucwords(strtolower($mpp->STUDENTID)) ?></td>
                                  <td style="text-align: center;">
                                      <input type="hidden" class="mppID" value="<?= $mpp->MPPID ?>">
                                      <input type="checkbox" class="adminCheckbox table-admin-checkbox" data-mppid="<?= $mpp->MPPID ?>" <?= $mpp->ADMINMPP == 1 ? 'checked' : '' ?>>
                                  </td>

                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                         <button type="button"  onclick="window.open('<?= base_url('mpp/profile/'.$warga.'/pelajar/'.$mpp->MPPID) ?>')" class="btn btn-info"><i class="fa fa-external-link">  Lihat Profil</i></button>
                                         
                                         <button data-toggle="modal" data-target="#editmpp<?= $mpp->MPPID ?>"  class="btn btn-warning"><i class="fas fa-edit">  Edit</i></button>
                                         
                                         <div class="modal fade" id="editmpp<?= $mpp->MPPID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Majlis Perwakilan Pelajar</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('mpp/editmpp/'.$warga.'/'. $mpp->MPPID) ?>" method="POST">
                                                            <div style="text-align: left;" class="card-body">
                                                          
                                                            <div class="form-group">
                                                              <label>Matrik Pelajar</label>
                                                              <input type="text" class="form-control" id="studentID" name="studentID" value="<?=  $mpp->STUDENTID; ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Nama Pelajar</label>
                                                              <input type="text" class="form-control" id="studentName" name="studentName" value="<?=  $mpp->STUDENTNAME; ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Program Pengajian</label>
                                                              <input type="text" class="form-control" id="program" name="program" value="<?=  $mpp->PROGRAM; ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Semester</label>
                                                              <input type="text" class="form-control" id="semester" name="semester" value="<?= $mpp->SEMESTER; ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Sesi Semester</label>
                                                              <select name="session" class="form-control select2bs4" style="width: 100%;" >
                                                              <?php foreach ($sesi as $row): ?>
                                                                  <option value="<?= $row->SESI; ?>" <?php if($row->SESI == $mpp->SESSION) echo 'selected'; ?>><?= $row->SESI; ?></option>
                                                              <?php endforeach; ?>
                                                              </select>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Jawatan</label>
                                                              <select name="positionMpp" class="form-control select2bs4" style="width: 100%;" value="<?= $mpp->COMMITTEEID; ?>">
                                                                <?php foreach ($committee as $comm): ?>
                                                                    <?php if ($comm->CATEGORYROLE == 'MPP'): ?>
                                                                      <option value="<?= $comm->COMMITTEEID; ?>" <?php if($comm->COMMITTEEID == $mpp->POSITIONMPP) echo 'selected'; ?> ><?= $comm->COMMITTEE; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                              </select>
                                                            </div>

                                                           <div class="form-group">
                                                              <label>Status Pelajar</label>
                                                              <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" id="aktif<?= $mpp->MPPID ?>" name="status" value="Aktif" <?php echo ($mpp->STATUS == "Aktif") ? "checked" : ""; ?>>
                                                                  <label class="custom-control-label" for="aktif<?= $mpp->MPPID ?>">Aktif</label>
                                                              </div>
                                                              <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" id="tidakaktif<?= $mpp->MPPID ?>" name="status" value="Tidak Aktif" <?php echo ($mpp->STATUS == "Tidak Aktif") ? "checked" : ""; ?>>
                                                                  <label class="custom-control-label" for="tidakaktif<?= $mpp->MPPID ?>">Tidak Aktif</label>
                                                              </div>

                                                            </div>

                                                            <div class="form-group">
                                                              <label for="adminMPP<?= $mpp->MPPID ?>">Admin MPP</label><br>
                                                              <div class="custom-control custom-checkbox">
                                                                  <input class="custom-control-input" type="checkbox" id="adminMPP<?= $mpp->MPPID ?>" name="adminMPP" value="1" <?php echo $mpp->ADMINMPP ? 'checked' : ''; ?>>
                                                                  <label class="custom-control-label" for="adminMPP<?= $mpp->MPPID ?>" style="color:blue;">*tandakan (/) sekiranya pelajar admin MPP</label>
                                                              </div>                                                  
                                                            </div>

                                                            
            
                                                              <div style="text-align: right;" class="card-footer">
                                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                  <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>   Simpan</button>
                                                              </div>
                                                        
                                                            </div>
                                                      </form>
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                         

                                         <a href="<?= base_url('mpp/deletempp/'.$warga.'/'.$mpp->MPPID) ?>" ><button type="button" onclick="return confirm('Confirm delete the data?')" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
                                      </div>
                                      
                                  </td>
                              </tr>
                              <?php endforeach ?>
                          </tbody>
                      </table>
                
                </div>
              </div>
            </div>
          </div> 
      </div>
     
    </section>   
  </div>
        <script>
              function saveAdmin() {
                  var checkboxData = [];

                  // Loop through each checkbox to gather data
                  $('.adminCheckbox').each(function() {
                      var MPPID = $(this).data('mppid'); 
                      var ADMINMPP = $(this).prop('checked') ? 1 : 0; 

                      checkboxData.push({ MPPID: MPPID, ADMINMPP: ADMINMPP });
                  });

                  $.ajax({
                      type: "POST",
                      url: "<?= base_url('mpp/adminmpp/'.$warga) ?>",
                      data: { checkboxData: checkboxData },
                      success: function(response) {
                          
                        $('#flashMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> Admin MPP Berjaya Disimpan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
                        setTimeout(function() {
                              location.reload();
                          }, 1000);
                      }
                  });
              }

        </script>
