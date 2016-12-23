<footer>
    </footer>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <script src="js/scripts.js"></script>

    <script type = "text/javascript">

    // Show Admin Options
    $(".option-btn").on("click", function(){
      $(".admin-options").toggle();
    })

    //Hide the alert after Displaying Message
    $(".alert").delay(2000).hide(1000);
    
    //check All checkboxes
    $(".checkall").change(function(){
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    })
            
    </script>
</body>
</html>