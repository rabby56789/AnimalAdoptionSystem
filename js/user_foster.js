   //載入Json
    let requestURL = 'https://next.json-generator.com/api/json/get/NylHyKeopP';
    let request = new XMLHttpRequest();
    request.open('GET', requestURL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
      const pets = request.response;
      showpet(pets);
    }
	//顯示送養動物資料
    function showpet(jsonObj) {
	var newDiv=document.createElement('div');
	newDiv.setAttribute("class","a_animal")
	  
	var info=document.createElement('a');
	info.setAttribute("href","animal_info.html");
	var pic=document.createElement('img')
	pic.setAttribute("src",jsonObj['img_file']);
	pic.setAttribute("alt","no image");
	pic.setAttribute("onerror","this.src='ui_img/no_image.png'");
	info.appendChild(pic);
	newDiv.appendChild(info);
	  
    var pet_name = document.createElement('p');
    pet_name.innerHTML ='動物:' + jsonObj['pet_name'];
	  
	var gender = document.createElement('p');
    gender.innerHTML ='性別:' + jsonObj['gender'];
	  
	var area = document.createElement('p');
    area.innerHTML ='地區:' + jsonObj['area'];
	  
	var isAdopted = document.createElement('p');
    isAdopted.innerHTML ='是否可領養:' + jsonObj['isAdopted'];
	  
    newDiv.appendChild(pet_name);
	newDiv.appendChild(gender);
	newDiv.appendChild(area);
	newDiv.appendChild(isAdopted);
	  
	var newbtn1=document.createElement('button');
	newbtn1.setAttribute("type","button")
	newbtn1.innerHTML='修改';
	  
	var newbtn2=document.createElement('button');
	newbtn2.setAttribute("type","button")
	newbtn2.innerHTML='刪除';
	  
	newDiv.appendChild(newbtn1);
	newDiv.appendChild(newbtn2);
      
	document.getElementById("pet_list").appendChild(newDiv);
    }