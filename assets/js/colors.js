// Seçilebilecek renk değerlerini belirle (name,main,second)
const colors = [
    ["blue","#2C81F9","#80c3ff"],
    ["green","#16d899","#80ffcf"],
    ["purple","#9149f9","#b195f8"],
    ["red","#ff4141","#f98383"],
    ["brown","#d5885e","#e7c4af"],
    ["pink","#f723ff","#ffb7f8"],
    ["orange","#f9a92c","#ffd491"],
    ["yellow","#F7DF1E","#f4ff91"],
];

const colorPickerArea = document.querySelector(".color-picker"); // renk seçme alanını seç

// Belirlenen renk değerlerinin tümüne ait bir label oluştur ve renk seçme alanına ekle(appendChild)
for(let index = (colors.length-1); index >= 0; index--){ // tersten başla, başa doğru döndür
    const colorLabel = document.createElement("label"); // label oluştur
    colorLabel.className = "color-label " + colors[index][0]; // label'e colors dizisinde ki renk adını ata
    colorLabel.style.background = colors[index][1]; // label background'a colors dizisinde ki main renk kodunu ata
    // label'e onclick event'i ekle ve değer olarak changeColor(name,main,second) fonskiyonuna yönlendir
    colorLabel.setAttribute("onclick","changeColor('" + colors[index][0] + "','" + colors[index][1] + "','" + colors[index][2] + "')");
    colorIcon = document.createElement("span"); // span oluştur
    colorIcon.className= "bi bi-check-lg"; // span'e bootstrap iconu ekle
    colorLabel.appendChild(colorIcon); // span'i label'e ekle
    // renk seçme alanına bir önceki içeriğin öncesine(insertBefore), oluşturulan label'i ekle
    colorPickerArea.insertBefore(colorLabel,colorPickerArea.children[0]);
}

/** 
 * localStorage'de kayıtlı olan mainColor değerini al ve renk değiştirme fonksiyonuna gönder,
 * yoksa colors dizisindeki ilk satır değerlerini gönder
 * */ 
if(localStorage.getItem("mainColor")){
    changeColor(localStorage.getItem("nameColor"),localStorage.getItem("mainColor"),localStorage.getItem("secondColor"))
}else{
    changeColor(colors[0][0],colors[0][1],colors[0][2])
}

function changeColor(nameColor,mainColor,secondColor){

    // gelen değerleri localStorage içerisine kaydet ve değişkenlere ata
    localStorage.setItem("nameColor",nameColor); 
    localStorage.setItem("mainColor",mainColor);
    localStorage.setItem("secondColor",secondColor);
    localMainColor = localStorage.getItem("mainColor")
    localSecondColor = localStorage.getItem("secondColor")
   
    const selectLabels = document.querySelectorAll(".color-label"); // tüm renk seçme labellerini seç

    // seçilen tüm labellerin color değerini görünmez(transparent) yap
    for (let index = 0; index < selectLabels.length; index++) {
        selectLabels[index].style.color = "transparent";
    }

    const selectCheckLabel = document.querySelector("." + nameColor); // seçilen renk labelini seç
    selectCheckLabel.style.background = localMainColor; // seçilen labelin background değerini localStorage'den ata
    selectCheckLabel.style.color = "#fff"; // seçilen labelin color değerini ata

    // localStorage'de kayıtlı olan renk değerlerini tüm cv gösterimler için ayarla
    document.querySelector(':root').style.setProperty('--main-color', localMainColor);
    document.querySelector(':root').style.setProperty('--second-color', localSecondColor);
    
    // Değerlere göre CV linki ayarla
    // cvLink();

}

// CV Link Settings
function cvLink(){
    const siteUrl = window.location.origin;
    const pathName = window.location.pathname;
    
    let CVthemeValue = "light";
    let CVcolorValue = "blue";
    
    if(localStorage.getItem("theme")){
        CVthemeValue = localStorage.getItem("theme");
    }
    if(localStorage.getItem("nameColor")){
        CVcolorValue = localStorage.getItem("nameColor");
    }
    
    const CVLink = siteUrl + "/cv" + pathName + "/" + CVthemeValue + "/YasinAkbulut_" +  CVcolorValue + ".pdf";
    document.querySelector(".cv-link").href = CVLink; 
}

