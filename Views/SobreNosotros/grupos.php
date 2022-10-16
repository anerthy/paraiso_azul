<?php
_header($data);
$arrGrupos =  $data['cardgrupos'];
?>

<h1>Grupos Organizados</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo officia eius qui, atque voluptatem, voluptatum quae impedit quasi autem repellendus pariatur labore quod eos totam modi. Eveniet nesciunt rem non? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate doloremque ea voluptates et eveniet est. Provident earum tempore ratione dolorum! Distinctio ex quas illo tenetur aspernatur reprehenderit earum voluptate voluptatum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem corrupti iure ipsa esse hic sed repellendus minus dolorum tempore, totam doloribus tempora, odit eius sit ad expedita dolores rerum nesciunt!</p>
<br>

<div class="container">
    <div class="text-center mx-auto" style="max-width: 500px">
        <h1 class="display-6 mb-5">
            Grupos Organizados
        </h1>
    </div>
    <?php
    // dep($arrGrupos);
    for ($i = 0; $i < count($arrGrupos); $i++) {
        $arrGrupos[$i]['logo'];
    ?>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="service-item rounded h-100 p-5">
                    <div class="d-flex align-items-center ms-n5 mb-4">
                        <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                            <img class="img-fluid" src=img src="<?= $arrGrupos[$i]['logo'] ?>" alt="foto">
                        </div>
                        <h4 class="mb-0"><?= $arrGrupos[$i]['nombre_grupo'] ?></h4>
                    </div>
                    <p class="mb-4"><?= $arrGrupos[$i]['descripcion'] ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
footer($data);
?>