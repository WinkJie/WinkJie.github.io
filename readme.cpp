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

