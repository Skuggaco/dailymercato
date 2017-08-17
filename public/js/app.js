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
    $('#offTransfer').on("change",function(){
        $(".hide-transfer").toggle();
    });
    if($('#offTransfer').is(':checked')){
        $(".hide-transfer").toggle();
    }

    $('#chooseTeam').on("change",function(){
        $(".hide-choose_team").toggle();
        $('#offTransfer').attr("checked", !$('#offTransfer').attr("checked"));
        $('.hide-transfer').toggle();
    });
});

$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
