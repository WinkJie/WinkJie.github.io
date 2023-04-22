//收藏本站
function AddFavorite(title, url)
{
    // var url = window.location;
    // var title = document.title;
    // var ua = navigator.userAgent.toLowerCase();
    // if (ua.indexOf("360se") > -1) {
    //     alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
    // }
    // else if (ua.indexOf("msie 8") > -1) {
    //     window.external.AddToFavoritesBar(url, title); //IE8
    // }
    // else if (document.all) {//IE类浏览器
    //     try{
    //         window.external.addFavorite(url, title);
    //     }catch(e){
    //         alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
    //     }
    // }
    // else if (window.sidebar) {//firfox等浏览器；
    //     window.sidebar.addPanel(title, url, "");
    // }
    // else {
    //     alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
    // }

    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("抱歉，您所使用的浏览器无法完成此操作。\n加入收藏失败，请使用 [ Ctrl+D ] 进行添加");
        }
    }
}


//下载功能
// function download(filename, content) {
// 	var blob = new Blob([content], {type: 'text/plain'});
// 	var url = window.URL.createObjectURL(blob);
// 	var a = document.createElement('a');
//
// 	a.style = "display: none";
// 	a.href = url;
// 	a.download = filename;
// 	document.body.appendChild(a);
// 	a.click();
//
// 	setTimeout(function () {
// 		document.body.removeChild(a);
// 		window.URL.revokeObjectURL(url);
// 	}, 5);
// }
// document.getElementById('down').onclick = function () {
// 	var filename = "justdown.txt";
// 	var content = "Hello, you download a text file by Javasctipt.";
// 	download(filename, content);
// };

function downloadFiles(TXTUrl) {
    var SaveToolIframe = "<iframe class='onceSave' id='SaveIframe' style='display:none'src='" + TXTUrl + "'></iframe>";
    if ($("#SaveIframe").length == 0) {
        $("body").append(SaveToolIframe);
    } else {
        $("#SaveIframe")[0].src = TXTUrl;
    }
    var oFrm = document.getElementById('SaveIframe');
    oFrm.onload = oFrm.onreadystatechange = function () {
        if (this.readyState && this.readyState != 'complete') return;
        else {
            if ($(".onceSave").contents().attr("title").indexOf("404") >= 0)//文件未找到   根据404界面 标题确定错误
            {
                alert("没有所下载的文件");
            }
        }
    }
}

function downloadFile(fileurl, filename) {  //fileurl 文件路径，filename 文件名称
    var a = document.createElement('a');    //创建a标签
    a.download = res.data;                  //设置下载名称
    a.style.display = 'none';               //将a标签设置为不可见
    var blob = new Blob([res.data]);        //创建blob对象，字符内容转变成blob地址
    a.href = URL.createObjectURL(blob);
    document.body.appendChild(a);
    a.click();                              //出发点击事件

    document.body.removeChild(a);           //最后移除a标签
}
//
// function downloadFile(url, label) {
//     axios.get(url, { responseType: "blob" }).then(response => {
//         const blob = new Blob([response.data]);
//         const link = document.createElement("a");
//         link.href = URL.createObjectURL(blob);
//         link.download = label;
//         link.click();
//         URL.revokeObjectURL(link.href);
//     }).catch(console.error);
// }
function downloadFilemy(url, fileName) {

    var x = new XMLHttpRequest();
    x.open("GET", url, true);
    x.responseType = 'blob';
    x.onload=function(e) {
        //会创建一个 DOMString，其中包含一个表示参数中给出的对象的URL。这个 URL 的生命周期和创建它的窗口中的 document 绑定。这个新的URL 对象表示指定的 File 对象或 Blob 对象。
        var url = window.URL.createObjectURL(x.response)
        var a = document.createElement('a');
        a.href = url
        a.download = fileName;
        a.click()
    }
    x.send();
}


function downImgFile(){
    // content是图片的URL地址，
    // filename 是图片的名称（或者是你下载时候给定的名称）
    let content = './resource/赵杰_C++北京.docx';
    let filename = '赵杰.docx'
    // 创建隐藏的可下载链接
    var eleLink = document.createElement('a');
    eleLink.download = filename;
    eleLink.style.display = 'none';
    // 字符内容转变成blob地址
    var blob = new Blob([content]);
    eleLink.href = URL.createObjectURL(blob);
    // 触发点击
    document.body.appendChild(eleLink);
    eleLink.click();
    // 然后移除
    document.body.removeChild(eleLink);
}




// 原始代码
const confettiShower = [];
const numConfettis = 50;
const container = document.getElementById("xuna");
const colors = [
"#f2abe7",
"#9fa3ec",
"#86d2e1 ",
"#fec31e "];


class Confetti {
  constructor(x, y, w, h, c) {
    this.w = Math.floor(Math.random() * 10 + 5);
    this.h = this.w * 1;
    this.x = Math.floor(Math.random() * 100);
    this.y = Math.floor(Math.random() * 100);
    this.c = colors[Math.floor(Math.random() * colors.length)];
  }
  create() {
    var newConfetti = '<div class="confetti" style="bottom:' + this.y + '%; left:' + this.x + '%;width:' +
    this.w + 'px; height:' + this.h + 'px;"><div class="rotate"><div class="askew" style="background-color:' + this.c + '"></div></div></div>';
    container.innerHTML += newConfetti;
  }}
;

function animateConfetti()
{
  for (var i = 1; i <= numConfettis; i++) {
    var confetti = new Confetti();
    confetti.create();
  }
  var confettis = document.querySelectorAll('.confetti');
  for (var i = 0; i < confettis.length; i++) {
    var opacity = Math.random() + 0.1;
    var animated = confettis[i].animate([
    { transform: 'translate3d(0,0,0)', opacity: opacity },
    { transform: 'translate3d(20vw,100vh,0)', opacity: 1 }],
    {
      duration: Math.random() * 3000 + 3000,
      iterations: Infinity,
      delay: -(Math.random() * 5000) });

    confettiShower.push(animated);
  }
}
animateConfetti();