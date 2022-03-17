<?php
    $ponuka = file(dirname(__FILE__) . "/ponuka.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<section id="ponukame">
    <div class="container">
        <h2 class="title pb-3">Služby našim zákazníkom</h2>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">

                <?php
                    for ($i=0; $i < count($ponuka); $i++) {
                        echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $i . '"' . (((int)$i == 0)?'class="active"':'') . ' aria-current="true" aria-label="Slide ' . (int)($i+1) . '"></button>';
                    }
                ?>

            </div>
            <div class="carousel-inner">

                <?php
                    for ($i=0; $i < count($ponuka); $i++) {
                        $fotka = explode("::",  $ponuka[$i])[1];
                        $nadpis = explode("::",  $ponuka[$i])[0];
                        $popis = explode("::",  $ponuka[$i])[2];

                ?>

                        <div class="carousel-item <?php if ($i == 0) echo 'active'?>">
                            <img src="../ponukame/images/<?php echo $fotka ?>" class="pull-left" alt="<?php echo explode(".", $fotka)[0] ?>" loading="lazy">
                            <div class="carousel-caption">
                                <h5><?php echo $nadpis ?></h5>
                                <p class="description"><?php echo $popis ?></p>
                            </div>
                        </div>
                
                <?php
                    }
                ?>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>