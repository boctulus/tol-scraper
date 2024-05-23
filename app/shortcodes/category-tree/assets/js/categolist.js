const max_categos = 3;

function is_cat_checked(cat_id){
    return document.querySelector('#cat-' + cat_id).checked;
}

function set_cat_error_msg(msg){
    document.querySelector('#cat-selector-msgs').innerText = msg;
}

function clear_cat_error_msg(msg){
    document.querySelector('#cat-selector-msgs').innerText = " "
}

function loadingAjaxNotification() {
    //$('#create_loading_off').show();
}

function clearAjaxNotification() {
    //$('#create_loading_off').hide();
}

//
// Ajax call
//
// https://stackoverflow.com/questions/42381521/how-to-get-current-logged-in-user-using-wordpress-rest-api
//
function save_categories(categos){
    params = []

    const query    = params.toString();
    const base_url = '<?= home_url('/') ?>';
    const url      = base_url + 'wp-json/reactor/v1/user-categories' + '?' + query;

    data = {};
    data.categories = categos;

    data = JSON.stringify(data)

    jQuery.ajax({
        url: url, 
        type: "post",
        dataType: 'json',
        cache: false,
        processData: false, 
        contentType: false, 
        data,
        // https://stackoverflow.com/a/57032303/980631
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-WP-Nonce', ScoreSettings.nonce);
        },
        success: function(res) {
            clearAjaxNotification();

            if (typeof res['error'] != 'undefined'){
                //setNotification(res['error']);
                //return;
            }

            if (typeof res['data'] == 'undefined'){
                console.log('Response without data.')
                //setNotification('Response without data');
                return;
            }

            console.log(res['data']);
            
        },
        error: function(res) {
            clearAjaxNotification();

            if (typeof res['message'] != 'undefined'){
                // setNotification(res['message']);
                console.log(res['message']);
            }

            console.log(res);
            console.log("An error occured, please try again.");         
        }
    });
}

function report_cat_change(id, elem, event){
    const check = document.querySelector('#cat-'+id).checked;

    if (check){
        checkboxes.push(id);
    } else {
        checkboxes = array_remove(checkboxes, id);
    }
    
    let acc = 0;
    checkboxes.forEach((element, ix) => {
        acc += element ? 1 : 0;           
    });

    if (acc < max_categos){
        clear_cat_error_msg();
    }

    if (acc > max_categos){
        document.querySelector('#cat-'+ id).checked = false;
        checkboxes = array_remove(checkboxes, id);

        set_cat_error_msg("Has alcanzado el máximo de categorias")
        alert(`El máximo de categorias es de ${max_categos}`)
    }  

    save_categories(checkboxes)
}