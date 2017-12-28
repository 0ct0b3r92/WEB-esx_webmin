
$('a.accepte').on('click',function(e){
    e.preventDefault();
    var title = 'Êtes vous certain d\'accepter ce membre?';
    var text = 'Il pourrais ne pas respecter les rêglements du serveur.';
    var type = 'warning';
    var url = "/api/whitelist/accepte";
    var data = {
        member : $(this).attr('data-user'),
        validationBy : $(this).attr('data-validateBy'),
        token : $("meta[name=csrf-token]").attr("content")
    };
    postAlertModal(title, text, type, url, data)
});

$('a.refuse').on('click',function(e){
    e.preventDefault();
    var title = 'Êtes vous certain de refuser?';
    var text = 'Ce membre deveras refaire une candidature';
    var type = 'warning';
    var url = "/api/whitelist/refuse";
    var data = {
        member : $(this).attr('data-user'),
        validationBy : $(this).attr('data-validateBy'),
        token : $("meta[name=csrf-token]").attr("content")
    };
    postAlertModal(title, text, type, url, data)
});

