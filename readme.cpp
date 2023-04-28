//https://www.jianshu.com/p/b2814fbee847
//https://zhuanlan.zhihu.com/p/398412469
//代码网:https://www.ziyuanpro.com/js/
//源码：https://down.chinaz.com/class/608_572_5.htm
//https://zhenfanjixie.com/vodplay/320092-8-22.html
//https://www.cnblogs.com/KingUp/p/5729473.html

/*
开放服务器下载功能（下载本地文件到客户端）
{ //开放访问端口 requestFiltering allowDoubleEscaping="true"
    A      所有当前IIS下的网站都允许特殊字符：
    1、在地址栏输入： %windir%\system32\inetsrv\config\applicationhost.config然后单击 打开。
    2、在 ApplicationHost.config 文件, 定位到文件中的 configuration/system.webServer/security/requestFiltering/下 <requestFiltering> 节点。
    将<requestFiltering> 改为 <requestFiltering allowDoubleEscaping="true">
}*/

//https://juejin.cn/post/6844903985980129294


1根据任务书需求，参与系统业务流程的设计:
2负责系统功能模块开发、测试、前后端联调及性能调优
3负责系统交付、部署、问题定位及运行保障:编写代码和开发文档，具备良好对接能力。
学历要求:-->
全日制本科及以上(非民办)，计算机或软件工程等相关专业出身1掌握C++编程语言，熟悉计算机网络知识，具备较强抗压能力2-3、所需经验、
技能:熟悉C++编程语言，具备5年以上基于QT框架软件-->
开发经验:熟悉多线程开发，熟悉 Socket编程，了解计算机网络协议:熟悉数据库设计使用，具有Redis缓存数据库使用经验者优化，熟悉Linux操作系统使用，了解WireShark等调试工具。

2、熟悉C/C++编程及思想，熟悉数据结构、设计模式、常用算法，具备独立分析解决问题的能力；

1.本科以及以上学历，计算机相关专业
2.5年以上C++后端开发经验
3.精通C++编程语言，熟悉面向对象编程和常用的设计模式，具有良好的编码规范；

4.熟悉TCP/IP通讯原理与Socket网络编程
/*
 * TCP原理
 * UDP原理
 *
 */
5.熟悉常用的数据结构和算法，有多线程编程经验；熟悉各种C++库，例如STL、Boost


//https://89c8dfe.r8.cpolar.top/WinkJiePersonalWeb/resource/赵杰_C++北京.docx

import QtQuick 2.12
import QtQuick.Controls 2.5
import QtQuick.Layouts 1.12
ApplicationWindow {
    visible:true
    width:600
    height:400
    title:"Image Browser"
    ColumnLayout {
        anchors.fill:parent
        ToolBar {
            id:topToolBar
            width:parent.width

            Label {
                text:"Image Browser"
                font.pixelSize:24
                color:"white"
            }

            Button {
                text:"Open"
                onClicked: fileDialog.visible = true
            }
        }
        Flow {
            id:flow
            width:parent.width
            height:parent.height - topToolBar.height
            spacing:10
            Repeater {
                model:imageList.length
                Image {
                    id:gridItem
                    width:(flow.width - flow.spacing) / 3.0
                    height:width*1.2
                    source:imageList[index]
                    fillMode:Image.PreserveAspectFit
                    MouseArea {
                        anchors.fill:parent
                        hoverEnabled:true
                        onEntered: {
                            gridItem.scale=1.1
                            gridItem.opacity=0.8
                        }
                        onExited: {
                            gridItem.scale=1.0
                            gridItem.opacity=1.0
                        }
                        onClicked: fullScreenImage.source=imageList[index]
                    }
                }
            }
        }
        Dialog {
            id:fileDialog
            title:"Open Image"
            folder:Shortcut.home
            FileDialog {
                id:fileDialogComponent
                modal:true
                nameFilters:["Images (*.png *.xpm *.jpg)", "All files (*)"]
                selectMultiple:true
                onAccepted: {
                    imageList = []
                    for (var i=0;i<fileUrl.length;i++) {
                        imageList.push(fileUrl[i])
                    }
                }
            }
        }
        Image {
            id:fullScreenImage
            visible:false
            anchors.fill:parent
            MouseArea {
                anchors.fill:parent
                onClicked: fullScreenImage.visible=false
            }
        }
    }
}

/*博客园*/
body {
  background-color: rgb(141,136,247);
  background: linear-gradient(to top right, #58b355 0%, #3d6e52 25%, #a3607c 100%) !important;
  //background: radial-gradient(circle, #CDDC39, #8BC34A);
  /*background:url(https://images.cnblogs.com/cnblogs_com/WinkJie/1613852/o_191215033059psb.jpg) no-repeat 0 0 transparent;
  background-size:100% 100%;*/
}

_blank1
{
     background-color: rgb(255, 0, 0);
    padding: 30px;
    margin-top: 50px;
    margin-bottom: 50px;
}
#home {
    margin: 0 auto;
    width: 65%;
    min-width: 950px;
    background-color: rgb(154, 230, 119);
    padding: 30px;
    margin-top: 50px;
    margin-bottom: 50px;
    box-shadow: 0 2px 6px rgb(100 100 100 / 30%);
}
#profile_block {
    margin-top: 10px;
    line-height: 5.0;
    text-align: left;
    background-color: rgb(154, 230, 119);
}
#sideBar {
    margin-top: -15px;
    width: 230px;
    min-height: 200px;
    padding: 0 0 0 5px;
    float: right;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
    overflow: hidden;
    background-color: rgb(154, 230, 119);

}
.newsItem, .catListEssay, .catListLink, .catListNoteBook, .catListTag, .catListPostCategory, .catListPostArchive, .catListImageCategory, .catListArticleArchive, .catListView, .catListFeedback, .mySearch, .catListComment, .catListBlogRank, .catList, .catListArticleCategory {
    background: rgb(205, 226, 87);
    margin-bottom: 35px;
    word-wrap: break-word;
}
.input_my_zzk {
    border: 1px solid #ccc;
    width: 100%;
    height: 25px;
    padding-right: 30px;
    padding-left: 5px;
    outline: 0;
    background: rgb(205, 226, 87);
}
tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
    background: rgb(205, 226, 87);
}
.clear {
    clear: both;
    background: rgb(205, 226, 87);
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
    background: rgb(205, 226, 87);
}
.CalTitle td {
    background: rgb(205, 226, 87) !important;
    background-image: initial !important;
    background-position-x: initial !important;
    background-position-y: initial !important;
    background-size: initial !important;
    background-repeat-x: initial !important;
    background-repeat-y: initial !important;
    background-attachment: initial !important;
    background-origin: initial !important;
    background-clip: initial !important;
    background-color: rgb(248, 248, 248) !important;
    border: 0 !important;
    color: #5e5f63;
    font-family: "Comic Sans MS";
}
#profile_block {
    margin-top: 5px;
    line-height: 1.5;
    text-align: left;
    background-color: rgb(154, 230, 119);
    font-family: "Comic Sans MS";
}
#blog-calendar {
    width: 228px;
    padding-bottom: 5px;
    margin-bottom: 35px;
    box-shadow: 0 1px 3px #ccc;
    border: 1px solid #ededed;
    font-family: "Comic Sans MS";
}
#blog-calendar th {
    font-size: 12px;
    background: rgb(205, 226, 87) ;
}
#blog-calendar td {
    font-size: 12px;
    font-family: "Comic Sans MS";
    background: rgb(205, 226, 87) !important;
}
#blogTitle h1 a {
    color: rgb(13, 13, 219);
    font-size: 24px;
    transition:font-size 2s linear;
    font-family: "Comic Sans MS";
}
#blogTitle h1 a::before {
    content: attr(text);
    position: absolute;
    z-index: 10;
    color:rgb(24, 23, 23);
    -webkit-mask:linear-gradient(to left, rgb(43, 40, 40), transparent );
    font-size: 100px;
}
#blogTitle h2 {
    color: rgb(105, 109, 91);
    font-family: "Comic Sans MS";
}
.c_b_p_desc {
    word-wrap: break-word;
    word-break: break-all;
    overflow: hidden;
    line-height: 1.5;
    color: black;
}
.c_b_p_desc_readmore {
    padding-left: 5px;
    color: blue;
}
.postBody {
    color: linear-gradient(90deg, yellow, pink);
    line-height: 1.7;
    font-size: 14px;
}
.day {
    min-height: 10px;
    _height: 10px;
    margin-bottom: 20px;
    padding-bottom: 5px;
    position: relative;
}
.postSeparator {
    clear: both;
    height: 1px;
    width: 100%;
    clear: both;
    float: right;
    margin: 0 auto 15px auto;
    background: white;
}
.clear {
    clear: both;
    background: white;
}
.syntaxhighlighter {
    width: 100% !important;
    margin: 1em 0 1em 0 !important;
    position: relative !important;
    overflow: auto !important;
    font-size: 1em !important;
    background-color: rgb(154, 230, 119) !important;
}
.postBody {
    color: linear-gradient(90deg, yellow, pink);
    line-height: 1.7;
    font-size: 14px;
    background-color: rgb(154, 230, 119) !important;
}
.syntaxhighlighter .line {
    white-space: pre !important;
    background-color: rgb(154, 230, 119) !important;
}


/*html侧边栏*/

<div>
    <a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=mKqhraqpq6igrdjp6bb79-U" style="text-decoration:none;">
<img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_01.png"/></a>
</div>
<div>
<a target="_blank1" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=mKqhraqpq6igrdjp6bb79-U" style="text-decoration:none;">快来找我聊天吧</a>
</div>