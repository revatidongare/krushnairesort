<script>
$(function () { 
    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) { 
            $("#brandlogo1").removeClass('nav-brand');
            $("#brandlogo1").addClass('nav-brand2');     
        }
        if ($(this).scrollTop() < 1) { 
            $("#brandlogo1").removeClass('nav-brand2');
            $("#brandlogo1").addClass('nav-brand');
        }
    })
});
</script>