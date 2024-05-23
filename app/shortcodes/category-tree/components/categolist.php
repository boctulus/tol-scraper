<?php

use boctulus\SW\core\libs\Users;
use boctulus\SW\core\libs\Products;


enqueue_admin(function(){
    css_file('third_party/bootstrap/bootstrap.min.css');
    js_file('third_party/bootstrap/bootstrap.bundle.min.js');

    css_file('components/categolist/categolist.css');
    js_file('components/categolist/categolist.js');
});

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

/*
    https://codepen.io/goprime/pen/dqLOxb
*/
function access_denied(){
    js_file('js/dynamics.min.js');

    ?>
    <style>
        #restricted_access {
            margin:0;
            padding:0;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:"Quicksand", sans-serif;
        }

        #container_anim{
            position:relative;
            width:100%;
            height:70%;
        }

        #key{
            position:absolute;
            top:77%;
            left:-33%;
        }

        #text{
        font-size:4rem;
        position:absolute;
        top:55%;
        width:100%;
        text-align:center;
        }

        #credit{
            position:absolute;
            bottom:0;
            width:100%;
            text-align:center;
        }

        a{
            color: rgb(115,102,102);
        }
    </style>

    <!-- 
        Credits: Created with the help of http://dynamicsjs.com/ 
    -->

    <div id="restricted_access">
        <div id="container_anim">
            <div id="lock" class="key-container">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="317.286 -217 248 354" width="248" height="354"><g><path d="M 354.586 -43 L 549.986 -43 C 558.43 -43 565.286 -36.144 565.286 -27.7 L 565.286 121.7 C 565.286 130.144 558.43 137 549.986 137 L 354.586 137 C 346.141 137 339.286 130.144 339.286 121.7 L 339.286 -27.7 C 339.286 -36.144 346.141 -43 354.586 -43 Z" style="stroke:none;fill:#2D5391;stroke-miterlimit:10;"/><g transform="matrix(-1,0,0,-1,543.786,70)"><text transform="matrix(1,0,0,1,0,234)" style="font-family:'Quicksand';font-weight:700;font-size:234px;font-style:normal;fill:#4a4444;stroke:none;">U</text></g><g transform="matrix(-1,0,0,-1,530.786,65)"><text transform="matrix(1,0,0,1,0,234)" style="font-family:'Quicksand';font-weight:700;font-size:234px;font-style:normal;fill:#8e8383;stroke:none;">U</text></g><path d="M 343.586 -52 L 538.986 -52 C 547.43 -52 554.286 -45.144 554.286 -36.7 L 554.286 112.7 C 554.286 121.144 547.43 128 538.986 128 L 343.586 128 C 335.141 128 328.286 121.144 328.286 112.7 L 328.286 -36.7 C 328.286 -45.144 335.141 -52 343.586 -52 Z" style="stroke:none;fill:#4A86E8;stroke-miterlimit:10;"/><g><circle vector-effect="non-scaling-stroke" cx="441.28571428571433" cy="63.46153846153848" r="10.461538461538453" fill="rgb(0,0,0)"/><rect x="436.055" y="66.538" width="10.462" height="34.462" transform="matrix(1,0,0,1,0,0)" fill="rgb(0,0,0)"/></g></g></svg>
            </div>

            <div id="key">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="232.612 288.821 169.348 109.179" width="169.348" height="109.179"><g><path d=" M 382.96 349.821 L 368.96 349.821 L 368.96 314.821 L 382.96 307.821 L 382.96 349.821 Z " fill="rgb(55,49,49)"/><path d=" M 292.134 354.827 L 379.96 315.39 L 379.96 305.547 L 292.134 343.094 L 292.134 354.827 Z " fill="rgb(55,49,49)"/><path d=" M 280.96 340.109 L 401.96 288.821 L 401.96 340.109 L 382.96 349.972 L 382.96 308.547 L 265.96 360.821 L 259.96 349.972 L 280.96 340.109 Z " fill="rgb(115,102,102)"/><path d=" M 401.96 288.821 L 382.96 288.821 L 280.96 332.821 L 292.134 340.109 L 401.96 288.821 Z " fill="rgb(115,102,102)"/><g><path d=" M 232.755 354.125 C 230.958 328.501 246.297 306.519 266.988 305.068 C 287.679 303.617 305.937 323.243 307.734 348.867 C 309.531 374.492 294.191 396.473 273.5 397.924 C 252.809 399.375 234.552 379.75 232.755 354.125 Z " fill="rgb(55,49,49)"/><path d=" M 239.241 352.316 C 237.564 328.406 252.144 307.876 271.779 306.499 C 291.414 305.122 308.716 323.416 310.393 347.326 C 312.07 371.236 297.49 391.766 277.855 393.143 C 258.22 394.52 240.917 376.226 239.241 352.316 Z " fill="rgb(115,102,102)"/><path d=" M 260.038 353.084 C 259.196 348.171 261.788 343.621 265.822 342.929 C 269.856 342.238 273.816 345.665 274.658 350.578 C 275.5 355.49 272.909 360.041 268.874 360.732 C 264.84 361.424 260.88 357.997 260.038 353.084 Z " fill="salmon"/></g></g></svg>
            </div>
        </div>   
    </div>

    <script>
    var lock = document.querySelector('#lock');
    var key  = document.querySelector('#key');

    function keyAnimate(){
        dynamics.animate(key, {
            translateX: 33
        }, {
            type:dynamics.easeInOut,
            duration:500,
            complete:lockAnimate
        })
    }

    function lockAnimate(){
        dynamics.animate(lock, {
            rotateZ:-5,
            scale:0.9
            }, {
                type:dynamics.bounce,
                duration:3000,
                complete:keyAnimate
            })
    }

    setInterval(keyAnimate, 3000);

    window.addEventListener('DOMContentLoaded', (event) => {
        const title = jQuery(jQuery('.entry-title')[0]).html();
        jQuery(jQuery('.entry-title')[0]).html((title.length >0) ? `${title} | Acceso restringido` : 'Acceso restringido')
    });

    </script>

    <?php
}

// shortcode
function categolist_shortcode()
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


add_shortcode('categolist', 'categolist_shortcode');