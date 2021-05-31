const firebaseRDB = firebase.database();
const roomName = "chat-room-1";
const post = document.getElementsByClassName("chat-post-btn")[0];
const userName = document.getElementsByClassName("chat-post-name")[0];
const content = document.getElementsByClassName("chat-post-content")[0];
const chatView = document.getElementsByClassName("chat-view")[0];

//チャット送信
post.addEventListener("click", () => {
  if (!content.value || !userName.value) {
    return;
  }
  firebaseRDB.ref(roomName).push({
    username: userName.value,
    content: content.value,
  });
  content.value = "";
});

//チャット受信
firebaseRDB.ref(roomName).on("child_added", (data) => {
  const value = data.val();
  const key = data.key;
  const str = `
<div id="${key}" class="message">
<div class="message-name"><span>名前:</span>${value.username}</div>
<div class="message-content"><span>内容:</span>${value.content}</div>
</div>
`;
  chatView.innerHTML += str;
});
