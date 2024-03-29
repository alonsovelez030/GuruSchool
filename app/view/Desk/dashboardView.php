<?= $headers; ?>
<?= $helper->PopUpBody(); ?>
<body>
	<!--Navigation-->
	<?= $menuFront; ?>
	<!--Front-->
  <section class="main">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="content-inside intermediate">
            <!--imagen con publicidad-->
            <a  href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();"><i style="float: right;" class="h1-hover black-gray margin-lestc-bottom fa fa-question-circle fa-lg" aria-hidden="true"></i></a>
            <a href="<?= BASE_DIR; ?>/cursos/lista/&accept=yes"><img style="width:100%; height:auto;" src="<?= BASE_DIR; ?>/design/css/imagenes/banner.png"></a>
            <hr>
            <!--Cursos que Aprendo-->
            <div data-step="1" data-intro="<h1 class='h1-black'>Hola!!</h1><br> Este es el Panel del Estudiante, aquí verás los cursos en los que te inscribas y el progreso de cada uno." style="border-top:2px solid rgba(22, 160, 133,1.0);" class="content-description table-responsive">
              <a href="<?= BASE_DIR; ?>/desk/mis_cursos/"><h1 class="h1-hover h1-black">Cursos que Aprendo</h1></a>
              <table class="table table-hover">
                  <tbody>
                    <?php 
                    if ($DataMyCourse==false) {
                      ?>
                        <tr>
                          <td>
                            <p>
                              - No Tienes Cursos Apuntados, Busca uno <a href="<?= BASE_DIR; ?>/cursos/lista/&accept=yes">Aquí</a>
                            </p>
                          </td>
                        </tr>
                      <?php
                    }else{
                        foreach ($DataMyCourse as $Data) {
                          ?>
                            <tr>
                              <td>
                                <a style="overflow: hidden;" href="classroom/player/<?= $Data[0]; ?>/">
                                  <p style="float: left;" >
                                    <i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?= ucwords($Data[1]); ?>
                                  </p>
                                  <div style="height: 3px; float:right; width: 30%;" class="progress-width  margin-lestb-top progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?= $SQLProgressCourse; ?>"
                                    aria-valuemin="0" aria-valuemax="100" style="width:<?= $Data[6]; ?>%">
                                    </div>
                                  </div>
                                  <p class="margin-lestc-right darkgray " style="float: right;"><?= $Data[6]; ?> %</p>
                                </a>
                              </td>
                            </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
              </table>
            </div>
            <!--Cursos que Enseño-->
            <div data-step="2" data-intro="<h1 class='intro-tittle-letter h1-black'>Bien!!</h1><br> Esta es la Sección del Maestro, encuentra los cursos que enseñas, el estado, y más herramientas que te ayudarán a desempeñar tu labor como Tutor." style="border-top:2px solid rgba(230, 126, 34,1.0);" class="margin-top  content-description table-responsive">
              <a href="<?= BASE_DIR; ?>/maestros/dashboard/"><h1 data-step="3" data-intro="Da click aquí e ingresa a la Plataforma del Maestro" class="h1-hover h1-black">Plataforma del Maestro</h1></a>
              <p>Cursos que enseño:</p>
              <table class="table table-hover">
                  <tbody>
                    <?php
                    if ($DataTeache==false) {
                      ?>
                        <tr>
                          <td>
                            <p>
                              -Aún no está enseñando ningún Curso, Animate y empieza <a href="<?= BASE_DIR; ?>/maestros/dashboard/">Aquí</a>
                            </p>
                          </td>
                        </tr>
                      <?php
                    }else{
                        foreach ($DataTeache as $Data) {
                          ?>
                            <tr>
                              <td>
                                <?php
                                switch ($Data[3]) {
                                  case 'Publicado':
                                      ?>
                                        <a style="overflow: hidden;" href="<?= BASE_DIR; ?>/cursos/detalles/<?= $Data[0]; ?>/<?= str_replace(" ","-",$Data[1]); ?>/">
                                          <div style="float: left;">
                                            <p>
                                              <i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?= ucwords($Data[1])."  <span class='label label-success'>Publicado</span>"; ?>
                                            </p>
                                          </div>
                                          <div class="attribute-div" style="float: right;">
                                            <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp; <?= $Data[6]; ?> Alumnos</p>
                                          </div>
                                        </a>
                                      <?php
                                    break;
                                  
                                  case 'Rechazado':
                                      ?>
                                        <a href="<?= BASE_DIR; ?>/maestros/actualizar/<?= $Data[0]; ?>/">
                                          <p>
                                            <i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?= $Data[1]."  <span class='label label-danger'>Rechazado</span>"; ?>
                                          </p>
                                        </a>
                                      <?php
                                    break;

                                  case 'Aprobado':
                                      ?>
                                        <a href="<?= BASE_DIR; ?>/maestros/videos/<?= $Data[0]; ?>">
                                          <p>
                                            <i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?= $Data[1]."  <span class='label label-info'>Aprobado</span>"; ?>
                                          </p>
                                        </a>
                                      <?php
                                    break;  

                                  case 'En Revision':
                                      ?>
                                        <p>
                                          <i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <?= $Data[1]."  <span class='label label-warning'>En Revisión</span>"; ?>
                                        </p>
                                      <?php
                                    break;

                                  case 'En Revision Video':
                                      ?>
                                        <p>
                                          <i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <?= $Data[1]."  <span class='label label-warning'>En Revisión Video</span>"; ?>
                                        </p>
                                      <?php
                                    break;    
                                }
                                ?>
                              </td>
                            </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
              </table>
            </div>
            <hr>
            <a href="<?= BASE_DIR; ?>/la_bolsa/trabajos/&accept=yes"><img style="width:100%; height:auto;" class="margin-lest-bottom" src="<?= BASE_DIR; ?>/design/css/imagenes/banner2.png"></a>
          </div>
        </div>
        <!--Datos del Perfil-->
        <div class="col-md-3">
            <div class="content-right intermediate">
              <?php
                if ($ArrDataUser == 0) {
                  ?>
                    <div data-step="4" data-intro="Este es tu Gurú Perfil. Llenalo si todavía faltan datos ;)" id="content-person" class="card">
                        <center>
                          <div class="img-fluid-preview">
                             <img class="img-fluid" src="<?= BASE_DIR; ?>/design/img/Perfil_Usuarios/defecto_user.jpg" alt="Card image cap">
                          </div>
                        </center>
                        <div class="card-block">
                            <h4 class="card-title">Mi Perfil Gurú</h4>
                            <p class="card-text">Echale un Vistazo</p>
                            <a href="<?= BASE_DIR; ?>/usuarios/mis_datos/&request=Completar Datos Personales" class="btn btn-primary">Completar Pérfil</a>
                        </div>
                    </div>
                  <?php
                }else{
                  ?>
                    <div data-step="4" data-intro="Este es tu Gurú Perfil. Llenalo si todavía faltan datos ;)" id="content-person" class="card">
                        <center>
                          <?php
                          foreach ($ArrDataUser as $DataPerson) {
                              ?>
                                <div class="img-fluid-preview">
                                    <img class="img-fluid" src="<?= BASE_DIR; ?>/design/img/Perfil_Usuarios/<?= $DataPerson[6]; ?>" alt="Card image cap">
                                </div>
                              <?php
                            }
                          ?>
                        </center>
                        <div class="card-block">
                            <h4 class="card-title">Mi Perfil Gurú</h4>
                            <p class="card-text">Echale un Vistazo</p>
                            <?php
                              if ($ArrDataProfUser == 0) {
                                ?>
                                  <a href="<?= BASE_DIR; ?>/usuarios/mis_datos/&request=Completar Datos Profesionales"  class="btn btn-primary">Completar Pérfil</a>
                                <?php
                              }else{
                                ?>
                                  <a href="<?= BASE_DIR; ?>/desk/perfil/"  class="btn btn-primary">Ver</a>
                                <?php
                              }
                            ?>
                        </div>
                    </div>
                  <?php
                }
              ?>
              <div class="hidden-xs">
                <hr>
                  <a href="<?= BASE_DIR; ?>/desk/mis_certificados/"><img data-step="5" data-intro="Descarga los certificados que hallas ganado" style="width:100%; height:auto;" src="<?= BASE_DIR; ?>/design/css/imagenes/baner_certificado.png"></a>
                <hr>
                  <a href="<?= BASE_DIR; ?>/maestros/dashboard/"><img data-step="6" data-intro="Tienes algún talento? Eseñalo y Gana Dinero." style="width:100%; height:auto; margin-bottom:40px;" src="<?= BASE_DIR; ?>/design/css/imagenes/baner_maestro.png"></a>
              </div>
              <div class="visible-xs">
                <center>
                  <hr>
                    <a href="<?= BASE_DIR; ?>/desk/mis_certificados/"><img style="width:50%; height:auto;" src="<?= BASE_DIR; ?>/design/css/imagenes/baner_certificado.png"></a>
                  <hr>
                    <a href="<?= BASE_DIR; ?>/maestros/dashboard/"><img style="width:50%; height:auto; margin-bottom:40px;" src="<?= BASE_DIR; ?>/design/css/imagenes/baner_maestro.png"></a>
                </center>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</body>
<!-- /Content -->
<?= $footer; ?>
<?= $resource_script; ?>
<script type="text/javascript" src="<?= BASE_DIR; ?>/design/js/local_apps/Home/hostname.js"></script>