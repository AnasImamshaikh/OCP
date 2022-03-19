function openNav() {
    document.getElementById("my-side-nav").style.width = "250px";
}

function closeNav() {
    document.getElementById("my-side-nav").style.width = "0";
}

let x = location.pathname;
if (x == '/Courses_page.html') {
    document.getElementById('main-h4').innerHTML += " => Courses";
}




