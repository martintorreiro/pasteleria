function cargarReviews(idProd){
    
    $("#reviews").click(function(){
       console.log(idProd)
        $("#details-content").load("service/cargar-reviews.php?idPost="+idProd,function(){
            console.log("review")
        })
    })
}