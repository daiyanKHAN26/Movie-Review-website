document.addEventListener('DOMContentLoaded',initStar);
function initStar(){
    const stars = document.querySelectorAll('.star-inner');
    if(stars){
        stars.forEach(function(star){
            let ratingPercentage = Math.round((star.dataset.rating / 5) *100);
            star.style.width = ratingPercentage+"%";

        })
    }
}