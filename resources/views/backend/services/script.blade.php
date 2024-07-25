<script>
    var count=0;
    $(document).ready(function(){
        add();
    });

    function add(){
        count=$('.gallery_content').length;
        $('.gallery_data').append('<tr class="gallery_content" id="gallery_content_'+count+'">'+
            '<td class="gallery_number">'+(count+1)+'</td>'+
            '<td><img class="gallery_preview" id="preview_'+count+'" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" /></td>'+
            '<td><input data-preview="preview_'+count+'" id="gallery_'+count+'" class="gallery_input form-control col-md-7 col-xs-12 picture"  name="gallery['+count+'][media]" type="file" accept="image/*"></td>'+
            '<td>'+
            '<button type="button" onclick="remove(\'#gallery_content_'+count+'\')" class="gallery_delete btn btn-danger btn-round">'+
            '<i class="fa fa-times"></i>'+
            '</button>'+
            '</td>'+
            '<td>'+
            '<button type="button" onclick="add()" class="btn btn-primary btn-round">'+
            '<i class="fa fa-plus"></i>'+
            '</button>'+
            '</td>'+
            '</tr>'
        );
        $('.picture').on("change",function(){
                var id=$(this).attr('data-preview');
                preview(this,id);
        });
    }

    function remove(id){
        $(id).remove();
        var i=0;
        $('.gallery_content').each(function(){
            var number=$(this).find('.gallery_number');
            var preview=$(this).find('.gallery_preview');
            var input=$(this).find('.gallery_input');
            var delete_button=$(this).find('.gallery_delete');
            $(this).attr("id","gallery_content_"+i);
            $(number).html(i+1);
            $(preview).attr("id","preview_"+i);
            $(input).attr("data-preview","preview_"+i);
            $(input).attr("id","gallery_"+i)
            $(input).attr("name","gallery["+i+"][media]");
            var data_del=$(delete_button).attr('data-del');
            if(data_del === undefined){
                $(delete_button).attr("onclick","remove(\'#gallery_content_"+i+"\')");
            }
            i=i+1;
        });
    }

</script>
