
const innerCursor = document.querySelector(".cursor--small");
const innerCursorBig = document.querySelector(".cursor--canvas");
var link_test = document.querySelector(".test");
var test =document.querySelector(".cordn");

var clientX = -100;
var clientY = -100;
var lastX = 0;
var lastY = 0;
var isStuck = false;
var scrollTop = 0;
var scrollLeft = 0;

window.addEventListener("scroll", (event) => {
     scrollTop = this.scrollY;
     scrollLeft = this.scrollX;
});

function initCursor() {
  
  // rafraichie la position de la souris a chaque fois qu'elle bouge
  document.addEventListener("mousemove", e => {
    clientX = e.clientX +  scrollLeft;
    clientY = e.clientY + scrollTop;
    test.innerHTML = ("(" + Math.round(clientX) + "," + Math.round(clientY) + ")" + " la pos de la scrollbar(" + Math.round(scrollLeft) + "," + Math.round(scrollTop) + ")")
    // Math.round car la pos de la scroll barre est très long ex: 120.90908813475662
  });


  
  function rendu(){
    if (!isStuck) {
      lastX += (clientX - lastX) * 0.1;
      lastY += (clientY - lastY) * 0.1;
      innerCursorBig.style.width = "25px";
      innerCursorBig.style.height = "25px";
      innerCursorBig.style.transform = 'translate(' + lastX +'px, ' + lastY + 'px)';
      innerCursor.style.transform = 'translate(' + clientX +'px, ' + clientY + 'px)';
    } else if (isStuck) {
      lastX += (stuckX - lastX) * 0.1;
      lastY += (stuckY - lastY) * 0.1;
      lastX = lastX - (25/10); 
      lastY = lastY - (25/10);
      innerCursorBig.style.width = "75px";
      innerCursorBig.style.height = "75px";
      innerCursorBig.style.transform = 'translate(' + lastX +'px, ' + lastY + 'px)';
      innerCursor.style.transform = 'translate(' + clientX +'px, ' + clientY + 'px)';
    }
    
  
    requestAnimationFrame(rendu); // rafraîchie l'animation. La fonction contenant l'animation doit être appelée avant que le navigateur n'effectue un nouveau rafraîchissement 
  };
  requestAnimationFrame(rendu);
};


function initHovers(){
  function handleMouseEnter(e){
    const navItem = e.currentTarget;
    const navItemBox = navItem.getBoundingClientRect(); // donne des informations sur la taille d'un élément et sa position relative par rapport à la zone d'affichage.
    stuckX = Math.round(navItemBox.left + navItemBox.width / 2)  + scrollLeft; // permet de trouver le centre sur l'axe hozizontale de l'élement 
    stuckY = Math.round(navItemBox.top + navItemBox.height / 2)  + scrollTop;  // permet de trouver le centre sur l'axe verticale de l'élement 
    isStuck = true;
  };


  function handleMouseLeave(){
    isStuck = false;
  };

  // on ajoute des écouteurs d'événements à tous les éléments .link grace a foreache
  const linkItems = document.querySelectorAll(".link"); // prend tous les élements qui on pour class="link"
  linkItems.forEach(item => {
    item.addEventListener("mouseenter", handleMouseEnter);
    item.addEventListener("mouseleave", handleMouseLeave);
  });
};

initCursor();
initHovers();