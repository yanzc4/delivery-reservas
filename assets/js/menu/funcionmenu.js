const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }

    window.frames['myFrame'].document.querySelector('body').classList.toggle('dark');
    
    //creamos una variable para guardar el modo actual
    if (document.body.classList.contains('dark')) {
        localStorage.setItem('dark-mode', 'true');
    }else{
        localStorage.setItem('dark-mode', 'false');
    }
        
});

//obtenemos el modo actual
if (localStorage.getItem('dark-mode') === 'true') {
    body.classList.add('dark');
    modeText.innerText = "Light mode";
}else{
    body.classList.remove('dark');
    modeText.innerText = "Dark mode";
}


