let menuitems = document.getElementById("menuitems");
menuitems.style.maxHeight = "0px";

let departmentsnavbar = document.getElementById("departmentsnavbar");
departmentsnavbar.style.maxHeight = "0px";

//Display Menu Toggle Function
function menutoggle(){
  if(menuitems.style.maxHeight == "0px")
  {
    menuitems.style.maxHeight = "fit-content"
    document.getElementById("nav-exit").style.visibility = "";
  }
  else
  {
    menuitems.style.maxHeight = "0px"
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

//Close all the Menu Toggles
function closeallmenutoggle(){
  if(menuitems.style.maxHeight != "0px" || departmentsnavbar.style.maxHeight != "0px")
  {
    menuitems.style.maxHeight = "0px"
    document.getElementById("nav-exit").style.visibility = "collapse";

    departmentsnavbar.style.maxHeight = "0px"
    document.getElementById("departmentsnavbar").style.display = "none";
  }
}