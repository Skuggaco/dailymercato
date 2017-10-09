$.fn.exists = function () {
    return this.length !== 0;
}

// Gestions des btns de voir plus avec appel ajax
var moreBtn = function(id, name){
    $(document).on("click", '#voir-'+id, function(){
        var currentPage = $("#voir-"+ id +" .glyphicon").attr('id');
        var nextPage = parseInt(currentPage) + 1;
        $.ajax({
            url : window.location.href,
            type : 'GET',
            data : name+'='+ nextPage,
            dataType : 'html', // On désire recevoir du HTML
            success : function(code_html){ // code_html contient le HTML renvoyé
                var html = $(code_html).find("."+name+" tbody tr");
                console.log(html);
                if($(html).exists()) {
                    $(html).insertAfter($("."+name+" tr").last());
                    $("#voir-"+ id +" .glyphicon").attr('id', nextPage);
                } else{
                    $("#voir-"+id).fadeOut(100,function(){
                        $("#nomore-"+id).fadeIn(400);
                    });
                }
            }
        });
    });
};

var voteBtn = function(nameClass, i){
    $('.container').on('click', '.'+nameClass, function(){
        var id = this.getAttribute("value");
        $.ajax({
            url : '/voter',
            type : 'GET',
            data : 'val='+nameClass+'&id=' + id,
            dataType : 'html',
            success : function(data){
                $('.V'+id).fadeOut(100,function(){
                    $('.H'+id).fadeIn(500,function(){
                        $.ajax({
                            url : urlLocal +'webroot/js/calls/nbr_vote'+i+'.php',
                            type : 'GET',
                            data : 'id=' + id,
                            dataType : 'html',
                            success : function(data){
                                $('.H'+id).fadeOut(1500,function(){
                                    $('.H'+id).html(data);
                                    $('.H'+id).fadeIn(500);
                                });
                            }
                        });
                    });
                });
                if(i != 2){
                    document.getElementById(id).innerHTML = data;
                }
            }
        });
    });
};


$(document).ready(function() {
    voteBtn('oui', '');
    voteBtn('non', '');
    moreBtn(1, 'hottestTab');
    moreBtn(2, 'officialTab');
});