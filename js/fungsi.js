var keyword = document.getElementById('keyword');
     var btnCari = document.getElementById('btn-cari');
     var container = document.getElementById('pending-table');

     keyword.addEventListener('keyup', function() {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
            // console.log('ajax aman');
          }
        }

        xhr.open('GET', '../EDC/fungsi/cari.php?keyword=' + keyword.value, true);
        xhr.send();
     });