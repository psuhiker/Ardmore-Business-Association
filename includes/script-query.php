<script>
    // parses query string to assign as variables
     {
        var query = window.location.search.substring(1);
        var tempQuery = query.replace(/%20/g," ");
        //var vars = query.split("&");
        var vars = tempQuery.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){
                return pair[1];
            }
        }
        return(false);
    }
</script>