$(document).ready(function() {

    $("#dataTable").DataTable({
        select: true,
        colReorder: true,
        searchPanes: {
            cascadePanes: true
        },
        columnDefs: [{
            searchPanes: {
                show: true
            },
            targets: [0, 1, 2, 3, 5]
        }],
        dom: 'prtlpP'
    });

    $("#addLaptimeForm").submit(function(event) {
        event.preventDefault();
        let game = $("#selectGame").val();
        let car = $("#selectCar").val();
        let track = $("#selectTrack").val();
        let transmission = $("#selectTransmission").val();
        let time = $("#inputTime").val();

        $(`<form action="addData.php" method="POST">
            <input type="hidden" name="add-type" value="laptime">
            <input type="hidden" name="track" value="` + track + `">
            <input type="hidden" name="game" value="` + game + `">
            <input type="hidden" name="car" value="` + car + `">
            <input type="hidden" name="transmission" value="` + transmission + `">
            <input type="hidden" name="time" value="` + time + `">
        </form>`).appendTo('body').submit();
    })
})