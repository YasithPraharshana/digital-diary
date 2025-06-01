$(document).ready(function() {
    $("#preview").click(function() {
    setInterval(function() {
        var start = $("#start-date").val();
        var end = $("#end-date").val();
        var select = `api/show.php?sd=${start}&ed=${end}`;
        

        $.getJSON(select, function(data) {
            
            var records = data;
            var html = "";
            for (var i = 0; i < records.length; i++) {
                var record = records[i];
                var week = record.date.substr(0, 7);
                html += "<div class='week' id='" + week + "'>";
                if (i == 0 || week != $("#" + week).data("week")) {
                    html += "<h2>" + week + "</h2>";
                    $("#" + week).data("week", week);
                }
                html += "<div class='record'>";
                html += "<p class='date'>" + record.date + "</p>";
                html += "<p class='description'>" + record.description + "</p>";
                html += "</div>";
            }
            $('#records').html(html);
        });
    }, 1000);
});
});