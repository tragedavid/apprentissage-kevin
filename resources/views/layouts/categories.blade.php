<script>
$('#sub_categories').on('change', '.select_category', function(e){    
    console.log(this);
    id = this.value;
    tier = parseInt(this.id);  
    if (document.getElementById(tier+1)) {
        w = tier + 1;
        while(document.getElementById(w)) {
            document.getElementById(w).remove();
            w++;
        }
    }
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
        }
    });
    $.ajax({
        url: '/laravel/maraicher/public/ajax/category-childs/' + id,
        type: 'POST',
        data: {
        
        },    
        dataType: 'JSON',
            success: function (data) {
                console.log(data);
                if(data.length > 0) {
                    if (!document.getElementById(tier+1)) {
                        item = document.createElement("select");
                        item.className = "select_category";
                        item.id = tier+1;
                        item.name = "id_category";
                        document.getElementById('sub_categories').appendChild(item);
                    }
                    document.getElementById(tier+1).innerHTML = '<option value="' + id + '">None</option>';
                    for(i=0; i<data.length; i++) {
                    document.getElementById(tier+1).innerHTML += 
                    '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                    }
                }
            },
            error: function (e) {
                console.log(e.responseText);
            }
    });
});
</script>