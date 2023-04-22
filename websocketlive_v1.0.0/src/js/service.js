function User(id, nickname, avatar) {
	this.id = id;
	this.nickname = nickname;
	this.avatar = avatar;
}

function ChatMessage(senderId,senderNickname, messageType, content) {
	this.senderUserId = senderId;
	this.senderNickname = senderNickname;
	this.type = messageType;
	this.content = content;
}

//消息类型
var MessageType = {
	//文字聊天
	CHAT: 0,
	//道具-比心
	PROP: 1
};

//道具类型
var Prop = {
	//桃心
	HEART: 0,
	//火箭
	ROCKET: 1
};



function Service() {

    this.onJoinRoom = function(nickName) {};

    this.onLeaveRoom = function(nickName) {};

    this.onNewMessage = function(nickName, content) {};

    this.onNewHeart = function(nickName) {};

    this.onNewRocket = function(nickName) {};

    this.restapi = new RestApi();


    this.goeasy;

	this.currentRoomId;

	this.currentUser;

	//当前在线用户数和头像列表
    //进入聊天室的时候完成首次初始化
    //用户上下线时，进行增加或者减少
	this.onlineUsers = {
		count: 0,
		users: []
	};


	//初始化聊天室
	this.joinRoom = function(userId,nickName, avatar, roomID) {
		//初始化当前用户
		this.currentUser = new User(userId, nickName, avatar);
		//初始化当前聊天室id
		this.currentRoomId = roomID;
		//初始化goeasy，建立长连接
        this.goeasy = new GoEasy({
            host: "hangzhou.goeasy.io",
            appkey: "您的appkey",
            userId: this.currentUser.id,
            userData: '{"nickname":"' + this.currentUser.nickname + '","avatar":"' + this.currentUser.avatar + '"}',
            onConnected: function () {
                console.log( "GoEasy connect successfully.")
            },
            onDisconnected: function () {
                console.log("GoEasy disconnected.")
            },
            onConnectFailed: function (error) {
                alert("GoEasy连接失败，请确认service.js文件appkey和host配置正确.");
            }
        });
		//查询当前在线用户列表，初始化onlineUsers对象
		this.initialOnlineUsers();
		//监听用户上下线提醒，实时更新onlineUsers对象
		this.subscriberPresence();
		//监听和接收新消息
		this.subscriberNewMessage();
	};

	//初始化onlineUsers对象，可以直接显示在页面上
	this.initialOnlineUsers = function() {
	    var self = this;
	    //调用GoEasy查询这个聊天室的在线用户和用户列表
		this.goeasy.hereNow({
			channels: [this.currentRoomId],
			includeUsers: true,
			distinct: true
		}, function(result) {
			if (result.code == 200) {
			    var currentRoomOnlineUsers = result.content.channels[self.currentRoomId];
                var hereNowUsers = [];
                currentRoomOnlineUsers.users.forEach(function(onlineUser) {
					var userId = onlineUser.id;
					var userData = JSON.parse(onlineUser.data);
					var nickname = userData.nickname;
					var avatar = userData.avatar;
					var user = new User(userId, nickname, avatar);
                    hereNowUsers.push(user);
				});
                //赋值
                self.onlineUsers.count = currentRoomOnlineUsers.clientAmount;
                self.onlineUsers.users = hereNowUsers;
			}
			if(result.code == 401) {
				alert("您还没有开通获取在线用户列表（高级功能），付费用户请联系GoEasy开通");
			}
		});
	};

	//监听用户上下线时间，维护onlineUsers对象
	this.subscriberPresence = function() {
		var self = this;
		this.goeasy.subscribePresence({
			channel: this.currentRoomId,
			onPresence: function(presenceEvents) {
				presenceEvents.events.forEach(function(event) {
					var userId = event.userId;
					var count = presenceEvents.clientAmount;
					//更新onlineUsers在线用户数
					self.onlineUsers.count = count;
					//如果有用户进入聊天室
					if (event.action == "join" || event.action == "online") {
						var userData = JSON.parse(event.userData);
						var nickName = userData.nickname;
						var avatar = userData.avatar;
						var user = new User(userId, nickName, avatar);
						//将新用户加入onlineUsers列表
						self.onlineUsers.users.push(user);
						//触发界面的更新
						self.onJoinRoom(user.nickname, user.avatar);
					} else {
						for (var i = 0; i < self.onlineUsers.users.length; i++) {
                            var leavingUser = self.onlineUsers.users[i];
                            if (leavingUser.id == userId) {
								var nickName = leavingUser.nickname;
								var avatar = leavingUser.avatar;
								//将离开的用户从onlineUsers中删掉
								self.onlineUsers.users.splice(i, 1);
								//触发界面的更新
								self.onLeaveRoom(nickName, avatar);
							}
						}
					}
				});
			},
			onSuccess : function () {
				console.log("监听成功")
			},
			onFailed : function () {
				console.log("监听失败")
			}
		});
	};


	//监听消息或道具
    this.subscriberNewMessage = function() {
		var self = this;
		this.goeasy.subscribe({
			channel: this.currentRoomId, //替换为您自己的channel
			onMessage: function(message) {
				var chatMessage = JSON.parse(message.content);
				//todo:事实上不推荐在前端收到时保存, 一个用户开多个窗口，会导致重复保存, 建议所有消息都是都在发送时在服务器端保存，这里只是为了演示
				self.restapi.saveChatMessage(self.currentRoomId, chatMessage);
				//如果收到的是一个消息，就显示为消息
				if (chatMessage.type == MessageType.CHAT) {
					var selfSent = chatMessage.senderUserId == self.currentUser.id;
					var content = JSON.parse(message.content);
					self.onNewMessage(chatMessage.senderNickname, content, selfSent);
				}
                //如果收到的是一个道具，就播放道具动画
				if (chatMessage.type == MessageType.PROP) {
					if (chatMessage.content == Prop.ROCKET) {
						self.onNewRocket(chatMessage.senderNickname);
					}
					if (chatMessage.content == Prop.HEART) {
						self.onNewHeart(chatMessage.senderNickname);
					}
				}
			}
		});
	};

	this.leaveRoom = function() {
		this.onlineUsers.users = [];
		this.goeasy.unsubscribe({
			channel: this.currentRoomId,
			onSuccess: function() {
				console.log("订阅取消成功。");
			},
			onFailed: function(error) {
				console.log("取消订阅失败，错误编码：" + error.code + " 错误信息：" + error.content)
			}
		});

		this.goeasy.unsubscribePresence({
			channel: this.currentRoomId,
			onSuccess: function() {
				console.log("Presence取消成功。");
			},
			onFailed: function(error) {
				console.log("Presence取消失败，错误编码：" + error.code + " 错误信息：" + error.content)
			}
		});
		this.goeasy.disconnect();
	};

	this.loadOnlineUsers = function() {
		return this.onlineUsers;
	};

	this.loadChatHistory = function() {
		return this.restapi.findChatHistory(this.currentRoomId);
	};


	this.sendMessage = function(content) {
		var message = new ChatMessage(this.currentUser.id,this.currentUser.nickname, MessageType.CHAT, content);
		var self = this;
		this.goeasy.publish({
			channel: self.currentRoomId,
			message: JSON.stringify(message),
			onSuccess: function() {
				console.log("消息发布成功。");
			},
			onFailed: function(error) {
				console.log("消息发送失败，错误编码：" + error.code + " 错误信息：" + error.content);
			}
		});
	};

	this.sendProp = function(prop) {
		var self = this;
		var message = new ChatMessage(this.currentUser.id,this.currentUser.nickname, MessageType.PROP, prop);
		this.goeasy.publish({
			channel: self.currentRoomId,
			message: JSON.stringify(message),
			onSuccess: function() {
				console.log("道具发布成功。");
			},
			onFailed: function(error) {
				console.log("道具发送失败，错误编码：" + error.code + " 错误信息：" + error.content);
			}
		});
	};
}
