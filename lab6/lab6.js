var battle = document.getElementById("battle");
var luneburg = document.getElementById("luneburg");
var bermuda = document.getElementById("bermuda");
var athens = document.getElementById("athens");
var florence = document.getElementById("florence");
var featured = document.getElementById("featured");
var featured_img = document.getElementById("featured_img");
var featured_fig = document.getElementById("featured_fig");

// function changeSRC(e2,e1) {
//     e1.nodeFromID(featured_img).src = e2.src;
//     e1.nodeFromID(featured_fig).title = e2.title;
// }

featured.onmouseover = function(){
    startMove(80);
};
featured.onmouseout = function(){
    startMove(0);
};

var alpha = 0;
var timer = null;
function startMove(it) {
    clearInterval(timer);
    timer = setInterval(function() {
        var speed = 0;    //定义运动的速度
        if (alpha < it) {
            speed = 5;
        }
        else {
            speed = -5;
        }
        if (alpha === it) { //若传入的的透明度等于本来的透明度就清除定时器
            clearInterval(timer);
        }
        else {
            alpha = alpha+speed;
            featured.style.opacity = alpha/100;
        }
    },50)
}

// featured.style.width = '646px';
// featured.style.margin = '0 2px';
// featured.style.padding = '8px 5px 3px 9px';
// featured.style.backgroundColor = '#FAFAFA';
// featured.style.opacity = '0';
battle.onclick = function () {
    featured_img.src = this.src;
    featured_img.title = this.title;
    featured_fig.innerText = this.title;
};
luneburg.onclick = function () {
    featured_img.src = this.src;
    featured_img.title = this.title;
    featured_fig.innerText = this.title;
};
bermuda.onclick = function () {
    featured_img.src = this.src;
    featured_img.title = this.title;
    featured_fig.innerText = this.title;
};
athens.onclick = function () {
    featured_img.src = this.src;
    featured_img.title = this.title;
    featured_fig.innerText = this.title;
};
florence.onclick = function () {
    featured_img.src = this.src;
    featured_img.title = this.title;
    featured_fig.innerText = this.title;
};