let type = prompt("Какой тип сайта вы хотите? (выберите подходящий номер)\n   1. Одностраничный сайт \n   2. Сайт-визитка \n   3. Корпоративный сайт \n   4. Промо-сайт \n   5.Интернет-магазин\n   6. Имиджевый сайт\n   7. Персональный сайт\n   8. Онлайн-сервис\n   9.Портал \n  10.Веб-приложение");
var typesite, designsite, adaptsite;

if (type.toLowerCase() == "1") {
  alert("Стоимость одностраничного сайта 5000 рублей");
  typesite = 5000;
}else if(type.toLowerCase() == "2"){
	alert("Стоимость сайта-визитки 7000 рублей");
  typesite = 7000;
}else if(type.toLowerCase() == "3"){
	alert("Стоимость корпоративного сайта 30000 рублей");
  typesite = 30000;
}else if(type.toLowerCase() == "4"){
	alert("Стоимость промо-сайта 32000 рублей");
  typesite = 32000;
}else if(type.toLowerCase() == "5"){
	alert("Стоимость интернет-магазина 37000 рублей");
  typesite = 37000;
}else if(type.toLowerCase() == "6"){
	alert("Стоимость имиджевого сайта 15000 рублей");
  typesite = 15000;
}else if(type.toLowerCase() == "7"){
	alert("Стоимость персонального сайта 7000 рублей");
  typesite = 7000;
}else if(type.toLowerCase() == "8"){
	alert("Стоимость онлайн-сервиса 7000 рублей");
  typesite = 7000;
}else if(type.toLowerCase() == "9"){
	alert("Стоимость портала 15000 рублей");
  typesite = 15000;
}else if(type.toLowerCase() == "10"){
	alert("Стоимость веб-приложения 20000 рублей");
  typesite = 20000;
}

let design = prompt("Какой дизайн сайта вам необходим? (выберите номер)\n   1. Классический\n   2. Минимализм\n   3. Корпоративный\n   4. Информационный" );
if(design.toLowerCase() == "1"){
	alert( "Стоимость классического дизайна 2000 рублей");
	designsite = 2000;
}
else if(design.toLowerCase() == "2"){
	alert( "Стоимость классического дизайна 3000 рублей");
	designsite = 3000;
}
else
if(design.toLowerCase() == "3"){
	alert( "Стоимость классического дизайна 2000 рублей");
	designsite = 2000;
}
else
if(design.toLowerCase() == "4"){
	alert( "Стоимость классического дизайна 1500 рублей");
	designsite = 1500;
}

let adapt = prompt("Требуется ли адаптивность?\n   1. Да\n   2. Нет");
if(adapt.toLowerCase() == "1"){
	alert("Стоимость адаптивного сайта 3000 рублей");
	adaptsite = 3000;
	

}else
if(adapt.toLowerCase() == "2"){
	adaptsite = 0;
	
}
var result = Number(typesite)+ Number(designsite)+ Number(adaptsite);
var speedsite;

let speed = prompt("за какой срок вам необходим готовый сайт? (выберите номер) \n   1. как можно скорее ( к следующей неделе ) \n   2. сколько необходимо времени для создания ( две-три недели ) \n   3. не имеет значения (не более четырёх недель) ");
if(speed.toLowerCase() == "1"){
	alert("итоговая стоимость будет выше на 50%");
	speedsite = 1.5;
}
if(speed.toLowerCase() == "2"){
	speedsite = 1;
}
if(speed.toLowerCase() == "3"){
 alert("итоговая стоимость будет со скидкой 10%");
 speedsite = 0.9;
}
var Speed = result*speedsite;
alert("Итоговая стоимость сайта составляет : " + Speed);

console.log(Speed);

