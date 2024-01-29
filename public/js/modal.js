$(document).ready(function() {
    $('.edit').on('click', function() {
        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        var text = getCategoryData(data[1]);
        // $('#edit_id').val(data[0]);
        $('#amount').val(data[2]);
        // var e = document.getElementById("category_id");
        // var opt = e.options[e.selectedIndex];
        // var option = document.getElementsByTagName("option")[1];
        // console.log(option);



    });

    function getCategoryData(category) {
        var select = '';
        var data = ['bb', 'blinders', 'cc', 'dd', 'ee'];
        for (i = 0; i < data.length; i++) {
            if (category.toLowerCase() == data[i].toLowerCase()) {
                select = 'selected';
            } else {
                select = '';
            }
            var list = '<option ' + select + '>' + data[i] + '</option>'
            $('select').append(list);
        }
    }
});