let menuitems = document.getElementById("menuitems");
let departmentsnavbar = document.getElementById("departmentsnavbar");
menuitems.style.maxHeight = "0px";
departmentsnavbar.style.maxHeight = "0px";

//Display Menu Toggle Function
function menutoggle(){
  if(menuitems.style.maxHeight == "0px")
  {
    menuitems.style.maxHeight = "fit-content"
    document.getElementById("menuitems").style.display = "list-item";
    document.getElementById("nav-exit").style.visibility = "visible";
  }
  else
  {
    menuitems.style.maxHeight = "0px"
    document.getElementById("menuitems").style.display = "none";
    document.getElementById("nav-exit").style.visibility = "collapse";
    
    departmentsnavbar.style.maxHeight = "0px"
    document.getElementById("departmentsnavbar").style.display = "none";	
  }
}

//Display Departments Menu Toggle Function
function departmentsmenutoggle(){
  if(departmentsnavbar.style.maxHeight == "0px")
  {
    departmentsnavbar.style.maxHeight = "fit-content"
    document.getElementById("departmentsnavbar").style.display = "flex";
  }
  else
  {
    departmentsnavbar.style.maxHeight = "0px"
    document.getElementById("departmentsnavbar").style.display = "none";
  }
}