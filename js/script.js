        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        // script sample -->

        document.addEventListener("DOMContentLoaded", function() {
            var btn = document.getElementById("myBtn");
            var element = document.getElementById("myAlert");

            // Create alert instance
            var myAlert = new bootstrap.Alert(element);

            btn.addEventListener("click", function() {
            myAlert.close();
            });
        });

        // setTimeout(() => {
        //     const alert = document.getElementById('myAlert');

        //     alert.style.display = 'none';

        // }, 2000);

        $(document).ready(function() {
            $('#tabel-data-sample').DataTable();
        });

        $('#tabel-data-sample').dataTable({
            "pageLength": 5
        });

        var table = $('#tabel-data-sample').DataTable();

        table
            .order([2, 'desc'])
            .draw();

        $(document).ready(function() {
            $('#tabel-data-ready').DataTable();
        });

        $('#tabel-data-ready').dataTable({
            "pageLength": 5
        });

        var table = $('#tabel-data-ready').DataTable();

        table
            .order([2, 'desc'])
            .draw();

        

        // <-- end script sample

        // script track -->

        //         var elem = document.getElementById("dash-index");
        // function openFullscreen() {
        //   if (elem.requestFullscreen) {
        //     elem.requestFullscreen();
        //   } else if (elem.webkitRequestFullscreen) { /* Safari */
        //     elem.webkitRequestFullscreen();
        //   } else if (elem.msRequestFullscreen) { /* IE11 */
        //     elem.msRequestFullscreen();
        //   }
        // }

    
        $(document).ready(function() {
            $('#tabel-track').DataTable();
        });

        $('#tabel-track').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-track').DataTable();

        table
            .order([1, 'desc'])
            .draw();
            
        $(document).ready(function() {
            $('#tabel-data-incoming').DataTable();
        });

        $('#tabel-data-incoming').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-data-incoming').DataTable();

        table
            .order([4, 'desc'])
            .draw();

        $("#export").click(function (e) {
            window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabel-data-incoming').html()));
            e.preventDefault();
        });

        

        $(document).ready(function() {
            $('#tabel-data-waiting').DataTable();
        });

        $('#tabel-data-waiting').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-data-waiting').DataTable();

        table
            .order([5, 'desc'])
            .draw();

        $(document).ready(function() {
            $('#tabel-scrap').DataTable();
        });

        $('#tabel-scrap').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-scrap').DataTable();

        table
            .order([1, 'desc'])
            .draw();

        $(document).ready(function() {
            $('#tabel-return').DataTable();
        });

        $('#tabel-return').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-return').DataTable();

        table
            .order([1, 'desc'])
            .draw();

        $(document).ready(function() {
            $('#tabel-exp').DataTable();
        });

        $('#tabel-exp').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-exp').DataTable();

        table
            .order([3, 'desc'])
            .draw();

        $(document).ready(function() {
            $('#tabel-exp-after').DataTable();
        });

        $('#tabel-exp-after').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-exp-after').DataTable();

        table
            .order([3, 'desc'])
            .draw();

        $(document).ready(function() {
            $('#tabel-history').DataTable();
        });

        $('#tabel-history').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-history').DataTable();

        table
            .order([0, 'asc'])
            .draw();



        document.addEventListener("DOMContentLoaded", function() {
            var tabList = [].slice.call(document.querySelectorAll('a[data-bs-toggle="tab"]'));
            tabList.forEach(function(tab) {
                tab.addEventListener("shown.bs.tab", function(e) {
                    console.log(e.target); // newly activated tab
                    console.log(e.relatedTarget); // previous active tab
                    var activeTab = e.target.innerText; // Get the name of active tab
                    var previousTab = e.relatedTarget.innerText; // Get the name of previous active tab
                    document.querySelector(".active-tab span").innerHTML = activeTab;
                    document.querySelector(".previous-tab span").innerHTML = previousTab;
                });
            });
        });

        $(document).ready(function() {




            var down = false;

            $('#bell').click(function(e) {

                var color = $(this).text();
                if (down) {

                    $('#box').css('height', '0px');
                    $('#box').css('opacity', '0');
                    down = false;
                } else {

                    $('#box').css('height', 'auto');
                    $('#box').css('opacity', '1');
                    down = true;

                }

            });

        });

        

        // $(document).ready(function() {
        //     openFullscreen();
        // });
        // // window.onload = function () {
        // var elem = document.getElementById("myvideo");

        //         /* Function to open fullscreen mode */
        //         function openFullscreen() {
        //         if (elem.requestFullscreen) {
        //             elem.requestFullscreen();
        //         } else if (elem.webkitRequestFullscreen) { /* Safari */
        //             elem.webkitRequestFullscreen();
        //         } else if (elem.msRequestFullscreen) { /* IE11 */
        //             elem.msRequestFullscreen();
        //         }
        //         }
        // // }

        // <-- end script track

        // script track -->
        document.addEventListener("DOMContentLoaded", function() {
        var btn = document.getElementById("myBtn");
        var element = document.getElementById("myAlert");

        // Create alert instance
        var myAlert = new bootstrap.Alert(element);

        btn.addEventListener("click", function() {
            myAlert.close();
        });
        });

        $(document).ready(function() {
            $('#tabel-data-tracking').DataTable();
        });

        $('#tabel-data-tracking').dataTable({
            "pageLength": 5
        });

        // $('#tabel-data').dataTable({
        //     "order": [[13, 'desc']];
        // });

        var table = $('#tabel-data-tracking').DataTable();

        table
            .order([12, 'desc'])
            .draw();

        // <-- end script track

        $(window).on("load",function(){
            $(".loader-wrapper").fadeOut("slow");
            // $("section").addClass("blur-effect");
        });


        $('#myButton').click(function() {
        $('#editProfile').toggle('slow', function() {
            // Animation complete.
        });
        });

        // live preview uploaded photo
        $(function(){
        $('#upload').change(function(){
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
            {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
                }
            reader.readAsDataURL(input.files[0]);
            }
            else
            {
            $('#img').attr('src', '/assets/no_preview.png');
            }
        });

        });

        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("head-page");
        var sticky = navbar.offsetTop;

        function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
        }

        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
        

     