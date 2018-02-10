$(function () {

    function afficherTache() {
        // afficher les taches a faire
        $("#tacheFaire").click(function () {
            //recuperer le fichier de stockage Json
            $.getJSON('stockages.json', function (donnes) {
                $('#see').empty();
                $.each(donnes, function (index, d) {
                    if (d.etat == "false") {
                        $('#see').append('<tr >' +
                            '<td id="tacheId" style="width: 80%;">' +
                            '' +
                            '   <span class="text-primary" style="font-size: 30px;">' +
                            '           <span style="font-size: 20px" class="glyphicon glyphicon-tasks"></span>' +
                            '   <b> ' + d.nomTache + ' </b></span></td>' +
                            '<td style="width: 1%" >' +
                            '   ' +
                            '       <a href="index.php?nom=' + d.nomTache + '&des=' + d.descTache + '&etat=' + d.etat + '">' +
                            '           <spam style="height: 50%" class="glyphicon glyphicon-trash"></spam>' +
                            '       </a>' +
                            '   ' +
                            '</td>' +
                            '</tr>' +
                            '<tr style="background: #fefeff; color: #000000">' +
                            '   <td id="descriptionId" style="border-bottom: lightskyblue solid;">' + d.descTache + ' </td>' +
                            '   <td id="faitId" style="width: 1%">' +
                            '        <a href="index.php?nomT=' + d.nomTache + '&descT=' + d.descTache + '">' +
                            '           <button class="btn btn-success">' + $maVariable + '</button>' +
                            '        </a>' +
                            '   </td>' +
                            ' </tr>');
                    }
                });
            })
        });

        //affichage des tache realiser
        $("#tacheFini").click(function () {
            $('#see').empty();
            $.getJSON('stockages.json', function (donnes) {
                $.each(donnes, function (index, d) {
                    if (d.etat == "true") {
                        if (d.etat == 'true') {
                            $maVariable = 'Fait';
                        }
                        else
                            $maVariable = 'A faire';

                        $('#see').append('<tr >' +
                            '<td id="tacheId" style="width: 80%;">' +
                            '' +
                            '   <span class="text-primary" style="font-size: 30px;">' +
                            '           <span style="font-size: 20px" class="glyphicon glyphicon-tasks"></span>' +
                            '   <b> ' + d.nomTache + ' </b></span></td>' +
                            '<td style="width: 1%" >' +
                            '   ' +
                            '       <a href="index.php?nom=' + d.nomTache + '&des=' + d.descTache + '&etat=' + d.etat + '">' +
                            '           <spam style="height: 50%" class="glyphicon glyphicon-trash"></spam>' +
                            '       </a>' +
                            '   ' +
                            '</td>' +
                            '</tr>' +
                            '<tr style="background: #fefeff; color: #000000">' +
                            '   <td id="descriptionId" style="border-bottom: lightskyblue solid;">' + d.descTache + ' </td>' +
                            '   <td id="faitId" style="width: 1%">' +
                            '        <a href="index.php?nomT=' + d.nomTache + '&descT=' + d.descTache + '">' +
                            '           <button class="btn btn-success">' + $maVariable + '</button>' +
                            '        </a>' +
                            '   </td>' +
                            ' </tr>');
                    }
                });
            })
        });

        //affichage de toutes les taches
        $.getJSON('stockages.json', function (donnes) {
            $('#see').empty();
            $.each(donnes, function (index, d) {

                if (d.etat == 'true') {
                    $maVariable = 'Fait';
                }
                else
                    $maVariable = 'A faire';

                $('#see').append('<tr >' +
                    '<td id="tacheId" style="width: 80%;">' +
                    '' +
                    '   <span class="text-primary" style="font-size: 30px;">' +
                    '           <span style="font-size: 20px" class="glyphicon glyphicon-tasks"></span>' +
                    '   <b> ' + d.nomTache + ' </b></span></td>' +
                    '<td style="width: 1%" >' +
                    '   ' +
                    '       <a href="index.php?nom=' + d.nomTache + '&des=' + d.descTache + '&etat=' + d.etat + '">' +
                    '           <spam style="height: 50%" class="glyphicon glyphicon-trash"></spam>' +
                    '       </a>' +
                    '   ' +
                    '</td>' +
                    '</tr>' +
                    '<tr style="background: #fefeff; color: #000000">' +
                    '   <td id="descriptionId" style="border-bottom: lightskyblue solid;">' + d.descTache + ' </td>' +
                    '   <td id="faitId" style="width: 1%">' +
                    '        <a href="index.php?nomT=' + d.nomTache + '&descT=' + d.descTache + '">' +
                    '           <button class="btn btn-success">' + $maVariable + '</button>' +
                    '        </a>' +
                    '   </td>' +
                    ' </tr>');

            });
        })
    }

    $("#addBtn").click(function () {
        $mavar = $("#tacheName").val();
        $("#nomTachelbl").text($mavar);
        $("input[name='nomTacheName']").val($mavar);
    })

    afficherTache();
});



