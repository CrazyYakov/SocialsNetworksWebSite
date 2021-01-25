<script>
    let url = window.location.href
    let rep_url = url.replace("token.php","")
    document.location.href = rep_url.replace("#", "?")
</script>