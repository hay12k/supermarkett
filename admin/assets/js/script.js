const body = document.querySelector("body")
     
      const themeToggler = document.querySelector(".theme-Toggler");
      themeToggler.addEventListener('click', () => {
        document.body.classList.toggle('dark');
        themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
        themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
      })

      function toggleMenu(){
        let toggle = body.querySelector(".toggle");
        sidebar = body.querySelector(".sidebar");
        main = body.querySelector(".main"),
        toggle.classList.toggle("active");
        sidebar.classList.toggle("active");
        main.classList.toggle("active");
      }


// --------------active sidebar------------------

// const windowPathname = window.location.pathname;
// const li = document.querySelectorAll('ul a').
// forEach(link => {
//   if(link.href.includes('${windowPathname}')){
//      link.className('active_1');
//   }
// });



// Add Active Class To Navbar

$(function(){

  var url = window.location.pathname, 
  urlRegExp = new RegExp(url.replace(/\/$/,'') + "$");
  $('ul li a').each(function(){
      if(urlRegExp.test(this.href.replace(/\/$/,''))){
          $(this).addClass('active_1');
      }
  });

});