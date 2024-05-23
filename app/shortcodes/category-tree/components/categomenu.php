<?php

use boctulus\SW\core\libs\Users;
use boctulus\SW\core\libs\Products;

// enqueue_admin(function(){
//     css_file('components/categolist/categolist.css');
//     js_file('components/categolist/categolist.js');
// });

function round_count(int $q){
    if ($q > 100000){
        return '+100K';
    }

    if ($q > 50000){
        return '+50K';
    }

    if ($q > 20000){
        return '+20K';
    }

    if ($q > 10000){
        return '+10K';
    }

    if ($q > 1000){
        return '+1K';
    }

    if ($q > 500){
        return '+500';
    }

    if ($q > 400){
        return '+400';
    }

    if ($q > 300){
        return '+300';
    }

    if ($q > 200){
        return '+200';
    }

    if ($q > 100){
        return '+100';
    }

    if ($q > 50){
        return '+50';
    }

    return $q;
}

// shortcode
function categomenu()
{
    $categos = Products::getCategories();
   
    foreach($categos as $catego){
        $name    = $catego->name;
        $cat_id  = $catego->cat_ID;
        $count   = $catego->count;

        $cat_arr[] = [
            'id'    => $cat_id,
            'name'  => $name,
            'count' => $count,
            'path'  => Products::breadcrumb($cat_id)
        ];
    }
?>    
                    
    <div class="card shadow border-0">
        <div class="card-body p-5">
            <h2 class="h4 mb-1">Categorias de productos</h2>
            <p class="small text-muted font-italic mt-2 mb-4">Hasta un máximo de 3</p>
            <ul class="list-group" style="margin-left: 0px;">

                <?php foreach ($cat_arr as $cat): ?>

                <li class="list-group-item rounded-0 d-flex align-items-center justify-content-between">
                    <div class="custom-control cat-chk-group">
                        <?php                            
                            //$checked = in_array($cat['id'], $selected_categos) ? 'checked' : '';
                            $checked = '';
                        ?>
                        <input class="form-check-input cat-chk me-2" type="checkbox" id="cat-<?= $cat['id']?>" name="cat-<?= $cat['id']?>" onchange="report_cat_change(<?= $cat['id'] ?>, this, event)" <?= $checked ?> />
                        <label class="custom-control-label" for="cat-<?= $cat['id']?>">
                            <p class="mb-0"><?= $cat['name'] . (config()['debug'] ? " < {$cat['id']} >" : '') ?></p>
                        </label>
                        <p class="mb-0"><span class="small font-italic text-muted"><?= $cat['path'] ?></span></p>
                    </div>
                    <!-- label for="customRadio1"><img src="https://i.postimg.cc/Hsq4Ygss/1-ezgo0i.png" alt="" width="60"></label -->
                    <span class="badge bg-primary rounded-pill"><?= round_count($cat['count']) ?></span>
                </li>

                <?php endforeach; ?>
            
            </ul>

            <div class="card-footer mt-2" id="cat-selector-msgs" style="background-color: transparent; color: red;">
                &nbsp;                      
            </div>

        </div>
    </div>                
            
    <?php
}


add_shortcode('categomenu', 'categomenu');