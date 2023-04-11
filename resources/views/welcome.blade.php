<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cara Membuat Pencarian Data Table Dengan JavaScript</title>
</head>

<body>
    <input type='text' id='input' onkeyup='searchTable()'>
    <table id="table">
        <?php
        echo "<thead>
   <tr>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
   </tr>
   </thead>
   <tbody>
   <tr>
      <td>Rindi</td>
      <td>Wanita</td>
   </tr>
   <tr>
      <td>Gofur</td>
      <td>Pria</td>
   </tr>
   <tr>
      <td>Faiqunnuha</td>
      <td>Pria</td>
   </tr>
   </tbody>";
        ?>
    </table>
</body>
<script>
    function searchTable() {
        var input;
        var saring;
        var status;
        var tbody;
        var tr;
        var td;
        var i;
        var j;
        input = document.getElementById("input");
        saring = input.value.toUpperCase();
        tbody = document.getElementsByTagName("tbody")[0];;
        tr = tbody.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
                    status = true;
                }
            }
            if (status) {
                tr[i].style.display = "";
                status = false;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>

</html>