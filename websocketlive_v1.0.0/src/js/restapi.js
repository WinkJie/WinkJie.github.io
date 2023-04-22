var RestApi = function() {

	this.findChatHistory = function(roomId) {
		var localStorageKey = 'room_' + roomId;
		var chatHistoryAsString = localStorage.getItem(localStorageKey);
		if (chatHistoryAsString != null) {
			var chatHistory = JSON.parse(chatHistoryAsString);
			return chatHistory;
		}
		return [];
	};

	this.saveChatMessage = function(roomId, chatMessage) {
		var localStorageKey = 'room_' + roomId;
		var chatHistoryAsString = localStorage.getItem(localStorageKey);
		var chatHistory;
		if (chatHistoryAsString == null || chatHistoryAsString == "") {
			chatHistory = [];
		} else {
			chatHistory = JSON.parse(chatHistoryAsString);
		}
		chatHistory.push(chatMessage);
		chatHistoryAsString = JSON.stringify(chatHistory);
		localStorage.setItem(localStorageKey, chatHistoryAsString);
	};
}
