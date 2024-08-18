const skillArea = document.querySelector(".skill-boxes");

const skillValues = [
    ['orange','#ff733c','fa-brands fa-html5','HTML',95],
    ['blue','#3f80ea','fa-brands fa-css3-alt','CSS & SCSS',91],
    ['yellow','#f8de39','fa-brands fa-js','JS',70],
    ['turquoise','#61DBFB','fa-brands fa-react','React JS',75],
    ['red','#ff3c3c','fa-brands fa-bootstrap','Bootstrap',90],
    ['purple','#8d4bbf','fa-brands fa-php','PHP-PDO',80],
    ['green','#4bbf73','fa-solid fa-database','MySql',60],
]

skillValues.forEach(value => {
    let skillBox = `
        <div class="skill-box" style="color: ${value[1]}">
            <div class="skill-info">
                <div class="skill-icon"><i class="${value[2]}"></i></div>
                <div class="skill-text">${value[3]}</div>
                <div class="skill-level">%<span>${value[4]}</span></div>
            </div>
            <div class="level-bar"><div class="bar"></div></div>
        </div>
    `;

    skillArea.innerHTML += skillBox;
});

const values = document.querySelectorAll(".skill-level span");
const bars = document.querySelectorAll(".level-bar .bar");

for(let i=0; i<bars.length; i++) {
    bars[i].style.background = skillValues[i][1];
    bars[i].style.width = skillValues[i][4] + "%";
}

let startCountNumber = true; // animasyon uygulanıp uygulanmayacağı!

function countNumber(){
    if(startCountNumber){
        for(let i=0; i<values.length; i++) {
            let count = 0;
            values[i].textContent = count;
            let countInterval = setInterval(()=>{
                count++;
                if(Number(values[i].textContent) < skillValues[i][4]){
                    values[i].textContent = count;
                }else{
                    clearInterval(countInterval)
                }
            },15)
        }
    }
}

const skillAreaTop = document.getElementById("skills").offsetTop;

window.addEventListener("scroll", () => {
    if(window.scrollY > skillAreaTop - 400){
        skillArea.classList.add("active");
        countNumber();
        startCountNumber = false;
    }else{
        startCountNumber = true;
        skillArea.classList.remove("active");
    }
})