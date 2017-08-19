$(document).ready(function(){
    $(document).on('click', '.teamsAjax', function() {
        var id = this.id;
        $.ajax({
            url: '/admin/equipes/charger',
            type: 'GET',
            data: 'id=' + id,
            dataType: 'html',
            success: function (data) {
                $(data).insertAfter('#'+id);
                $('#'+id).removeClass().addClass('classHide');
                $('.chevronsAjax-'+ id +' .up').toggle();
                $('.chevronsAjax-'+ id +' .down').toggle();
            }
        });
    });

    $(document).on('click', '.playersAjax', function() {
        var id = this.id;
        $.ajax({
            url: '/admin/joueurs/charger',
            type: 'GET',
            data: 'id=' + id,
            dataType: 'html',
            success: function (data) {
                $(data).insertAfter('#'+id);
                $('#'+id).removeClass().addClass('classHide');
                $('.chevronsAjax-'+ id +' .up').toggle();
                $('.chevronsAjax-'+ id +' .down').toggle();
            }
        });
    });

    $(document).on('click', '.classHide', function(){
        var id = this.id;
        $('.div-'+id).toggle();
        $('.chevronsAjax-'+ id +' .up').toggle();
        $('.chevronsAjax-'+ id +' .down').toggle();
    });

    $(document).on('click', '.delete', function(){
        return confirm("Voulez-vous vraiment supprimer cette donnée ?");
    });

    // Cacher/affiché l'input montant si on clique sur le checkbox officiel
    $('#off').on("ifChanged",function(){
        $(".hide-transfer").toggle();
    });
    if($('#off').is(':checked')){
        $(".hide-transfer").toggle();
    }

    $('#choose').on('ifChanged', function(){
        $(".hide-choose_team").toggle();
        $('#off').iCheck('toggle');
    });
    $('select').select2();

    $('input').iCheck({
        checkboxClass: 'icheckbox_square',
        radioClass: 'iradio_square',
        increaseArea: '0%'
    });

});

$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
