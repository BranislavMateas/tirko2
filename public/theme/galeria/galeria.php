<?php
    $adresare = glob('../galeria/*', GLOB_ONLYDIR);

    foreach($adresare as $priecinok) {
        $menuGaleria[basename($priecinok)] = file_get_contents($priecinok . '/' . basename($priecinok) . '.txt');
    }
?>

<section id="galeria" class="container py-5">
    <h1 class="pb-4">Galéria</h1>
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <?php 
                $prvyPrvok = reset($menuGaleria);
                foreach ($menuGaleria as $priecinok => $nazov) {
                
            ?>

          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($prvyPrvok == $nazov?"active":"") ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $priecinok ?>" type="button" role="tab"><?php echo $nazov ?></button>
          </li>
          
          <?php 
                }
                
            ?>

            </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php
                foreach($menuGaleria as $adresar => $nazov) {
                    
                    $nadpis = file_get_contents('../galeria/' . $adresar . '/titulok.txt');
                    $popis = file_get_contents('../galeria/' . $adresar . '/popis.txt');
                    $foto = '../galeria/' . $adresar . '/thumb.jpg';

            ?>

            <div class="tab-pane <?php echo ($prvyPrvok == $nazov?"active":"") ?>" id="<?php echo $adresar ?>" role="tabpanel" aria-labelledby="home-tab">
                <div class="top-bar">
                    <h2 class="gal-title"><?php echo $nadpis ?></h2>
                </div>

                <div class="gal-content">
                    <div class="gal-img ">
                        <img src="<?php echo $foto ?>" alt="<?php echo $nadpis ?>" loading="lazy">
                    </div>
                    <div class="gal-text">
                        <p><?php echo $popis ?></p>
                    </div>
                </div>
            
                <div class="collapse-gallery">
                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <img id="down" src="../../assets/images/down.png" height="32" width="32" onclick='changeUp()' >
                        <img id="up" style="display: none;" src="../../assets/images/up.png" height="32" width="32" onclick='changeDown()' >
                    </a>

                    <div class="collapse" id="collapseExample">
                        <div class="collapse-gallery-content container">
                            <div class="row row-cols-auto d-flex justify-content-center">

                                <?php
                                    $fotky = glob('../galeria/' . $adresar . '/thumbnails/*');
                                    foreach ($fotky as $fotka) { 
                                ?>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <?php
                                            echo '<img src="' . $fotka . '" loading="lazy">'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }
            ?>

        </div>
    </div>
</section>

