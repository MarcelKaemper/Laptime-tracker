$(document).ready(() => {
    if ($("#finalGameSelector").val() == "-1") {
        $("#finalTrackSelector").hide();
    }
    if ($("#finalTrackSelector").val() == "-1") {
        $("#finalCarSelector").hide();
    }

    $("#finalGameSelector").change(function() {
        $("<form action='index.php' method='post'><input type='hidden' name='selectedGame' value='" + $(this).val() + "'></form>")
            .appendTo('body').submit();
    })

    $("#finalTrackSelector").change(function() {
        $("<form action='index.php' method='post'><input type='hidden' name='selectedGame' value='" + $("#finalGameSelector").val() + "'><input type='hidden' name='selectedTrack' value='" + $(this).val() + "'></form>")
            .appendTo('body').submit();
    })
})